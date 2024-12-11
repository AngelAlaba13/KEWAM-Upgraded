<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;  // Import Carbon for date manipulation
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function report(Request $request)
    {
        $query = $request->input('query');
        $timeFilter = $request->input('time_filter');  // Get the selected time filter

        $categories = Category::query();  // Start with the query builder

        // Apply the time filter if selected
        if ($timeFilter) {
            switch ($timeFilter) {
                case '1_month_ago':
                    $categories->where('created_at', '>=', Carbon::now()->subMonth());
                    break;
                case '2_weeks_ago':
                    $categories->where('created_at', '>=', Carbon::now()->subWeeks(2));
                    break;
                case '1_week_ago':
                    $categories->where('created_at', '>=', Carbon::now()->subWeek());
                    break;
                case 'yesterday':
                    $categories->whereDate('created_at', Carbon::yesterday());
                    break;
                case 'today':
                    $categories->whereDate('created_at', Carbon::today());
                    break;
            }
        }

        // Apply search filter if search query exists
        if ($query) {
            return $this->search($request);  // If there is a search query, use the search function
        }

        // Default listing or after filtering
        $categories = $categories->paginate(9);

        return view('section.reportPage.itemsReport', [
            'categories' => $categories
        ]);
    }

    public function exportPdf()
    {
        // Fetch categories (no join, simple query)
        $categories = Category::all();

        // Render the view and pass the data to it
        $pdf = Pdf::loadView('pdf.itemsReport', compact('categories'));

        // Return the generated PDF as a download
        return $pdf->download('items-report.pdf');
    }



}

