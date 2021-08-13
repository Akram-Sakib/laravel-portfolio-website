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
        $result = json_encode(ServicesModel::orderBy("id", "desc")->get());
        return $result;
    }

    public function getServiceDetails(Request $request)
    {
        $id = $request->input("id");
        $result = json_encode(ServicesModel::where("id","=",$id)->get());
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

    public function serviceUpdate(Request $request)
    {
        $id = $request->input("id");
        $name = $request->input("name");
        $desc = $request->input("des");
        $img = $request->input("img");

        $result = ServicesModel::where("id","=",$id)->update(["service_name"=>$name, "service_des"=>$desc, "service_img"=>$img]);

        if ($result) {
            return 1;
        }else {
            return 0;
        }
    }

    public function serviceAdd(Request $request)
    {

        $name = $request->input("name");
        $desc = $request->input("des");
        $img = $request->input("img");

        $result = ServicesModel::insert(["service_name"=>$name, "service_des"=>$desc, "service_img"=>$img]);

        if ($result) {
            return 1;
        }else {
            return 0;
        }
    }
}
