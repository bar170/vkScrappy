<?php

use App\Http\Controllers\Friends;
use App\Http\Controllers\Groups;
use App\Http\Controllers\TargetsController;
use App\Lib\Request\Auth\AuthVk;
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
Route::get('/dashboard/add', [App\Http\Controllers\HomeController::class, 'showAddTargetForm'])->name('target.add');
Route::get('/home/update_token', [App\Http\Controllers\DashboardController::class, 'updateToken'])->name('dashboard.updateToken');
Route::get('/dashboard/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
//Route::post('/home/', [App\Http\Controllers\HomeController::class, 'storeTarget'])->name('target.store');


Route::get('/dashboard/friends/list', [Friends::class, 'getListFriends'])->name('friends.list');
Route::get('/dashboard/user/{id}', [Friends::class, 'getDetailUser'])->name('user.detail');
Route::get('/dashboard/user/', [Friends::class, 'getDetailUserFromForm'])->name('user.detailForm');


Route::get('/dashboard/groups/list', [Groups::class, 'getListGroups'])->name('groups.list');

//2 строки ниже - не трогать
//2 строка должна вести на домашний раздел пользователя
Auth::routes();
Route::get('/home/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard.index');

Route::get('/{target}', [TargetsController::class, 'detail'])->name('detail');
