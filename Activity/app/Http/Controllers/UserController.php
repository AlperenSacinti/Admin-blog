<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\error;
use App\Services\Gemini;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Http;

class   UserController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }

    public function signUpPage()
    {
        return view('signUp');
    }


    public function blog()
    {
        $blogpost = BlogPost::paginate(8);
        return view('blogPage', compact('blogpost'));
    }

    public function blogNewScreen($id){
        $blogpost = BlogPost::findorFail($id);
        return view('blogDetail', compact('blogpost'));
    }

    public function saveUser(Request $request)
    {
        $request->validate([
           'username' => 'required|string|unique:customer',
            'name' => 'required|string|',
            'surname' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        $customer = User::create([
           'username' => $request ->username,
            'name' => $request ->name,
            'surname' => $request ->surname,
            'email' => $request ->email,
            'password' => bcrypt($request->password),

        ]);
        if($customer->save()){
            return redirect(route('login')) ->with("success","User Created Successfully");
        }

        return redirect(route("signUp")) ->with("error","Failed to Create Account");
    }
    public function loginUser(Request $request){
        $credentials = $request->validate([
           'email' => 'required|email',
           'password' => 'required|string'
        ]);
        if (Auth::attempt($credentials)){
            $request ->session()->regenerate();

            $user = Auth::User();
            if($user->usertype == 'admin'){
                return redirect()->intended(route('blogControl'));
            }
            else{
                return redirect()->intended('/');
            }

        }
        return back() ->withErrors([
           'email' => 'Wrong email or password'
        ]);
    }

    public function userLogout(Request $request)
    {
        Auth::logout();
        $request -> session() ->invalidate();
        $request -> session()->regenerateToken();

        return redirect('/');
    }
    public function userBlog()
    {
        return view('userAddBlog');
    }
    public function userStoreBlog(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'city' => 'required|string',
            'blog' =>'required|string',
            'image'=>'required|image|mimes:jpg,png,jpeg,svg,bmp|max:2048'

        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            return back()->withErrors(['image' => 'Image upload failed.']);
        }

        $data=[
            'name' => Auth::User()->name,
            'title' => $request->title,
            'city' => $request->city,
            'blog' =>$request->blog,
            'user_id'=>Auth::User()->id,
            'image' =>$imageName,
        ];

        BlogPost::create($data);

        return redirect()->route('userBlog.post')->with('success', 'Blog post created successfully.');

    }
    public function showBlog()
    {
        $posts = BlogPost::where('name',Auth::User()->username)->get();
        return view('userEditBlog',compact('posts'));
    }
    public function userDeleteBlog($id)
    {

        $blog = BlogPost::findOrFail($id);
        $blog->delete();

        return redirect()->route('showBlog')->with('success', 'Blog deleted successfully');
    }

    public function editPost($id){
        $post = BlogPost::findOrFail($id);

        if($post->name != Auth::User()->name){
            abort(403,'Unautharized action');
        }
        return view('updateBlog', compact('post'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|string',
            'city'=>'required|string',
            'blog' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,svg,bmp|max:2048'
        ]);

        $post = BlogPost::findOrFail($id);
        if($post ->name !=Auth::User()->name){
            abort(403,'Unautharized action');
        }

        $post->title = $request->input('title');
        $post->city = $request ->input('city');
        $post->blog = $request->input('blog');

        if ($request->hasFile('image')) {
            // Eski resmi sil
            if ($post->image && file_exists(public_path('images/' . $post->image))) {
                unlink(public_path('images/' . $post->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            $post->image = $imageName;
        }

        $post->save();

        return redirect('userEditBlog')->with('success', 'Blog post updated successfully');

    }

    public function recentBlogs(){
        $recentBlogs = BlogPost::orderBy('created_at','desc')->take(3)->get();

        return view('main', compact('recentBlogs'));
    }

    protected $openAiService;

    public function __construct(Gemini $openAiService)
    {
        $this->openAiService = $openAiService;
    }
    public function showRecommendations()
    {
        $user = Auth::User();
        if (!$user) {
            return response()->json(['error' => 'User is not logged in.'], 401);
        }

        // Kullanıcıya ait blogları al
        $user = Auth::User()->load('blogs');
        $userBlogs = $user->blogs->pluck('title')->toArray();

        if (empty($userBlogs)) {
            return response()->json(['error' => 'User has no blog posts.'], 404);
        }

        return $this->getRecommendations($userBlogs);
    }

    public function getRecommendations(array $userBlogs)
    {
        // Rate limiting kontrolü
        if (RateLimiter::tooManyAttempts('openai', 2)) {
            return response()->json(['error' => 'Too many requests, please try again later.'], 429);
        }

        RateLimiter::hit('openai'); // Rate limit'i artır

        try {
            // API anahtarını alıyoruz
            $apiKey = env('OPENAI_API_KEY');

            // API'ye istek gönder
            $response = Http::withHeaders([
                'Authorization' => "Bearer $apiKey",
                'Content-Type' => 'application/json',
            ])
                ->post('https://api.openai.com/v1/chat/completions', [
                    'model' => 'GPT-3.5 Turbo',
                    'messages' => [
                        ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                        ['role' => 'user', 'content' => 'Recommend blogs based on: ' . implode(', ', $userBlogs)],
                    ],
                    'max_tokens' => 10,
                ]);

            // Eğer response'da hata varsa
            if ($response->failed()) {
                return response()->json(['error' => 'Error communicating with OpenAI API: ' . $response->body()], 500);
            }

            $data = $response->json();

            return response()->json([
                'recommendation' => $data['choices'][0]['message']['content']
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error communicating with OpenAI API: ' . $e->getMessage()], 500);
        }
    }

}
