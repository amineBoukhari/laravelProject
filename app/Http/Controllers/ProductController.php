<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category; // Assuming Category model exists
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    /**
     * Display a listing of the product.
     * Optionally filter by category.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        
        // If a category is specified, filter by it
        $categoryName = $request->get('category');
        $products = $categoryName ? 
                    Product::whereHas('category', function($query) use ($categoryName) {
                        $query->where('name', $categoryName);
                    })->paginate($perPage) :
                    Product::paginate($perPage);

        $categories = Category::all(); // Pass categories to view for filtering options
        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new product.
     * Include categories for selection.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(); // Retrieve all categories for the dropdown
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created product in the database.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id' // Ensure the category exists
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    /**
     * Update the specified product in the database.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0', // Ensure non-negative prices
            'category_id' => 'required|exists:categories,id' // Validate that the category ID exists in the 'categories' table
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            $product = Product::findOrFail($id);
            $product->update($request->all());
            return redirect()->route('products.index')->with('success', 'Product updated successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }
    }

    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $product = Product::findOrFail($id);
            return view('products.show', compact('product'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }
    }

    /**
     * Show the form for editing a specified product.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // Assuming Category model exists and is correct
        return view('products.edit', compact('product', 'categories'));
    }
    
    /**
     * Remove the specified product from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete(); // Delete the product
    
            return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }
    }
}
