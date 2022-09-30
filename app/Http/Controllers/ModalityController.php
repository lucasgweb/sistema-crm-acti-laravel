<?php

namespace App\Http\Controllers;

use App\Models\Modality;
use Illuminate\Http\Request;

class ModalityController extends Controller
{
    public function index()
    {
        return view('modalities');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string'
        ]);

        Modality::create($validated);

        return \Redirect::route('modalities.index');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
            'name' => 'required|string',
            'status' => 'required'
        ]);


        $modality = Modality::find($validated['id']);

        $modality->name = $validated['name'];
        $modality->status = $validated['status'];

        $modality->save();

        return \Redirect::route('modalities.index');
    }

    public function destroy($id)
    {
        $modality = Modality::find($id);

        $modality->delete();
        return \Redirect::route('modalities.index');
    }
}
