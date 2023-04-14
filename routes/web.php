<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [UserController::class, 'index'])->name('login')->middleware('guest');
Route::get('/register', [UserController::class, 'register']);
Route::post('/store', [UserController::class, 'store']);
Route::post('/login/process', [UserController::class, 'process']);
Route::get('/profile/{user}', [UserController::class, 'profile'])->middleware('auth');
Route::post('/logout', [UserController::class, 'logout']);

Route::get('/', [UserController::class, 'feed'])->middleware('auth');
Route::get('/search', [UserController::class, 'searchUsers']);
Route::get('/profile/edit/{user}', [UserController::class, 'show'])->middleware('auth');
Route::put('/update', [UserController::class, 'update']);
Route::post('/store/post', [PostController::class, 'post']);
Route::post('/store/comment', [CommentController::class, 'comment']);
Route::delete('/delete/post/{post}', [PostController::class, 'delete']);
Route::delete('/delete/comment/{comment}', [CommentController::class, 'delete']);
Route::get('/profile/otherUser/{user}', [UserController::class, 'otherUser']);