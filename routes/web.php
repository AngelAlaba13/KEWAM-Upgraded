<?php

use App\Http\Controllers\NavigationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ReportController;
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
Route::get('section/registration', [AuthController::class, 'showRegistrationForm'])
    ->name('section.registration');
Route::post('section/registration', [AuthController::class, 'register']);
Route::get('section/login', [AuthController::class, 'showLoginForm'])
    ->name('section.login');
Route::post('section/login', [AuthController::class, 'login']);
Route::post('section/logout', [AuthController::class, 'logout'])
    ->name('section.logout');


//Navigation Routes
Route::get('/section/home', [NavigationController::class, 'home'])
    ->name('section.home')
    ->middleware('auth');

Route::get('section/items', [NavigationController::class, 'items'])
    ->name('section.items')
    ->middleware('auth');

Route::get('section/repair', [NavigationController::class, 'repair'])
    ->name('section.repair')
    ->middleware('auth');

Route::get('section/reportPage/itemsReport', [NavigationController::class, 'report'])
    ->name('section.reportPage.itemsReport')
    ->middleware('auth');

// Routes for category-related actions
Route::get('section/itemsPage.create', [CategoryController::class, 'create'])
    ->name('section.itemsPage.create')
    ->middleware('auth');

Route::get('/section/items', [CategoryController::class, 'index'])
    ->name('section.items')
    ->middleware('auth');

Route::get('section/itemsPage.edit', [CategoryController::class, 'edit'])
    ->name('section.itemsPage.edit')
    ->middleware('auth');

Route::get('section/itemsPage.sell', [CategoryController::class, 'sell'])
    ->name('section.itemsPage.sell')
    ->middleware('auth');
// sell item

// Process the sale (when the user submits the sell form)
Route::post('section/itemsPage/sell/{category}', [CategoryController::class, 'sellItem'])
    ->name('itemsPage.sell.submit')
    ->middleware('auth');


Route::resource('itemsPage', CategoryController::class)
    ->middleware('auth');

Route::resource('repairPage', ServicesController::class)
    ->middleware('auth');


// Routes for repair-related actions
Route::get('section/repairPage.create', [ServicesController::class, 'create'])
    ->name('section.repairPage.create')
    ->middleware('auth');

Route::get('/section/repair', [ServicesController::class, 'index'])
    ->name('section.repair')
    ->middleware('auth');


// Dashboard route
Route::get('section/home', [DashboardController::class, 'dashboard'])
    ->name('section.home')
    ->middleware('auth');

// Route::get('section/home', [DashboardController::class, 'charts'])
//     ->name('section.home');



// Search functionality items
Route::get('/search/suggestions', [CategoryController::class, 'suggestions'])
    ->name('search.suggestions')
    ->middleware('auth');

Route::get('/search/service-suggestions', [ServicesController::class, 'suggestions'])
    ->name('search.service.suggestions')
    ->middleware('auth');

// Open pdf
Route::get('/view-pdf/serviceSheet.pdf', function () {
    $path = storage_path("app/public/pdfs/serviceSheet.pdf");

    if (file_exists($path)) {
        return response()->file($path);
    }

    abort(404);
});


Route::get('/export-pdf', [ReportController::class, 'exportPdf'])->name('export.pdf')->middleware('auth');

Route::post('/generate-pdf', [ServicesController::class, 'generatePDF'])->name('generatePDF')->middleware('auth');





// report route
Route::get('section/reportPage/itemsReport', [ReportController::class, 'report'])
    ->name('section.reportPage.itemsReport')
    ->middleware('auth');
