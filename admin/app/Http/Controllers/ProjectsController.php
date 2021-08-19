<?php

namespace App\Http\Controllers;

use App\Models\ProjectsModel;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function projectIndex()
    {

        return view("Projects");

    }

    public function getprojectData()
    {
        $result = json_encode(ProjectsModel::orderBy("id", "desc")->get());
        return $result;
    }

    public function getprojectsDetails(Request $request)
    {
        $id = $request->input("id");
        $result = json_encode(ProjectsModel::where("id","=",$id)->get());
        return $result;
    }

    public function projectDelete(Request $request)
    {
        $id = $request->input("id");
        $result = ProjectsModel::where("id","=",$id)->delete();

        if ($result) {
            return 1;
        }else {
            return 0;
        }
    }

    public function projectUpdate(Request $request)
    {
        $id                  = $request->input("id");
        $project_name        = $request->input("project_name");
        $project_des         = $request->input("project_des");
        $project_link        = $request->input("project_link");
        $project_img         = $request->input("project_img");

        $result = ProjectsModel::where("id","=",$id)->update(["project_name"=>$project_name, "project_des"=>$project_des,"project_link"=>$project_link, "project_img"=>$project_img]);

        if ($result) {
            return 1;
        }else {
            return 0;
        }
    }

    public function projectAdd(Request $request)
    {

        $project_name        = $request->input("project_name");
        $project_des         = $request->input("project_des");
        $project_link        = $request->input("project_link");
        $project_img         = $request->input("project_img");

        $result = ProjectsModel::insert(["project_name"=>$project_name, "project_des"=>$project_des,"project_link"=>$project_link, "project_img"=>$project_img]);

        if ($result) {
            return 1;
        }else {
            return 0;
        }
    }
}
