@extends("Layout.app")

@section("title", "Courses")

@section("content")
<div id="mainDivCourse" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">

<button id="addNewCourseBtnId" class="btn btn-sm btn-danger mb-3">Add New</button>

<table id="courseDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
	  <th class="th-sm">Name</th>
	  <th class="th-sm">Fee</th>
	  <th class="th-sm">Class</th>
	  <th class="th-sm">Enroll</th>
	  <th class="th-sm">Details</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="course_table">
  

	
  </tbody>
</table>

</div>
</div>
</div>



<div id="loadingDivCourse" class="container mt-5">
<div class="row">
<div class="col-md-12 p-5 text-center">

  <img src="{{asset('images/loading.svg')}}" alt="" srcset="">

</div>
</div>
</div>


<div id="errorDivCourse" class="container d-none mt-5">
<div class="row">
<div class="col-md-12 p-5 text-center">

  <h3>Error Something went wrong !</h3>

</div>
</div>
</div>

<!-- Add Course Modal -->
<div
  class="modal fade"
  id="addCourseModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body mt-3 pt-5 text-center">

<div id="courseAddForm" class="w-100">
  <h5 class="mb-4">Add New Course</h5>
      <div class="row">
          <div class="col-md-6">
              <!-- Course Name -->
      <div class="form-outline mb-4">
        <input id="courseNameAddId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Course Name</label>
      </div>
      <!-- Course Description -->
      <div class="form-outline mb-4">
        <input id="courseDesAddId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Course Description</label>
      </div>
      <!-- Course Fee -->
      <div class="form-outline mb-4">
        <input id="courseFeeId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Course Fee</label>
      </div>
      <!-- Course Enroll -->
      <div class="form-outline mb-4">
        <input id="courseEnrollId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Course Enroll</label>
      </div>
          </div>
          <div class="col-md-6">
              <!-- Course Class -->
      <div class="form-outline mb-4">
        <input id="courseClassId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Course Class</label>
      </div>
      <!-- Course Link -->
      <div class="form-outline mb-4">
        <input id="courseLinkId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Course Link</label>
      </div>
      <!-- Course Image Link -->
      <div class="form-outline mb-4">
        <input id="CourseImageAddId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Course Image Link</label>
      </div>
          </div>
      </div>
      
      
</div>

      </div>
      <div class="modal-footer">
        <button  class="btn btn-primary" data-mdb-dismiss="modal">Cancel</button>
        <button  id="courseAddConfirmBTN" type="button" class="btn btn-danger">Add New</button>
      </div>
    </div>
  </div>
</div>


<!-- Course Edit Modal -->
<div
  class="modal fade"
  id="editCourseModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>

  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit Course</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                <span aria-hidden="true" >&times;</span>
            </button>
        </div>
      <div class="modal-body mt-3 pt-5 text-center">

<div id="courseEditForm" class="w-100 d-none">
    <h6 class="d-none" id="courseEditId" ></h6>
      <div class="row">
          <div class="col-md-6">
    <!-- Course Name -->
      <div class="form-outline mb-4">
        <input id="courseNameEditId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Course Name</label>
      </div>
      <!-- Course Description -->
      <div class="form-outline mb-4">
        <input id="courseDesEditId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Course Description</label>
      </div>
      <!-- Course Fee -->
      <div class="form-outline mb-4">
        <input id="courseFeeEditId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Course Fee</label>
      </div>
      <!-- Course Enroll -->
      <div class="form-outline mb-4">
        <input id="courseEnrollEditId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Course Enroll</label>
      </div>
          </div>
          <div class="col-md-6">
              <!-- Course Class -->
      <div class="form-outline mb-4">
        <input id="courseClassEditId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Course Class</label>
      </div>
      <!-- Course Link -->
      <div class="form-outline mb-4">
        <input id="courseLinkEditId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Course Link</label>
      </div>
      <!-- Course Image Link -->
      <div class="form-outline mb-4">
        <input id="CourseImageEditId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Course Image Link</label>
      </div>
          </div>
      </div>   
</div>

<img id="courseEditLoader" src="{{asset('images/loading.svg')}}" alt="" srcset="">
<h5 id="courseEditWrong" class="d-none" >Something went wrong</h5>

      </div>
      <div class="modal-footer">
        <button  class="btn btn-primary" data-mdb-dismiss="modal">Cancel</button>
        <button  id="courseEditConfirmBTN" type="button" class="btn btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>


<!-- Delete Modal -->
<div
  class="modal fade"
  id="courseDeleteModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body mt-3">
        <h5 class="">Do you want to Delete ?</h5>
        <h5 id='courseDeleteId' class="d-none"></h5>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-mdb-dismiss="modal">No</button>
        <button id="courseDeleteConfirmBTN" type="button" class="btn btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section("script")
