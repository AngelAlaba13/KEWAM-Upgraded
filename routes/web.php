<?php

use App\Http\Controllers\NavigationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
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
    return redirect()->route('section.login');
});

//login Routes
Route::get('section/register', [AuthController::class, 'showRegisterForm'])
    ->name('section.register');
Route::post('section/register', [AuthController::class, 'section.register']);
Route::get('section/login', [AuthController::class, 'showLoginForm'])
    ->name('section.login');
Route::post('section/login', [LoginController::class, 'login']);
Route::post('section/logout', [AuthController::class, 'section.logout'])
    ->name('section.logout');

//Navigation Routes
Route::get('/section/home', [NavigationController::class, 'home'])
    ->name('section.home');
Route::get('section/items', [NavigationController::class, 'items'])
    ->name('section.items');
Route::get('section/repair', [NavigationController::class, 'repair'])
    ->name('section.repair');
Route::get('section/reportPage/itemsReport', [NavigationController::class, 'report'])
    ->name('section.reportPage.itemsReport');

// Routes for category-related actions
Route::get('section/itemsPage.create', [CategoryController::class, 'create'])
    ->name('section.itemsPage.create');
Route::get('/section/items', [CategoryController::class, 'index'])
    ->name('section.items');
Route::get('section/itemsPage.edit', [CategoryController::class, 'edit'])
    ->name('section.itemsPage.edit');
Route::get('section/itemsPage.sell', [CategoryController::class, 'sell'])
    ->name('section.itemsPage.sell');
// sell item

// Process the sale (when the user submits the sell form)
Route::post('section/itemsPage/sell/{category}', [CategoryController::class, 'sellItem'])
    ->name('itemsPage.sell.submit');


Route::resource('itemsPage', CategoryController::class);
Route::resource('repairPage', ServicesController::class);


// Routes for repair-related actions
Route::get('section/repairPage.create', [ServicesController::class, 'create'])
    ->name('section.repairPage.create');
Route::get('/section/repair', [ServicesController::class, 'index'])
    ->name('section.repair');


// Dashboard route
Route::get('section/home', [DashboardController::class, 'dashboard'])
    ->name('section.home');

// Route::get('section/home', [DashboardController::class, 'charts'])
//     ->name('section.home');



// Search functionality items
Route::get('/search/suggestions', [CategoryController::class, 'suggestions'])
    ->name('search.suggestions'); // For the search suggestions
Route::get('/search/service-suggestions', [ServicesController::class, 'suggestions'])
    ->name('search.service.suggestions');

// Open pdf
Route::get('/view-pdf/serviceSheet.pdf', function () {
    $path = storage_path("app/public/pdfs/serviceSheet.pdf");

    if (file_exists($path)) {
        return response()->file($path);
    }

    abort(404);
});


Route::get('/export-pdf', [ReportController::class, 'exportPdf'])->name('export.pdf');

Route::post('/generate-pdf', [ServicesController::class, 'generatePDF'])->name('generatePDF');





// report route
Route::get('section/reportPage/itemsReport', [ReportController::class, 'report'])
    ->name('section.reportPage.itemsReport');

Route::post('section/login', [LoginController::class, 'login']);
