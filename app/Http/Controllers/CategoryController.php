<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:categories,name',
        'description' => 'nullable|string'
    ]);

    Category::create($request->all());
    return back()->with('success', 'Category added successfully!');
}
}
