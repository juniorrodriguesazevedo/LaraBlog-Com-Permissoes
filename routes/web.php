<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PermissionController;

Route::group(['middleware' => 'auth'], function() {

    Route::post('users/store/permissions/{user}', [UserController::class, 'storePermissionsUser'])->name('users.store.permissions');
    
    Route::resources([
        'users' => UserController::class,
        'permissions' => PermissionController::class,
        'posts' => PostController::class
    ]);
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
