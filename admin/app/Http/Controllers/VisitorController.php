<?php

namespace App\Http\Controllers;

use App\Models\VisitorModel;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function visitorIndex()
    {
        $VisitorData = json_decode(VisitorModel::orderBy('id','desc')->take(500)->get());
        return view('visitor', ["visitorsdata"=>$VisitorData]);
    }
}
