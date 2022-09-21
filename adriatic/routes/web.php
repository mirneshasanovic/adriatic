<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;


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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('posts', PostsController::class, [
    'names' => [
        'index' => 'post.index', 
        'create' => 'post.create', 
        'show' => 'post.show', 
        'destroy' => 'post.delete'
    ]
])->except(['update']);

Auth::routes();
