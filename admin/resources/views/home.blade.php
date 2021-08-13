@extends("Layout.app")

@section("title","Dashboard")

@section("content")

<div class="container">
    <div class="row">

    <div class="col-md-3 p-2">
        <div class="card">
            <div class="card-body">
                <h3 class="count-card-title">{{$totalVisitor}}</h3>
                <h3 class="count-card-text">Total Visitor</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3 p-2">
        <div class="card">
            <div class="card-body">
                <h3 class="count-card-title">{{$totalUsers}}</h3>
                <h3 class="count-card-text">Total User</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3 p-2">
        <div class="card">
            <div class="card-body">
                <h3 class="count-card-title">{{$totalService}}</h3>
                <h3 class="count-card-text">Total Service</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3 p-2">
        <div class="card">
            <div class="card-body">
                <h3 class="count-card-title">{{$totalProject}}</h3>
                <h3 class="count-card-text">Total Courses</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3 p-2">
        <div class="card">
            <div class="card-body">
                <h3 class="count-card-title">{{$totalContact}}</h3>
                <h3 class="count-card-text">Total Contacts</h3>
            </div>
        </div>
    </div>

    </div>
</div>

@endsection