<?php

namespace App\Http\Controllers;

use App\Models\ReviewModel;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function reviewIndex()
    {

        return view("Review");

    }

    public function getreviewData()
    {
        $result = json_encode(ReviewModel::orderBy("id", "desc")->get());
        return $result;
    }

    public function getreviewsDetails(Request $request)
    {
        $id = $request->input("id");
        $result = json_encode(ReviewModel::where("id","=",$id)->get());
        return $result;
    }

    public function reviewDelete(Request $request)
    {
        $id = $request->input("id");
        $result = ReviewModel::where("id","=",$id)->delete();

        if ($result) {
            return 1;
        }else {
            return 0;
        }
    }

    public function reviewUpdate(Request $request)
    {
        $id    = $request->input("id");
        $name  = $request->input("name");
        $des   = $request->input("des");
        $img   = $request->input("img");

        $result = ReviewModel::where("id","=",$id)->update(["name"=>$name, "des"=>$des,"img"=>$img]);

        if ($result) {
            return 1;
        }else {
            return 0;
        }
    }

    public function reviewAdd(Request $request)
    {

        $name = $request->input("name");
        $des  = $request->input("des");
        $img  = $request->input("img");

        $result = ReviewModel::insert(["name"=>$name, "des"=>$des,"img"=>$img]);

        if ($result) {
            return 1;
        }else {
            return 0;
        }
    }
}
