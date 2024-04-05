<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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

Route::get('/', [AppController::class, 'index'])->name('app.index');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/my-account', [UserController::class, 'index'])->name('user.index');
});

// authミドルウェアが最初に適用され、その後にauth.adminミドルウェアが適用される。
// これにより、ユーザーが認証されているかどうかを確認し、次にユーザーが管理者であるかどうかを確認する。
Route::middleware(['auth', 'auth.admin'])->group(function(){
    Route::get('admin', [AdminController::class, 'index' ])->name('admin.index');
});