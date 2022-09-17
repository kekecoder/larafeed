<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\UserController;
use App\Models\Feed;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('feeds', FeedController::class)->middleware('auth');
Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'save']);
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'login_user']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/comment', [CommentsController::class, 'comment']);