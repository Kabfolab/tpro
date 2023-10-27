<?php

namespace App\Http\Controllers;

// app/Http/Controllers/QuestionController.php

use Illuminate\Http\Request;
use App\Models\Product; // Make sure to import your Question model

class ProductController extends Controller
{

    public function create()
    {
        return view('createP');
    }


    public function store(Request $request)
{
    // Validate the form data, including the image
    $validatedData = $request->validate([
        'product_name' => 'required|string',
        'price' => 'required|numeric',
        'description' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the file types and maximum size as needed
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('public/images'); // Adjust the folder name as needed
        $imageName = basename($imagePath);
    }

    // Create a new product instance and save it to the database
    $product = new Product();
    $product->product_name = $validatedData['product_name'];
    $product->price = $validatedData['price'];
    $product->description = $validatedData['description'];
    $product->image = $imageName; // Store the image filename
    $product->save();

    // Redirect or return a response
    // ...

    // Optionally, you can flash a success message and redirect
    return redirect()->route('products.create')->with('success', 'Product added successfully');
}

public function index()
{
    $products = Product::all();
    return view('index', ['products' => $products]);
}

}
