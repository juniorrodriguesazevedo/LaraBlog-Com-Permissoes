<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PermissionController;

Route::group(['middleware' => 'auth'], function() {

    Route::get('/', function() {
        return redirect()->route('posts.index');
    })->name('home');

    Route::resources([
        'users' => UserController::class,
        'permissions' => PermissionController::class,
        'posts' => PostController::class
    ]);
});

Auth::routes();