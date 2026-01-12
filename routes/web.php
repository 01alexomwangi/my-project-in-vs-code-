<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    //$posts = auth()->user()->userCoolPosts()->latest()->get();
    $posts = Post::where('user_id',auth()->id())->get();
    return view('Home',['posts'=>$posts]);
});

Route::post('/register',[UserController::class,'register']);
Route::post('/logout',[UserController::class,'logout']);
Route::post('/login',[UserController::class,'login']);

// Blog Post related routes
Route::post('/create-post',[PostController::class,'createPost']);
