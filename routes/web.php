<?php

use App\Http\Controllers\CommunityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommunityShowController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//User
Route::get('/user/{user}' , [UserController::class, 'index'])->name('user.index');;
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::patch('/user/{user}', [UserController::class, 'update'])->name('user.update');

//Category
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/edit/{category}', [CategoryController::class, 'edit']);
Route::put('/categories/{category}', [CategoryController::class, 'update']);
Route::get('/categories/delete/{category_id}', [CategoryController::class,'destroy']);

//Community
Route::get('/community', [CommunityController::class, 'index']);
Route::get('/community/create', [CommunityController::class, 'create']);
Route::post('/community', [CommunityController::class, 'store']);
Route::get('/community/edit/{community}', [CommunityController::class, 'edit']);
Route::put('/community/{community}', [CommunityController::class, 'update']);
Route::get('/community/delete/{community_id}', [CommunityController::class,'destroy']);

//CommunityShow
Route::get('/find-your-communities', [CommunityShowController::class, 'index'])->name('CommunityShow.index');
Route::get('/community/{community_slug}', [CommunityShowController::class, 'show'])->name('CommunityShow.show');
