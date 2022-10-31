<?php

use App\Http\Controllers\Friends;
use App\Http\Controllers\TargetsController;
use App\Lib\Auth\AuthVk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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


Route::get('/', [\App\Http\Controllers\Welcome::class, 'index'])->name('index');
Route::get('/home/add', [App\Http\Controllers\HomeController::class, 'showAddTargetForm'])->name('target.add');
Route::get('/home/update_token', [App\Http\Controllers\DashboardController::class, 'updateToken'])->name('dashboard.updateToken');
Route::get('/home/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
//Route::post('/home/', [App\Http\Controllers\HomeController::class, 'storeTarget'])->name('target.store');


Route::get('/home/friends/list', [Friends::class, 'listFriends'])->name('friends.list');

//2 строки ниже - не трогать
//2 строка должна вести на домашний раздел пользователя
Auth::routes();
Route::get('/home/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard.index');

Route::get('/{target}', [TargetsController::class, 'detail'])->name('detail');
