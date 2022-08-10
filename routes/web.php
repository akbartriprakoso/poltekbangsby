<?php

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('post', PostController::class);

Route::get('/', [PostController::class, 'beranda']); 
Route::get('/posts/detil/{problem:slug}', [PostController::class, 'detil_problems']); 

Route::get('/post/create',function(){
    return view('posts.create',[
        'title'=>'Tambah',
        'judul'=>'Tambah Problem'
    ]);
});
Route::get('/post/edit',function(){
    return view('posts.edit');
});
// Route::get('/post/index',function(){
//     return view('posts.index',[
//         // 'judul'=>'Daftar Problem'
//     ]);
// });
// Route::get('/login', function(){
//     return view('login',[
//         'title' => 'Login',
//         'judul' => 'Login',
//     ]);
// });
Route::get('/login',[LoginController::class, 'index']);
// Route::get('/login',[LoginController::class, 'authenticate']);
// Route::get('/login',[LoginController::class, 'authenticate']);
Route::get('/register',[RegisterController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// if (User::where("role","=", "admin")->exists())
// {
//     Auth::routes([
//         'register' => false
//     ]);

// }
// else
// {
//     Auth::routes();
// }

Route::get("search",[PostController::class,'search']);