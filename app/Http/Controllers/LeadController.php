<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $users = User::all();
        $channels = Channel::all();

        return view('leads',[
            'users' => $users,
            'courses' => $courses,
            'channels' => $channels
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'
        ]);
    }
}
