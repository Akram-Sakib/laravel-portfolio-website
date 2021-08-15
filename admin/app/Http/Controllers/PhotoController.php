<?php

namespace App\Http\Controllers;

use App\Models\PhotoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller {
    public function photoIndex() {
        return view("Photo");
    }

    public function photoJSON() {
        return PhotoModel::take(3)->get();
    }

    public function photoDelete(Request $request) {

        $OldPhotoUrl = $request->input("OldPhotoUrl");
        $OldPhotoID  = $request->input("id");

        $OldPhotoUrlArray = explode('/',$OldPhotoUrl);
        $OldPhotoName     = end($OldPhotoUrlArray);
        
        $DeletePhotoFile = Storage::delete("public/",$OldPhotoName);

        $DeleteRow = PhotoModel::where("id","=",$OldPhotoID)->delete();
        return $DeleteRow;
        
    }

    public function photoJSONById(Request $request) {
        $firstData = $request->id;
        $lastData = $firstData+3;

        return PhotoModel::where('id','>=',$firstData)->where('id','<',$lastData)->get();
    }

    public function photoUplaod(Request $request) {
        $photoPath = $request->file("photo")->store("public");

        $photoName = (explode("/", $photoPath))[1];
        $host = $_SERVER["HTTP_HOST"];
        $location = "http://".$host."/storage/".$photoName;
        $result = PhotoModel::insert(["location"=>$location]);
        return $result;
    }
}
