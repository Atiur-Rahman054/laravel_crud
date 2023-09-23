<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');


//Group route for post
// Route::prefix('post')->controller(PostController::class)->name('post.')->group(function(){
//     Route::get('/create', 'create')->name('create');
//     Route::post('/store', 'store')->name('store');
//     Route::get('/list', 'index')->name('index');
//     Route::get('/show/{id}', 'show')->name('show');
//     Route::get('/edit/{id}', 'edit')->name('edit');
//     Route::put('/ update/{id}', 'update')->name('update');
//     Route::delete('/delete/{id}', 'destroy')->name('destroy');
//     Route::get('/status/update/{post}', 'statusupdate')->name('status.update);
// });

Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post/store', [PostController::class, 'store'])->name('post.store');
Route::get('post/list', [PostController::class, 'index'])->name('post.index');
Route::get('post/show/{id}', [PostController::class, 'show'])->name('post.show');
Route::get('post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::put('post/ update/{id}', [PostController::class, 'update'])->name('post.update');
Route::delete('post/delete/{id}', [PostController::class, 'destroy'])->name('post.destroy');
Route::get('post/status/update/{post}', [PostController::class, 'statusupdate'])->name('post.status.update');
