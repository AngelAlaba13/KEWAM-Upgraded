<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function countItem(){

        // Count distinct categories
        $categoryCount = Category::distinct('category')->count('category');  // Ensure to count distinct categories

        // Count total items (assuming 'items' table exists and has a 'category_id' column)
        $itemCount = Category::count();  // Count total items from 'Item' model, assuming you have this table
        $totalQuantity = Category::sum('quantity');  // Sum of all quantities from the 'quantity' column in the 'items' table
        $totalValue = Category::sum('value');

        return view('section.home', compact('itemCount', 'categoryCount', 'totalQuantity', 'totalValue'));
    }
}
