<?php

use App\Http\Controllers\AjaxTagController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Front\PostController As FrontPostController;

use App\Http\Controllers\SettingController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/',[HomeController::class ,'index'])->name('front.home');
Route::get('/about',[HomeController::class ,'about'])->name('front.layout.about');
Route::get('/contact',[HomeController::class ,'contact'])->name('front.layout.contact');
Route::post('/contact',[HomeController::class ,'sendMessage'])->name('front.sendMessage');
Route::get('search',[FrontPostController::class ,'search'])->name('front.search');


Route::middleware('auth')->group(function (){
    Route::get('posts',[PostController::class ,'index'])->name('posts.index');
    Route::get('posts/export',[PostController::class ,'export'])->name('posts.export');
    Route::get('posts/create',[PostController::class ,'create']);
    Route::get('posts/{id}',[PostController::class ,'show']);
    Route::post('posts',[PostController::class,'store']);
    Route::get('posts/{id}/edit',[PostController::class ,'edit']);
    Route::put('posts/{id}',[PostController::class ,'update']);
    Route::delete('posts/{id}',[PostController::class ,'destroy']);
    Route::resource('users', UserController::class );
    Route::get('user/{id}/posts',[UserController::class,'posts'])->name('user.posts');
    Route::resource('tags', TagController::class );
    Route::resource('ajax-tags', AjaxTagController::class );

    Route::get('settings/edit',[SettingController::class,'edit'])->name('settings.edit');
    Route::put('settings/edit',[SettingController::class,'update'])->name('settings.update');


});


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
