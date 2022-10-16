<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string'
        ]);

        Category::create($validated);

        return \Redirect::route('categories.index');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
            'name' => 'required|string',
            'status' => 'required'
        ]);


        $category = Category::find($validated['id']);
        $category->update($validated);

        return \Redirect::route('categories.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();
        return \Redirect::route('categories.index');
    }
}
