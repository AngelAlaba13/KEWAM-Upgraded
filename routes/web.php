<?php

use App\Http\Controllers\NavigationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/

// Default home view (redirect root to /section/home)
Route::get('/', function () {
    return redirect()->route('section.home');
});

Route::get('/section/home', [NavigationController::class, 'home'])
    ->name('section.home');
Route::get('section/items', [NavigationController::class, 'items'])
    ->name('section.items');
Route::get('section/repair', [NavigationController::class, 'repair'])
    ->name('section.repair');
Route::get('section/report', [NavigationController::class, 'report'])
    ->name('section.report');

// Routes for category-related actions
Route::get('section/itemsPage.create', [CategoryController::class, 'create'])
    ->name('section.itemsPage.create');
Route::get('/section/items', [CategoryController::class, 'index'])
    ->name('section.items');
Route::get('section/itemsPage.edit', [CategoryController::class, 'edit'])
    ->name('section.itemsPage.edit');

Route::resource('itemsPage', CategoryController::class);
Route::resource('repairPage', ServicesController::class);


// Routes for repair-related actions
Route::get('section/repairPage.create', [ServicesController::class, 'create'])
    ->name('section.repairPage.create');
Route::get('/section/repair', [ServicesController::class, 'index'])
    ->name('section.repair');



// Dashboard route
Route::get('section/home', [DashboardController::class, 'countItem'])
    ->name('section.home');

// Search functionality items
Route::get('/search/suggestions', [CategoryController::class, 'suggestions'])
    ->name('search.suggestions'); // For the search suggestions

// Search functionality repair
Route::get('/search/suggestions', [ServicesController::class, 'suggestions'])
    ->name('search.suggestions'); // For the search suggestions

// Route::get('section/itemsPage/search', [CategoryController::class, 'search'])
//     ->name('section.itemsPage.search'); // For displaying the search resultsearch results
