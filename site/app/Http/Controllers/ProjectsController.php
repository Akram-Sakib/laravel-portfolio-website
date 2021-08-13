<?php

namespace App\Http\Controllers;

use App\Models\ProjectsModel;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function ProjectsPage()
    {
        $projectsData = json_decode(ProjectsModel::orderBy('id', 'desc')->limit(10)->get());
        return view("Projects", ["projectsData"=>$projectsData]);
    }
}
