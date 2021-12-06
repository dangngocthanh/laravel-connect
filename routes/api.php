<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('category' )->group(function (){
    Route::get('/list',[categoryController::class,'index']);
    Route::get('/delete/{id}',[categoryController::class,'delete']);
    Route::get('/edit/{id}',[categoryController::class,'edit']);
    Route::post('/edit',[categoryController::class,'update']);
    Route::post('/store',[categoryController::class,'store']);
});

Route::prefix('product')->group(function (){
    Route::get('/index',[ProductController::class,'index']);
    Route::get('/delete/{id}',[ProductController::class,'delete']);
    Route::get('/edit/{id}',[ProductController::class,'edit']);
    Route::get('/create',[ProductController::class,'create']);
    Route::post('/store',[ProductController::class,'store']);
    Route::post('/update',[ProductController::class,'update']);
});