<script>
    getCoursesData()

function getCoursesData() {
    axios
        .get("/getcoursedata")
        .then(function (response) {
            if (response.status == 200) {
                $("#mainDivCourse").removeClass("d-none");
                $("#loadingDivCourse").addClass("d-none");

                $("#courseDataTable").DataTable().destroy();
                $("#course_table").empty();

                //course Data-table
                var jsonData = response.data;
                $.each(jsonData, function (i, item) {
                    $("<tr>")
                        .html(
                            "<td>" +
                                jsonData[i].course_name +
                                "</td>" +
                                "<td>" +
                                jsonData[i].course_fee +
                                "</td>" +
                                "<td>" +
                                jsonData[i].course_totalclass +
                                "</td>" +
                                "<td>" +
                                jsonData[i].course_totalenroll +
                                "</td>" +
                                "<td><a data-id='" +
                                jsonData[i].id +
                                "' class='courseViewDetailsBtn' ><i class='fas fa-eye'></i></a></td>" +
                                "<td><a data-id='" +
                                jsonData[i].id +
                                "' class='courseEditBtn' ><i class='fas fa-edit'></i></a></td>" +
                                "<td><a data-id='" +
                                jsonData[i].id +
                                "' class='courseDeleteBtn' ><i class='fas fa-trash-alt'></i></a></td>"
                        )
                        .appendTo("#course_table");
                });

                $(".courseDeleteBtn").click(function () {
                    var id = $(this).data("id");
                    $("#courseDeleteId").html(id);
                    $("#courseDeleteModal").modal("show");
                });

                //courses table edit icon
                $(".courseEditBtn").click(function () {
                    var id = $(this).data("id");
                    $("#courseEditId").html(id);
                    courseDetails(id);
                    $("#editCourseModal").modal("show");
                });

                $("#courseDataTable").DataTable({ order: false });
                $(".dataTables_length").addClass("bs-select");

            } else {
                $("#loadingDivCourse").addClass("d-none");
                $("#errorDivCourse").removeClass("d-none");
            }
        })
        .catch(function (error) {
            $("#loadingDivCourse").addClass("d-none");
            $("#errorDivCourse").removeClass("d-none");
        });
}


/* Add New Course Click*/
$("#addNewCourseBtnId").click(function () {

    $("#addCourseModal").modal("show");

});

$("#courseAddConfirmBTN").click(function () {
    var courseNameAddId = $("#courseNameAddId").val();
    var courseDesAddId = $("#courseDesAddId").val();
    var courseFeeId = $("#courseFeeId").val();
    var courseEnrollId = $("#courseEnrollId").val();
    var courseClassId = $("#courseClassId").val();
    var courseLinkId = $("#courseLinkId").val();
    var CourseImageAddId = $("#CourseImageAddId").val();

    CourseAddDetails(
        courseNameAddId,
        courseDesAddId,
        courseFeeId,
        courseEnrollId,
        courseClassId,
        courseLinkId,
        CourseImageAddId
    );
});

/* Course Add Method */
function CourseAddDetails(
    courseName,
    courseDes,
    courseFee,
    courseEnroll,
    courseClass,
    courseLink,
    courseImg
) {
    if (courseName.length == 0) {
        //Toaster Msg
        console.log("Error");
    } else if (courseDes.length == 0) {
        //Toaster Msg
        console.log("Error");
    } else if (courseFee.length == 0) {
        //Toaster Msg
        console.log("Error");
    } else if (courseEnroll.length == 0) {
        //Toaster Msg
        console.log("Error");
    } else if (courseClass.length == 0) {
        //Toaster Msg
        console.log("Error");
    } else if (courseLink.length == 0) {
        //Toaster Msg
        console.log("Error");
    } else if (courseImg.length == 0) {
        //Toaster Msg
        console.log("Error");
    } else {
        $("#courseAddConfirmBTN").html(
            "<div class='spinner-border spinner-border-sm' role='status'></div>"
        ); //Loading Animation

        axios
            .post("/courseAdd", {
                course_name: courseName,
                course_des: courseDes,
                course_fee: courseFee,
                course_totalenroll: courseEnroll,
                course_totalclass: courseClass,
                course_link: courseLink,
                course_img: courseImg
            })

            .then(function (response) {
                $("#courseAddConfirmBTN").html("Add");

                if (response.status == 200) {
                    if (response.data == 1) {
                        $("#addCourseModal").modal("hide");
                        //Toaster Msg
                        getCoursesData();
                    } else {
                        $("#addCourseModal").modal("hide");
                        //Toaster Msg
                        getCoursesData();
                    }
                } else {
                    $("#addCourseModal").modal("hide");
                    //Toaster Msg
                }
            })
            .catch(function (error) {
                $("#addCourseModal").modal("hide");
                //Toaster Msg
            });
    }
}


  //Course Delete Modal Yes button
    $("#courseDeleteConfirmBTN").click(function () {
        var id = $("#courseDeleteId").html();
        getCourseDelete(id);
    });

    
