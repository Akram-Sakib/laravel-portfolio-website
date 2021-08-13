<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use App\Models\CourseModel;
use App\Models\ProjectsModel;
use App\Models\ServicesModel;
use App\Models\VisitorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function homeIndex()
    {
        $totalContact = ContactModel::count();
        $totalCourse  = CourseModel::count();
        $totalProject = ProjectsModel::count();
        $totalVisitor = VisitorModel::count();
        $totalService = ServicesModel::count();
        $totalUsers   = VisitorModel::distinct('ip_address')->count('ip_address');
        
        return view("home", ["totalContact"=>$totalContact,"totalCourse"=>$totalCourse,"totalProject"=>$totalProject,"totalVisitor"=>$totalVisitor,"totalService"=>$totalService,"totalUsers"=>$totalUsers]);

    }
}
