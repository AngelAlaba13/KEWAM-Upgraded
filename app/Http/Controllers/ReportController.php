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
                    $categories->where('created_at', '==', Carbon::now()->subMonth());
                    break;
                case '2_weeks_ago':
                    $categories->where('created_at', '==', Carbon::now()->subWeeks(2));
                    break;
                case '1_week_ago':
                    $categories->where('created_at', '==', Carbon::now()->subWeek());
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
        // Sort the results in descending order by created_at
        $categories = $categories->orderBy('created_at', 'desc')->paginate(9);

        $categories->getCollection()->transform(function ($category) {
            // Calculate total_price_sold only if sold_quantity and price are valid
            $category->total_price_sold = $category->sold_quantity * $category->price;
            return $category;
        });


        return view('section.reportPage.itemsReport', [
            'categories' => $categories
        ]);
    }


    public function exportPdf(Request $request)
    {
        // Apply the same filter for exporting as in the view
        $timeFilter = $request->input('time_filter', null);
        $categories = Category::when($timeFilter, function ($query, $timeFilter) {
            switch ($timeFilter) {
                case '1_month_ago':
                    return $query->where('created_at', '>=', now()->subMonth());
                case '2_weeks_ago':
                    return $query->where('created_at', '>=', now()->subWeeks(2));
                case '1_week_ago':
                    return $query->where('created_at', '>=', now()->subWeek());
                case 'yesterday':
                    return $query->whereDate('created_at', '=', now()->yesterday()->toDateString());
                case 'today':
                    return $query->whereDate('created_at', '=', now()->toDateString());
                default:
                    return $query;
            }
        })
            // Ensure the results are sorted by created_at in descending order
            ->orderBy('created_at', 'desc')
            ->get();

        // Generate the timestamp for when the report is printed
        $timestamp = Carbon::now()->format('l, F j, Y \a\t h:i A');  // Example format: Monday, December 12, 2024 at 10:30 AM

        // Load the filtered categories into the PDF view
        $pdf = Pdf::loadView('pdf.itemsReport', [
            'categories' => $categories,
            'timestamp' => $timestamp  // Pass the timestamp to the view
        ]);

        // Stream the PDF to the browser (this opens the PDF in a new tab)
        return $pdf->stream('items-report.pdf');
    }
}
