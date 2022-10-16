<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $code = Course::orderByDesc('id')->first();
        $code = $code->code + 1;

        return view('courses',[
            'code' => $code,
            'categories' => Category::where('status',1)->get()
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'category_id' => 'required',
            'amount_hours' => 'required',
            'description' => 'required'
        ]);

        Course::create($validated);

        return \Redirect::route('courses.index');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
            'code' => 'required',
            'name' => 'required',
            'category_id' => 'required',
            'amount_hours' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $course = Course::find($validated['id']);
        $course->update($validated);
        $course->save();

        return \Redirect::route('courses.index');
    }

}
