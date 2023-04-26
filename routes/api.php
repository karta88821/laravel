<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

// Create a new post
Route::post('/posts', [PostsController::class, 'store']);
// Get all posts
Route::get('/posts', [PostsController::class, 'retrieveAll']);
// Get a single post
Route::get('/posts/{post_id}', [PostsController::class, 'retrieveOne']);
// Get all comments for a post
Route::get('/posts/{post_id}/comments', [CommentsController::class, 'retrieveAll']);
// Create a new comment to a post
Route::post('/posts/{post_id}/comments', [CommentsController::class, 'store']);
