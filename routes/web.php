<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\UpdateController;
use App\Http\Controllers\Post\DestroyController;


use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
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
//Route::get('/', function() {
//    return response()->json([
//        'stuff' => phpinfo()
//    ]);
//});

Route::get('/', [HomeController::class, 'index']);

Route::group(['namespace'=>'App\Http\Controllers\Post'], function(){
    Route::get('/posts', 'IndexController' )->name('post.index');
    Route::get('/posts/create', 'CreateController')->name('post.create');
    Route::post('/posts', 'StoreController')->name('post.store');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('post.destroy');
});


Route::group(['namespace'=>'App\Http\Controllers\Post', 'middleware' =>'admin'], function(){
    Route::get('/admin', 'AdminController' )->name('post.admin');
});
//Route::get('/admin/post', IndexController::class) ->middleware('admin')->name('admin.post.index');



//Route::get('/posts', [PostController::class, 'index'])->name('post.index');
//Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
//
//Route::post('/posts', [PostController::class, 'store'])->name('post.store');
//Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
//
//Route::get('/posts/update', [PostController::class, 'update']);
//Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
//Route::patch('/posts/{post}', [PostController::class, 'update'])->name('post.update');
//Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.delete');

Route::get('/view1', [PostController::class, 'view1']);
Route::get('/view2', [PostController::class, 'view2']);
Route::get('/view3', [PostController::class, 'view3']);

Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

//Route::get('/posts/delete', [PostController::class, 'delete']);
//Route::get('/posts/first_or_create', [PostController::class, 'firstOrCreate']);
//Route::get('/posts/update_or_create', [PostController::class, 'updateOrCreate']);
//Route::get('/', function () {
//    return view('welcome');
//});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
