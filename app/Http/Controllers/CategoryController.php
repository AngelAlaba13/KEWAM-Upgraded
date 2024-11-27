<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(9);
        return view('section.items', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('section.itemsPage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|string|max:225",
            'category' => 'required|string|max:225',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:4096',
        ]);

        $imagePath = null;

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/categories', 'public');
        }

        // Calculate the value as quantity * price
        $value = $request->quantity * $request->price;


        $category = Category::create([
            'name' => $request->name,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'value' => $value,
            'image_path' => $imagePath,
        ]);

        $message = "Item {$category->name} added in {$category->category} category";
        Log::create(['message' => $message]);


        return redirect()->route('itemsPage.index')->with('status', 'Item Added Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $itemsPage)
    {
    }


    public function edit(Category $itemsPage)
    {
        return view('section.itemsPage.edit', compact('itemsPage'));
    }


    public function update(Request $request, Category $itemsPage)
    {
        $request->validate([
            'name' => "required|string|max:225",
            'category' => 'required|string|max:225',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:4096',
        ]);

        $imagePath = null;

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/categories', 'public');
        }

        // Calculate the value as quantity * price
        $value = $request->quantity * $request->price;


        $itemsPage->update([
            'name' => $request->name,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'value' => $value,
            'image_path' => $imagePath,
        ]);

            return redirect()->route('itemsPage.index')->with('status', 'Item Updated Successfully');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $itemsPage)
    {
        // Delete the category record
        $itemsPage->delete();

        // Get the maximum ID from the categories table
        $maxId = Category::max('id');

        // Reset the AUTO_INCREMENT value to the maximum ID
        DB::statement("ALTER TABLE categories AUTO_INCREMENT = {$maxId}");

        // Redirect back with a success message
        return redirect()->route('itemsPage.index')->with('status', 'Item deleted');
    }
}
