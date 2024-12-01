<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Services;

class ReportsController extends Controller
{
    public function charts()
    {
        // Fetch the item name and quantity from the categories table
        $categories = Category::select('name', 'quantity')
                              ->orderBy('quantity', 'desc')  // Sort by quantity in descending order
                              ->limit(5)  // Limit to the top 5 items
                              ->get();

        // Process data for chart
        $itemlabels = $categories->pluck('name'); // Get item names for labels
        $itemdata = $categories->pluck('quantity'); // Get quantities for data

        // Calculate the max quantity and add a value to it for chart scaling
        $itemMaxData = $itemdata->max();
        $itemAdjustedMax = $itemMaxData + 2; // Add an extra value (10 in this case) to ensure the max is not the highest



        $services = Services::select('price', 'service', 'status')
                              ->orderBy('price', 'desc')  // Sort by quantity in descending order
                              ->limit(5)  // Limit to the top 5 items
                              ->get();

        // Process data for chart
        $servicePrice = $services->pluck('price');
        $service = $services->pluck('service');
        $status = $services->pluck('status');

        // Calculate the max quantity and add a value to it for chart scaling
        $serviceMaxData = $servicePrice->max();
        $ServiceAdjustedMax = $serviceMaxData + 1000; // Add an extra value (10 in this case) to ensure the max is not the highest

        // Assuming $status contains the status data, e.g. ['complete', 'incomplete', 'complete']
        $completeCount = $status->filter(fn($s) => $s === 'Complete')->count();
        $incompleteCount = $status->filter(fn($s) => $s === 'Incomplete')->count();


        // Pass the counts to JavaScript



        // Return the data to the view
        return view('section.report', compact('itemlabels', 'itemdata', 'itemAdjustedMax', 'servicePrice', 'service', 'status', 'ServiceAdjustedMax', 'completeCount', 'incompleteCount'));
    }
}
