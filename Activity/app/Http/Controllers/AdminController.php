<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function adminPage()
    {
        return view('admin.blogControl');
    }
    public function home()
    {
        return view('admin.adminBlog');
    }
    public function adminLogout(Request $request)
    {
        Auth::logout();
        $request -> session() ->invalidate();
        $request -> session()->regenerateToken();

        return redirect('/');
    }

    public function store(Request $request)
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
            'image'=>$imageName,
        ];
        BlogPost::create($data);

        return redirect()->route('adminBlog.post')->with('success', 'Blog post created successfully.');
    }
    public function controlUserScreen(){
        $users = User::all();
        return view('admin.userControl',compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('userControl')->with('success','User deleted successfully');
    }

    public function controlBlogScreen()
    {
        $blogs = BlogPost::all();
        return view('admin.blogControl',compact('blogs'));
    }
    public function showAdminBlog()
    {
        $posts = BlogPost::where('name',Auth::User()->username)->get();
        return view('admin.myBlogs',compact('posts'));
    }

    public function adminEditPost($id){
        $post = BlogPost::findOrFail($id);

        if($post->name != Auth::User()->name){
            abort(403,'Unautharized action');
        }
        return view('admin.updateBlog', compact('post'));
    }

    public function adminUpdate(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|string',
            'city'=>'required|string',
            'blog' => 'required|string',
            'image'=>'nullable|image|mimes:jpg,png,jpeg,svg,bmp|max:2048'
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

        return redirect('myBlogs')->with('success', 'Blog post updated successfully');

    }

    public function deleteBlog($id)
    {
        $blog = BlogPost::findOrFail($id);
        $blog->delete();
        return redirect()->route('blogControl')->with('success','Blog deleted successfully');

    }

}
