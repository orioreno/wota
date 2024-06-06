<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(Request $request)
    {
        $data['my_projects'] = Project::get_my_projects();
        return view('dashboard.index', $data);
    }
}
