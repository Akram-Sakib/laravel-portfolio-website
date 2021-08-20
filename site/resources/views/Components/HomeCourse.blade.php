<div class="container section-marginTop text-center">

    <h1 class="section-title">Courses</h1>
    <h1 class="section-subtitle">All the other services we provide, including IT courses, project based source code</h1>
    
    <div class="row">

    @foreach($coursesData as $courseData)
        <div class="col-md-4 thumbnail-container">
            <img src="{{$courseData->course_img}}" alt="Avatar" class="thumbnail-image">
            <div class="thumbnail-middle">
                <h1 class="thumbnail-title">{{$courseData->course_name}}</h1>
                <h1 class="thumbnail-subtitle">{{$courseData->course_des}}</h1>
                <h1 class="thumbnail-subtitle">{{$courseData->course_totalclass}}</h1>
                <a href="{{$courseData->course_link}}" class="normal-btn btn">Get started</a>
            </div>
        </div>
    @endforeach 

    </div>
</div>