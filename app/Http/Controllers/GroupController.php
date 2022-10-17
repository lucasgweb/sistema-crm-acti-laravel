<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Group;
use App\Models\Modality;
use App\Models\Semester;
use App\Models\Teacher;
use App\Models\Type;
use Illuminate\Http\Request;
use Redirect;

class GroupController extends Controller
{
    public function index()
    {
        return view('groups', [
            'teachers' => Teacher::all(),
            'semesters' => Semester::all(),
            'courses' => Course::all(),
            'modalities' => Modality::all(),
            'types' => Type::all()
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string',
            'capacity' => 'required|numeric',
            'teacher_id' => 'required|numeric',
            'semester_id' => 'required|numeric',
            'course_id' => 'required|numeric',
            'modality_id' => 'required|numeric',
            'type_id' => 'required|numeric',
        ]);

        Group::create($validated);

        return Redirect::route('groups.index');
    }
}
