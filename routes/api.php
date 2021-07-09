<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\API\UserController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/first_api',[ApiController::class,'FirstAPi']);
Route::get('/second_api/{id}',[ApiController::class,'SecondAPi']);
Route::post('/post_api',[ApiController::class,'PostAPi']);
Route::get('/lists',[ApiController::class,'list']);


Route::post('/register',[ApiController::class,'register']); 

Route::post('/login',[ApiController::class,'login']);
Route::get('/login',[ApiController::class,'login'])->name('login');

Route::prefix('admin')->middleware('auth:api')->group(function () {
    Route::get('/logout',[ApiController::class,'logout']);
    Route::get('/user',[ApiController::class,'index']);
    Route::get('/user/{id}',[ApiController::class,'show']);
    Route::put('/user/{id}',[ApiController::class,'update']);
    Route::delete('/user/{id}',[ApiController::class,'destroy']);


});

Route::get('/test',[TestController::class,'index']); 
Route::post('/test',[TestController::class,'store']);
Route::get('/test/{id}',[TestController::class,'show']); 
Route::put('/test/{id}',[TestController::class,'update']); 
Route::delete('/test/{id}',[TestController::class,'destroy']); 

Route::resource('users',UserController::class);
