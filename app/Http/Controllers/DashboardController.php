<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Log;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function countItem()
    {
        // Count distinct categories
        $categoryCount = Category::distinct('category')->count('category');  // Ensure to count distinct categories

        // Count total items
        $itemCount = Category::count();  // Count total items from 'categories' table

        // Debug the value of $itemCount


        $totalQuantity = Category::sum('quantity');  // Sum of all quantities from the 'quantity' column
        $totalValue = Category::sum('value');

        // Delete logs older than 2 weeks
        Log::where('created_at', '<', Carbon::now()->subWeeks(2))->delete();

        // Fetch all logs
        $logs = Log::latest()->get();


        return view('section.home', compact('categoryCount', 'itemCount', 'totalQuantity', 'totalValue', 'logs'));
    }
}

