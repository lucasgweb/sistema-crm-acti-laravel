<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        return view('types');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string'
        ]);

        Type::create($validated);

        return \Redirect::route('types.index');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
            'name' => 'required|string',
            'status' => 'required'
        ]);


        $type = Type::find($validated['id']);

        $type->update($validated);

        return \Redirect::route('types.index');
    }

    public function destroy($id)
    {
        $type = Type::find($id);

        $type->delete();
        return \Redirect::route('types.index');
    }
}
