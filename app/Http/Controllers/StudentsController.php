<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        return view('students',[
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
            'address' => 'required|string'
        ]);

        $validated['name'] = ucwords($validated['name']);
        $validated['email'] = strtolower($validated['email']);

        Student::create($validated);

        return \Redirect::route('students.index');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
            'name' => 'required|string',
            'document' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'course_id' => 'required|numeric',
            'address' => 'required|string',
            'status' => 'required|numeric'
        ]);

        $validated['name'] = ucwords($validated['name']);
        $validated['email'] = strtolower($validated['email']);
        
        $student = Student::where('id',$validated['id'])->first();

        if ($student)
        {
            $student->update($validated);

            $student->save();
        }
        return \Redirect::route('students.index');
    }

    public function destroy($id)
    {

        $student = Student::find($id);

        $student?->delete();

        return \Redirect::route('students.index');
    }
}
