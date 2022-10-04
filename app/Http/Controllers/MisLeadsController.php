<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MisLeadsController extends Controller
{
    public function index()
    {
        return view('misleads');
    }
}
