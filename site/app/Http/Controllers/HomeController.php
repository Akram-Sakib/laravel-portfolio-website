<?php

namespace App\Http\Controllers;

use App\Models\ServicesModel;
use App\Models\VisitorModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function HomeIndex()
    {
        $UserIp = $_SERVER["REMOTE_ADDR"];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate = date("Y-m-d h:i:sa");
        VisitorModel::insert(["ip_address"=>$UserIp,"visit_time"=>$timeDate]);

        $servicesData = json_decode(ServicesModel::all());
        return view("home", ["servicesdata"=>$servicesData]);
    }
}
