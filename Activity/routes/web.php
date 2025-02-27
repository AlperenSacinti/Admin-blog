<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------

| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main');
});

Route::middleware(['throttle:api'])->group(function () {
    Route::post('/get-recommendations', [UserController::class, 'getRecommendations']);
});


Route::get('/login', [UserController::class, 'loginPage']) ->name('login');
Route::get('/signUp', [UserController::class, 'signUpPage']) ->name('signUp');
Route::get('/blogPage', [UserController::class, 'blog']) -> name('blog');
Route::get('/blogPage/{id}',[UserController::class, 'blogNewScreen']) -> name('blogDetail');
Route::get('/',[UserController::class,'recentBlogs'])->name('recentBlogs');

Route::post('/signUp',[UserController::class, 'saveUser']) ->name('signUp.post');
Route::post('/login',[UserController::class, 'loginUser'])-> name('login.post');


Route::middleware(['auth']) -> group(function (){
    Route::get('/userAddBlog',[UserController::class, 'userBlog'])->name('userBlog');
    Route::get('/userEditBlog',[UserController::class, 'showBlog'])->name('showBlog');
    Route::get('/userEditBlog/{id}/updateBlog',[UserController::class,'editPost'])->name('updatePage');

    Route::post('/userScreen',[UserController::class,'userLogout'])->name('userLogout.post');
    Route::post('/userAddBlog',[UserController::class,'userStoreBlog'])->name('userBlog.post');
    Route::post('/userEditBlog/{id}',[UserController::class,'update'])->name('updateBlog.post');
    Route::delete('/userAddBlog/{id}/updateBlog',[UserController::class, 'userDeleteBlog'])->name('userDeleteBlog');
    Route::get('/recommendations', [UserController::class, 'getRecommendations'])->name('recommendations');
    Route::get('/recommendations', [UserController::class, 'showRecommendations']);
});
Route::middleware(['admin']) -> group(function (){
    Route::get('/adminScreen',[AdminController::class,'adminPage']) ->name('adminScreen');
    Route::get('/adminBlog',[AdminController::class, 'home']) ->name('adminBlog');
    Route::get('/userControl',[AdminController::class,'controlUserScreen'])->name('userControl');
    Route::get('/blogControl',[AdminController::class,'controlBlogScreen'])->name('blogControl');
    Route::get('/myBlogs',[AdminController::class, 'showAdminBlog'])->name('showAdminBlog');
    Route::get('/myBlogs/{id}/updateBlog',[AdminController::class,'adminEditPost'])->name('updateAdminPage');

    Route::post('/myBlogs/{id}',[AdminController::class,'adminUpdate'])->name('updateAdminBlog.post');
    Route::post('/adminScreen',[AdminController::class,'adminLogout'])->name('adminLogout.post');
    Route::post('/adminBlog',[AdminController::class,'store']) ->name('adminBlog.post');

    Route::delete('/userControl/{id}',[AdminController::class,'deleteUser'])->name('deleteUser');
    Route::delete('/blogControl/{id}',[AdminController::class,'deleteBlog'])->name('deleteBlog');
});
