<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.logIn');});
    
Route::get('/register', function () {
        return view('auth.register');});

Route::get('/register', function () {
            return view('auth.register');});

Route::post('/userRegister',[UserController::class, 'Register']);
Route::post('/userLogin',[UserController::class, 'Login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/dashboard',[WebPageController::class,'Dashboard']);
    Route::get('/logout',[UserController::class, 'Logout']);
    Route::get('/viewPosts',[PostController::class, 'ViewPosts']);
    Route::get('/createView',[PostController::class, 'CreateView']);

    Route::post('/createPost',[PostController::class,'CreatePost']);
    Route::get('/viewEdit/{id}',[PostController::class, 'EditView']);

    Route::put('/editPost',[PostController::class, 'EditPost']);
    Route::delete('/deletePost/{id}',[PostController::class, 'DeletePost']);
    Route::post('/search',[PostController::class, 'Search']);

});

