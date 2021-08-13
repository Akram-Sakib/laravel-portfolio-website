<?php

namespace App\Http\Controllers;

use App\Models\CourseModel;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    
    public function CoursePage()
    {
        $courseData = json_decode(CourseModel::orderBy('id', 'desc')->limit(10)->get());
        return view("Course", ["coursesData"=>$courseData]);
    }

}
