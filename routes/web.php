<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;

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

Route::get('/', [HomeController::class,"index"])->name("home")->middleware("auth");
Route::get('/post', [PostController::class,"index"])->middleware("auth");
Route::post('/post', [PostController::class,"create"])->middleware("auth");
Route::post("/post/{post}/likes",[LikesController::class,"store"])->name("post.likes");

//Auth routes
Route::get("/login",[LoginController::class,"index"])->name('login')->middleware("guest");
Route::post("/login",[LoginController::class,"login"]);
Route::post('/logout', [LoginController::class,"logoutUser"])->middleware("auth");
Route::get("/signup",[SignupController::class,"index"])->name('signup')->middleware('guest');
Route::post("/signup",[SignupController::class,"store"]);