//Course Delete
function getCourseDelete(deleteId) {
    $("#courseDeleteConfirmBTN").html(
        "<div class='spinner-border spinner-border-sm' role='status'></div>"
    ); //Loading Animation

    axios
        .post("/coursedelete", { id: deleteId })
        .then(function (response) {
            $("#courseDeleteConfirmBTN").html("Yes");
            if (response.status == 200) {
                if (response.data == 1) {
                    $("#courseDeleteModal").modal("hide");
                    //Toaster Msg
                    getCoursesData();
                } else {
                    $("#courseDeleteModal").modal("hide");
                    //Toaster Msg
                    getCoursesData();
                }
            } else {
                $("#courseDeleteModal").modal("hide");
                //Toaster Msg
            }
        })
        .catch(function (error) {
            $("#courseDeleteModal").modal("hide");
            //Toaster Msg
        });
}


//Each course Update Details
function courseDetails(detailsId) {
    axios
        .post("/courseDetails", { id: detailsId })

        .then(function (response) {
            if (response.status == 200) {
                $("#courseEditLoader").addClass("d-none");
                $("#courseEditForm").removeClass("d-none");
                var jsonData = response.data
                $("#courseNameEditId").val(jsonData[0].course_name);
                $("#courseDesEditId").val(jsonData[0].course_des);
                $("#courseFeeEditId").val(jsonData[0].course_fee);
                $("#courseEnrollEditId").val(jsonData[0].course_totalenroll);
                $("#courseClassEditId").val(jsonData[0].course_totalclass);
                $("#courseLinkEditId").val(jsonData[0].course_link);
                $("#CourseImageEditId").val(jsonData[0].course_img);
            }else{
                $("#courseEditLoader").addClass("d-none");
                $("#courseEditWrong").removeClass("d-none");
            }
        })
        .catch(function (error) {
            $("#courseEditLoader").addClass("d-none");
            $("#courseEditWrong").removeClass("d-none");
        });
}

    //course Edit Save BTN
    $("#courseEditConfirmBTN").click(function () {
        var id = $("#courseEditId").html();
        var courseNameEditId = $("#courseNameEditId").val();
        var courseDesEditId = $("#courseDesEditId").val();
        var courseFeeId = $("#courseFeeEditId").val();
        var courseEnrollId = $("#courseEnrollEditId").val();
        var courseClassEditId = $("#courseClassEditId").val();
        var courseLinkEditId = $("#courseLinkEditId").val();
        var CourseImageEditId = $("#CourseImageEditId").val();
        courseUpdateDetails(
            id,
            courseNameEditId,
            courseDesEditId,
            courseFeeId,
            courseEnrollId,
            courseClassEditId,
            courseLinkEditId,
            CourseImageEditId
        );
    });

//course Update
function courseUpdateDetails(
    courseId,
    courseName,
    courseDes,
    courseFee,
    courseEnroll,
    courseClassEdit,
    courseLinkEdit,
    courseImg
) {
    if (courseName.length == 0) {
        //Toaster Msg
    } else if (courseDes.length == 0) {
        //Toaster Msg
    } else if (courseFee.length == 0) {
        //Toaster Msg
    }  else if (courseEnroll.length == 0) {
        //Toaster Msg
    } else if (courseClassEdit.length == 0) {
        //Toaster Msg
    } else if (courseLinkEdit.length == 0) {
        //Toaster Msg
    }  else if (courseImg.length == 0) {
        //Toaster Msg
    } else {
        $("#courseEditConfirmBTN").html(
            "<div class='spinner-border spinner-border-sm' role='status'></div>"
        ); //Loading Animation

        axios
            .post("/courseUpdate", {
                id: courseId,
                course_name: courseName,
                course_des: courseDes,
                course_fee: courseFee,
                course_totalenroll: courseEnroll,
                course_totalclass: courseClassEdit,
                course_link: courseLinkEdit,
                course_img: courseImg,
            })

            .then(function (response) {
                $("#courseEditConfirmBTN").html("Save");

                if (response.status == 200) {
                    if (response.data == 1) {
                        $("#editCourseModal").modal("hide");
                        //Toaster Msg
                        getCoursesData();
                    } else {
                        $("#editCourseModal").modal("hide");
                        //Toaster Msg
                        getCoursesData();
                    }
                } else {
                    $("#editCourseModal").modal("hide");
                    //Toaster Msg
                }
            })
            .catch(function (error) {
                $("#editCourseModal").modal("hide");
                //Toaster Msg
            });
    }
}



</script>
@endsection