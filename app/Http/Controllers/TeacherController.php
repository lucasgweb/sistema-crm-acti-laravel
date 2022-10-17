<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teachers',[
            'courses' => Course::where('status', 1)->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'document' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'course_id' => 'required|numeric',
            'address' => 'required|string',
            'remuneration' => 'required|numeric'
        ]);

        $validated['name'] = ucwords($validated['name']);
        $validated['email'] = strtolower($validated['email']);

        Teacher::create($validated);

        return \Redirect::route('teachers.index');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|numeric',
            'name' => 'required|string',
            'document' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'course_id' => 'required|numeric',
            'address' => 'required|string',
            'status' => 'required|numeric',
            'remuneration' => 'required'
        ]);

        $validated['name'] = ucwords($validated['name']);
        $validated['email'] = strtolower($validated['email']);
        
        $teacher = Teacher::where('id',$validated['id'])->first();

        if ($teacher)
        {
            $teacher->update($validated);
        }
        return \Redirect::route('teachers.index');
    }

    public function destroy($id)
    {

        $teacher = Teacher::find($id);

        $teacher?->delete();

        return \Redirect::route('teachers.index');
    }
}
