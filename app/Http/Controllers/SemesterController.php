<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        return view('semesters');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date_start' => 'required',
            'date_end' => 'required'
        ]);

        Semester::create($validated);

        return \Redirect::route('semesters.index');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'status' => 'required'
        ]);

        $semester = Semester::find($validated['id']);

        $semester->update($validated);


        return \Redirect::route('semesters.index');
    }
}
