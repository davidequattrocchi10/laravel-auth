<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('welcome', ['latest_projects' => Project::orderByDesc('id')->take(4)->get()]);
    }
}
