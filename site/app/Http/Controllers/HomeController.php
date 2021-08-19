<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use App\Models\CourseModel;
use App\Models\HomeSeoModel;
use App\Models\ProjectsModel;
use App\Models\ReviewModel;
use App\Models\ServicesModel;
use App\Models\VisitorModel;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class HomeController extends Controller
{
    public function HomeIndex()
    {
        $HomeSeo = HomeSeoModel::all();

        $actualLink = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        $HomeTitle = $HomeSeo[0]['title'];
        
        $HomeLink = "http://{$_SERVER['HTTP_HOST']}";

        $HomeShareTitle = $HomeSeo[0]["share_title"];
        $HomeDescription = $HomeSeo[0]["description"];
        $HomeKeywords = $HomeSeo[0]["keywords"];
        $HomeImg = $HomeSeo[0]["page_img"];

        SEOMeta::setTitle($HomeTitle);
        SEOMeta::setDescription($HomeDescription);
        SEOMeta::setKeywords($HomeKeywords);
        SEOMeta::setCanonical($actualLink);

        OpenGraph::setTitle($HomeShareTitle);
        OpenGraph::setDescription($HomeDescription);
        OpenGraph::addImage($HomeImg);
        OpenGraph::setUrl($HomeLink);
        OpenGraph::setSiteName($actualLink);

        TwitterCard::setTitle($HomeShareTitle);
        TwitterCard::setSite('@LuizVinicius73');

        JsonLd::setTitle($HomeTitle);
        JsonLd::setDescription($HomeDescription);
        JsonLd::addImage($HomeImg);

        $UserIp = $_SERVER["REMOTE_ADDR"];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate = date("Y-m-d h:i:sa");
        VisitorModel::insert(["ip_address"=>$UserIp,"visit_time"=>$timeDate]);

        $servicesData = json_decode(ServicesModel::all());
        $courseData = json_decode(CourseModel::orderBy('id', 'desc')->limit(6)->get());
        $projectData = json_decode(ProjectsModel::orderBy('id', 'desc')->limit(10)->get());
        $reviewData = json_decode(ReviewModel::all());
        return view("home", ["servicesdata"=>$servicesData,"coursesData"=>$courseData,"projectsData"=>$projectData, "reviewsData"=>$reviewData]);
    }

    public function contactSend(Request $request)
    {
        $contact_name   = $request->input("contact_name");
        $contact_mobile = $request->input("contact_mobile");
        $contact_email  = $request->input("contact_email");
        $contact_msg    = $request->input("contact_msg");

        $result = ContactModel::insert(["contact_name"=>$contact_name,"contact_name"=>$contact_name,"contact_mobile"=>$contact_mobile,"contact_email"=>$contact_email,"contact_msg"=>$contact_msg]);

        if ($result) {
            return 1;
        }else {
            return 0;
        }
    }
}
