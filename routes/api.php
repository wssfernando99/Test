<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/viewAllPosts',[PostController::class,'ViewAllPosts']);
    Route::post('/createNewPost',[PostController::class,'CreateNewPost']);
});