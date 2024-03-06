<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommunityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//User
Route::get('/users',[UserController::class, 'indexAPI']);
Route::get('/users/{id}',[UserController::class, 'showAPI']);
Route::post('/users', [UserController::class, 'storeAPI']);
Route::put('/users/{id}/edit',[UserController::class, 'updateAPI']);
Route::delete('/users/{id}/delete',[UserController::class, 'deleteAPI']);
//community
Route::get('/community',[CommunityController::class, 'indexAPI']);
Route::get('/community/{id}',[CommunityController::class, 'showAPI']);
Route::post('/community',[CommunityController::class, 'storeAPI']);
//category
Route::get('/category',[CategoryController::class, 'indexAPI']);
Route::get('/category/{id}',[CategoryController::class, 'showAPI']);


