<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\Log;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
{
    // Count distinct categories
    $categoryCount = Category::distinct('category')->count('category');

    // Count total items
    $itemCount = Category::count();

    // Sum total quantities and values
    $totalQuantity = Category::sum('quantity');
    $totalValue = Category::sum('value');

    // Fetch all logs and delete old logs
    Log::where('created_at', '<', Carbon::now()->subWeeks(2))->delete();
    $logs = Log::latest()->get();

    // Chart Data
    $categories = Category::select('name', 'quantity')
                          ->orderBy('quantity', 'desc')
                          ->limit(5)
                          ->get();
    $itemlabels = $categories->pluck('name');
    $itemdata = $categories->pluck('quantity');
    $itemMaxData = $itemdata->max();
    $itemAdjustedMax = $itemMaxData + 10;

    $services = Services::select('price', 'service', 'status')
                        ->orderBy('price', 'desc')
                        ->limit(5)
                        ->get();
    $servicePrice = $services->pluck('price');
    $service = $services->pluck('service');
    $status = $services->pluck('status');
    $serviceMaxData = $servicePrice->max();
    $ServiceAdjustedMax = $serviceMaxData + 1000;

    $completeCount = $status->filter(fn($s) => $s === 'Complete')->count();
    $incompleteCount = $status->filter(fn($s) => $s === 'Incomplete')->count();

    return view('section.home', compact(
        'categoryCount', 'itemCount', 'totalQuantity', 'totalValue', 'logs',
        'itemlabels', 'itemdata', 'itemAdjustedMax', 'servicePrice',
        'service', 'status', 'ServiceAdjustedMax', 'completeCount', 'incompleteCount'
    ));
}

}

