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
    public function index(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            // Perform search if query exists
            return $this->search($request);
        }

        $categories = Category::paginate(9); // Default items listing
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

        // Handle image upload
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
        }

        // Calculate the value as quantity * price
        $value = $request->quantity * $request->price;


        $category = Category::create([
            'name' => $request->name,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'value' => $value,
            'image_path' => $imagePath, // Store image path
        ]);

        $message = "Item {$category->name} added in {$category->category} category";
        Log::create(['message' => $message]);


        return redirect()->route('itemsPage.index')
            ->with('status', 'Item Added Successfully');

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

        // Handle image upload
        $imagePath = $itemsPage->image_path;  // Keep the existing image path if no new image is uploaded

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($itemsPage->image_path && file_exists(storage_path('app/public/' . $itemsPage->image_path))) {
                unlink(storage_path('app/public/' . $itemsPage->image_path));
            }

            // Store the new image
            $imagePath = $request->file('image')->store('uploads', 'public');
        }

        // Calculate the value as quantity * price
        $value = $request->quantity * $request->price;

        // Update the category
        $itemsPage->update([
            'name' => $request->name,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'value' => $value,
            'image_path' => $imagePath, // Update image path
        ]);

        $message = "Item {$itemsPage->name} was updated";
        Log::create(['message' => $message]);

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


        $message = "Item {$itemsPage->name} was deleted";
        Log::create(['message' => $message]);

        // Redirect back with a success message
        return redirect()->route('itemsPage.index')->with('status', 'Item deleted');
    }




    public function search(Request $request)
    {
        $query = $request->input('query');

        $categories = Category::where('name', 'like', "%{$query}%")
            ->orWhere('category', 'like', "%{$query}%")
            ->paginate(9); // Paginate search results for table display

        return view('section.items', compact('categories'));
    }




    public function suggestions(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $categories = Category::where('name', 'like', "%{$query}%")
                ->orWhere('category', 'like', "%{$query}%")
                ->limit(5) // Limit to 5 results for suggestions
                ->get(['name', 'category']);
        } else {
            $categories = [];
        }

        return response()->json($categories);
    }



    public function sell(Category $category){

        // Fetch all categories from the database
        $categories = Category::all();



        return view('section.itemsPage.sell', compact('categories'));

    }

    public function sellItem(Request $request, Category $category)
{
    // Get the updated quantity from the form submission
    $quantityToSell = $request->input('quantity');

    // Validate the input to ensure it's a valid number
    if (!is_numeric($quantityToSell) || $quantityToSell < 1) {
        return redirect()->route('section.itemsPage.sell')
            ->with('status', 'Invalid quantity.');
    }

    // Ensure there's enough stock to sell
    if ($category->quantity < $quantityToSell) {
        return redirect()->route('section.itemsPage.sell')
            ->with('status', 'Not enough stock to sell.');
    }

    // Update the item's quantity in the database
    $category->quantity -= $quantityToSell; // Decrease the quantity
    $category->save(); // Save the updated category

    // Log the sale (optional)
    $message = "Sold {$quantityToSell} {$category->name}. Remaining stock: {$category->quantity}";
    Log::create(['message' => $message]);

    // Return a success message
    return redirect()->route('section.itemsPage.sell')
        ->with('status', "Successfully sold {$quantityToSell} of {$category->name}.");
}






}
