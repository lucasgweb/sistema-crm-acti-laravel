<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('students',[
            'courses' => $courses
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'document' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'course_id' => 'required',
            'address' => 'required|string'
        ]);

        Student::create($validated);

        return \Redirect::route('students.index');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
            'name' => 'required|string',
            'document' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'course_id' => 'required',
            'address' => 'required|string',
            'status' => 'required'
        ]);

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
