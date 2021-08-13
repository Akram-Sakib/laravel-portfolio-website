@extends("Layout.app")

@section("title","Home")

@section("content")

@include("Components.Homebanner")
@include("Components.HomeService")
@include("Components.HomeCourse")
@include("Components.HomeProjects")
@include("Components.HomeContact")
@include("Components.HomeReview")

@endsection