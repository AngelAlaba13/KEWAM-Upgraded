<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            // Perform search if query exists
            return $this->search($request);
        }

        $categories = Category::paginate(9); // Default items listing
        return view('section.reportPage.itemsReport', [
            'categories' => $categories
        ]);
    }
}
