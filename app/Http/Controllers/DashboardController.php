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

        // Sum sold items
        $SoldItems = Category::sum('sold_quantity');

        // Fetch all logs and delete old logs
        Log::where('created_at', '<', Carbon::now()->subWeeks(2))->delete();
        $logs = Log::latest()->get();

        // Chart Data for Items
        $categories = Category::select('name', 'quantity')
                              ->orderBy('quantity', 'desc')
                              ->limit(5)
                              ->get();
        $itemlabels = $categories->pluck('name');
        $itemdata = $categories->pluck('quantity');
        $itemMaxData = $itemdata->max();
        $itemAdjustedMax = $itemMaxData + 10;

        // Service Data for Services Chart
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

        // Calculate total price sold for December
        $firstDayOfDecember = Carbon::createFromDate(Carbon::now()->year, 12, 1);
        $lastDayOfDecember = Carbon::createFromDate(Carbon::now()->year, 12, 31);

        $decemberSales = Category::whereBetween('created_at', [$firstDayOfDecember, $lastDayOfDecember])
                                 ->get()
                                 ->sum(function ($category) {
                                     return $category->sold_quantity * $category->price;
                                 });

        // Dummy data for October and November
        $juneSales = 86112;
        $julySales = 171870;
        $augustSales = 77392;
        $septemberSales = 57392;
        $octoberSales = 98282;  // Dummy value for October
        $novemberSales = 87528; // Dummy value for November

        // Prepare the data for the chart (October, November, December)
        $sales_data = [
            'June'=> $juneSales,
            'July'=> $julySales,
            'September'=> $septemberSales,
            'October' => $octoberSales,
            'November' => $novemberSales,
            'December' => $decemberSales,
        ];

        // Prepare labels (months)
        $labels = ['June', 'July', 'September', 'October', 'November', 'December'];

        return view('section.home', compact(
            'categoryCount', 'itemCount', 'totalQuantity', 'totalValue', 'SoldItems', 'logs',
            'itemlabels', 'itemdata', 'itemAdjustedMax', 'servicePrice',
            'service', 'status', 'ServiceAdjustedMax', 'completeCount', 'incompleteCount',
            'sales_data', 'labels' // Passing chart data
        ));
    }
}
