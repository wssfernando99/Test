<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/userLogin',[UserController::class, 'UserLogin']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/viewAllPosts',[PostController::class,'ViewAllPosts']);
    Route::post('/createNewPost',[PostController::class,'CreateNewPost']);
    Route::put('/editPostApi',[PostController::class, 'EditPostApi']);
    Route::get('/viewOnePost/{id}',[PostController::class, 'ViewOnePost']);
    Route::delete('/deleteOnePost/{id}',[PostController::class, 'DeleteOnePost']);

});