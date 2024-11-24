<?php

use App\Http\Controllers\NavigationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'section.home');

Route::get('/section/home', [NavigationController::class, 'home'])
    ->name('section.home');
Route::get('section/items', [NavigationController::class, 'items'])
    ->name('section.items');
Route::get('section/repair', [NavigationController::class, 'repair'])
    ->name('section.repair');
Route::get('section/report', [NavigationController::class, 'report'])
    ->name('section.report');

Route::get('section/itemsPage.create', [CategoryController::class, 'create'])
    ->name('section.itemsPage.create');

Route::get('/section/items', [CategoryController::class, 'index'])
    ->name('section.items');

Route::get('section/itemsPage.edit', [CategoryController::class, 'edit'])
    ->name('section.itemsPage.edit');


Route::resource('itemsPage', CategoryController::class);


// Dashboard
Route::get('section/home', [DashboardController::class, 'countItem'])
    ->name('section.home');
