<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    $posts = [];
    if (auth()->check()) {
     $posts = auth()->user()->usersCoolPosts()->latest()->get(); //User → their posts” (object-oriented thinking)
      // $posts = Post::where('user_id',auth()->id())->get(); //Posts table → filter by user_id” (SQL thinking)
    }
    return view('Home',['posts'=>$posts]);
});

Route::post('/register',[UserController::class,'register']);
Route::post('/logout',[UserController::class,'logout']);
Route::post('/login',[UserController::class,'login']);

// Blog Post related routes
Route::post('/create-post',[PostController::class,'createPost']);
Route::get('/edit-post/{post}',[PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}',[PostController::class, 'actuallyUpdatePost']);
Route::delete('/delete-post/{post}',[PostController::class, 'deletePost']);

// how an Api looks like 
// Route::get('/api', function () {
//     $posts = Post::all();
//     return $posts;
// });