<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Course;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'user_id' => 'required',
            'course_id' => 'required',
            'channel_id' => 'required',
            'description' => 'nullable'
        ]);

        Lead::create($validated);

        return Redirect::route('leads.index');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'course_id' => 'required',
            'channel_id' => 'required',
            'description' => 'nullable'
        ]);


        Lead::where('id',$validated['id'])->update($validated);

        return Redirect::route('leads.index');
    }

    public function updateUser(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
            'user_id' => 'required',
        ]);

        Lead::where('id',$validated['id'])->update($validated);

        return Redirect::route('leads.index');
    }
    public function destroy($id)
    {
        $lead = Lead::find($id);

        $lead?->delete();

        return Redirect::route('leads.index');
    }
}
