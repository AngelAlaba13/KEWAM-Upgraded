<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Dompdf\Dompdf;
use Dompdf\Options;

// use App\Models\Log;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            // Perform search if query exists
            return $this->search($request);
        }

        $services = Services::paginate(9); // Default items listing
        return view('section.repair', [
            'services' => $services
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('section.repairPage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Services $services)
    {
        Log::info('Entered store method');


        $request->validate([
            'clientName' => 'required|string|max:225',
            'address' => 'required|string|max:500',
            'contactNo' => 'required|string|max:225',
            'service' => 'required|string|max:225',
            'serviceDescription' => 'required|string|min:5|max:1000',
            'serviceProvider' => 'required|string|max:225',
            'price' => 'required|numeric',
            'status' => 'required|string|max:225',
        ]);

        Log::info('Validation passed');



        $services = Services::create([
            'clientName' => $request->clientName,
            'address' => $request->address,
            'contactNo' => $request->contactNo,
            'service' => $request->service,
            'serviceDescription' => $request->serviceDescription,
            'serviceProvider' => $request->serviceProvider,
            'price' => $request->price,
            'status' => $request->status,
        ]);


        Log::info('Service created successfully');


        $message = "A service for client {$services->clientName} has been recorded";
        \App\Models\Log::create(['message' => $message]);


        return redirect()->route('repairPage.index')
            ->with('status', 'Service has been recorded');
    }

    /**
     * Display the specified resource.
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $repairPage = Services::find($id);
        if ($repairPage) {
            return view('section.repairPage.edit', compact('repairPage')); // Ensure it's passed correctly
        } else {
            return redirect()->route('section.repair')->with('error', 'Repair page not found.');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Services $services, $id)
{
    $services = Services::find($id);
     // Log that the update method has been reached
    //  dd('Update method reached for ID: ' . $services->id);



    // Validate incoming request
    $request->validate([
        'clientName' => 'required|string|max:225',
        'address' => 'required|string|max:500',
        'contactNo' => 'required|string|max:225',
        'service' => 'required|string|max:225',
        'serviceDescription' => 'required|string|min:5|max:1000',
        'serviceProvider' => 'required|string|max:225',
        'price' => 'required|numeric',
        'status' => 'required|string|max:225',
    ]);

    // Update the service record
    $services->update([
        'clientName' => $request->clientName,
        'address' => $request->address,
        'contactNo' => $request->contactNo,
        'service' => $request->service,
        'serviceDescription' => $request->serviceDescription,
        'serviceProvider' => $request->serviceProvider,
        'price' => $request->price,
        'status' => $request->status,
    ]);

    // Log the update action
    $message = "A service was updated for client {$services->clientName}";
    \App\Models\Log::create(['message' => $message]);

    // Redirect back with a success message
    return redirect()->route('repairPage.index')->with('status', 'Service Updated Successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Services $services, $id)
{
    $services = Services::find($id);


    // Delete the service record
    $services->delete();

    // Get the maximum ID from the services table
    $maxId = Services::max('id');

    // Reset the AUTO_INCREMENT value to the maximum ID
    DB::statement("ALTER TABLE services AUTO_INCREMENT = {$maxId}");

    // Log the deletion action
    $message = "A service for client {$services->clientName} was deleted";
    \App\Models\Log::create(['message' => $message]);

    // Redirect back with a success message
    return redirect()->route('repairPage.index')->with('status', 'Service deleted successfully');
}



    public function search(Request $request)
    {
        $query = $request->input('query');

        $services = Services::where('clientName', 'like', "%{$query}%")
            ->orWhere('service', 'like', "%{$query}%")
            ->orWhere('serviceProvider', 'like', "%{$query}%")
            ->paginate(9); // Paginate search results for table display

        return view('section.repair', compact('services'));
    }




    public function suggestions(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $services = Services::where('clientName', 'like', "%{$query}%")
                ->orWhere('service', 'like', "%{$query}%")
                ->orWhere('serviceProvider', 'like', "%{$query}%")
                ->limit(5) // Limit to 5 results for suggestions
                ->get(['clientName', 'service', 'serviceProvider']);
        } else {
            $services = [];
        }

        return response()->json($services);
    }


    public function generatePDF(Request $request)
    {
        // Data from the request
        $data = $request->all();

        // Initialize DOMPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf($options);

        // Create the HTML content for the PDF
        $html = view('pdf.servicesReportPDF', compact('data'))->render();

        // Load the HTML content into DOMPDF
        $dompdf->loadHtml($html);

        // (Optional) Set paper size
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF (first pass)
        $dompdf->render();

        // Output the generated PDF (force download)
        return response()->stream(function() use ($dompdf) {
            echo $dompdf->output();
        }, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="service-details.pdf"',
        ]);
    }

}
