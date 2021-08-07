<?php

namespace App\Http\Controllers;

use App\Models\ServicesModel;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function serviceIndex()
    {
        return view("Service");
    }

    public function getServiceData()
    {
        $result = json_encode(ServicesModel::all());
        return $result;
    }

    public function serviceDelete(Request $request)
    {
        $id = $request->input("id");
        $result = ServicesModel::where("id","=",$id)->delete();

        if ($result) {
            return 1;
        }else {
            return 0;
        }
    }
}
