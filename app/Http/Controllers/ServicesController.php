<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Log;

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
    public function store(Request $request)
    {
        $request->validate([
            'clientName' => 'required|string|max:225',
            'dateTime' => 'required|date|after:now',
            'address' => 'required|string|max:225',
            'contactNo' => 'required|string|max:225',
            'service' => 'required|string|max:225',
            'serviceDescription' => 'required|string|min:5|max:1000',
            'serviceProvider' => 'required|string|max:225',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:4096',
        ]);

        // Handle image upload
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('serviceUploads', 'public');
        }


        $service = Services::create([
            'clientName' => $request->clientName,
            'dateTime' => $request->dateTime,
            'address' => $request->address,
            'contactNo' => $request->contactNo,
            'service' => $request->service,
            'serviceDescription' => $request->serviceDescription,
            'serviceProvider' => $request->serviceProvider,
            'price' => $request->price,
            'image_path' => $imagePath, // Store image path
        ]);

        $message = "A service has been recorded";
        Log::create(['message' => $message]);


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
    public function edit(Services $services)
    {
        return view('section.repairPage.edit', compact('services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Services $services)
    {
        $request->validate([
            'clientName' => 'required|string|max:225',
            'dateTime' => 'required|date|after:now',
            'address' => 'required|string|max:225',
            'contactNo' => 'required|string|max:225',
            'service' => 'required|string|max:225',
            'serviceDescription' => 'required|string|min:5|max:1000',
            'serviceProvider' => 'required|string|max:225',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:4096',
        ]);

        // Handle image upload
        $imagePath = $services->image_path;  // Keep the existing image path if no new image is uploaded

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($services->image_path && file_exists(storage_path('app/public/' . $services->image_path))) {
                unlink(storage_path('app/public/' . $services->image_path));
            }

            // Store the new image
            $imagePath = $request->file('image')->store('serviceUploads', 'public');
        }

        // Update the category
        $services->update([
            'clientName' => $request->clientName,
            'dateTime' => $request->dateTime,
            'address' => $request->address,
            'contactNo' => $request->contactNo,
            'service' => $request->service,
            'serviceDescription' => $request->serviceDescription,
            'serviceProvider' => $request->serviceProvider,
            'price' => $request->price,
            'image_path' => $imagePath, // Store image path
        ]);

        $message = "A service was updated";
        Log::create(['message' => $message]);

        return redirect()->route('repairPage.index')->with('status', 'Service Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Services $services)
    {
        // Delete the category record
        $services->delete();

        // Get the maximum ID from the categories table
        $maxId = Services::max('id');

        // Reset the AUTO_INCREMENT value to the maximum ID
        DB::statement("ALTER TABLE services AUTO_INCREMENT = {$maxId}");


        $message = "A service was deleted";
        Log::create(['message' => $message]);

        // Redirect back with a success message
        return redirect()->route('repairPage.index')->with('status', 'Service deleted');
    }
}
