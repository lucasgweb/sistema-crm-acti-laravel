<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Modality;
use App\Models\Semester;
use App\Models\Teacher;
use App\Models\Type;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        return view('groups',[
            'teachers' => Teacher::all(),
            'semesters' => Semester::all(),
            'courses' => Course::all(),
            'modalities' => Modality::all(),
            'types' => Type::all()
        ]);
    }
}
