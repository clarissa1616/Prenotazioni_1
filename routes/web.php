<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrenotationController;
use App\Models\Plan;
use App\Models\Room;

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

//Prenotation routes
Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/booking', [PrenotationController::class , 'index'])->name('booking.index');

Auth::routes();

// ADMIN ROUTES
Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
Route::get('/admin', function() { return redirect()->route('admin.home'); });
Route::get('/admin/rooms', [AdminController::class, 'rooms'])->name('admin.rooms');
Route::get('/admin/plans', [AdminController::class, 'plans'])->name('admin.plans');
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/users/{user}/update', [AdminController::class, 'updateUser'])->name('user.update');

// VIEW ROOMS
Route::get('/rooms/index', [FrontController::class, 'indexRooms'])->name('rooms.index');
Route::get('/room/overview', [FrontController::class, 'overview'])->name('room.overview');
Route::get('/room/lacorte', [FrontController::class, 'lacorteRoom'])->name('room.lacorte');
Route::get('/room/ilborgo', [FrontController::class, 'ilborgoRoom'])->name('room.ilborgo');
Route::get('/room/lavilla', [FrontController::class, 'lavillaRoom'])->name('room.lavilla');

// ROOMS ROUTES
Route::put('/admin/room/store', [RoomController::class, 'store'])->name('room.store');
Route::get('/admin/room/index', [RoomController::class, 'index'])->name('room.index');
Route::get('/admin/room/{room}/show', [RoomController::class, 'show'])->name('room.show');
Route::get('/admin/room/{room}/edit', [RoomController::class, 'edit'])->name('room.edit');
Route::put('/admin/room/{room}/update', [RoomController::class, 'update'])->name('room.update');
Route::delete('/admin/room/{room}/destroy', [RoomController::class, 'destroy'])->name('room.destroy');

// PLANS ROUTES
Route::get('/admin/plan/create', [PlanController::class, 'create'])->name('plan.create');
Route::put('/admin/plan/store', [PlanController::class, 'store'])->name('plan.store');
Route::get('/admin/plan/index', [PlanController::class, 'index'])->name('plan.index');
Route::get('/admin/plan/{plan}/show', [PlanController::class, 'show'])->name('plan.show');
Route::get('/admin/plan/{plan}/edit', [PlanController::class, 'edit'])->name('plan.edit');
Route::put('/admin/plan/{plan}/update', [PlanController::class, 'update'])->name('plan.update');
Route::delete('/admin/plan/{plan}/destroy', [PlanController::class, 'destroy'])->name('plan.destroy');
