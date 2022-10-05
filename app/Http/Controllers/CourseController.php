<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $code = Course::orderByDesc('id')->first();
        $code = $code->code + 1;

        return view('courses',[
            'code' => $code
        ]);
    }
}
