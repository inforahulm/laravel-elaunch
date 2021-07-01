<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/abc', function () {
    $name=random_int(1000, 9999);
    SendEmailJob::dispatch();
     return response()->json('welcome');   
});

Route::middleware(['auth'])->group(function () {
    Route::resource('employees',EmployeeController::class);

    Route::resource('posts',PostController::class);

    Route::resource('blogs',BlogController::class);

    Route::resource('books',BookController::class);

    Route::resource('roles',RoleController::class);

    Route::resource('permissions',PermissionController::class);
    
    Route::resource('users',UserController::class);
});


Route::post('comment/store',[CommentController::class,'store'])->name('comment.add');
Route::post('/reply/store', [CommentController::class, 'replyStore'])->name('reply.add');
Route::post('register',[UserController::class,'register'])->name('register');
Route::get('/verifyotp',[UserController::class,'verify'])->name('verifyotp');
Route::post('/confirmotp',[UserController::class,'confirm'])->name('confirmotp');
Route::get('/resend',[UserController::class,'resend'])->name('resend');

Route::get('/post/{post}', function () {
    return "welcome user";
})->name('post.show');

Route::get('/post/{post}/comment/{comment}', function () {
    return "post and comment";
})->name('comment.show');

// Route::get('/book',[BookController::class,'index']);
// Route::get('/book/create',[BookController::class,'create']);
// Route::post('/book',[BookController::class,'store']);
// Route::get('/book/{book}',[BookController::class,'show']);
// Route::get('/book/{book}/edit',[BookController::class,'edit']);
// Route::patch('/book/{book}',[BookController::class,'update']);
// Route::delete('/book/{book}',[BookController::class,'delete']);

