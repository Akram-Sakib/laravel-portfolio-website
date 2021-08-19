@extends("Layout.app")

@section("title", "Projects")

@section("content")
<div id="mainDivProject" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">

<button id="addNewProjectBtnId" class="btn btn-sm btn-danger mb-3">Add New</button>

<table id="ProjectDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Image</th>
	  <th class="th-sm">Name</th>
	  <th class="th-sm">Description</th>
	  <th class="th-sm">Link</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="Project_table">
  

	
  </tbody>
</table>

</div>
</div>
</div>



<div id="loadingDivProject" class="container mt-5">
<div class="row">
<div class="col-md-12 p-5 text-center">

  <img src="{{asset('images/loading.svg')}}" alt="" srcset="">

</div>
</div>
</div>


<div id="errorDivProject" class="container d-none mt-5">
<div class="row">
<div class="col-md-12 p-5 text-center">

  <h3>Error Something went wrong !</h3>

</div>
</div>
</div>

<!-- Add Project Modal -->
<div
  class="modal fade"
  id="addProjectModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body mt-3 pt-5 text-center">

<div id="ProjectAddForm" class="w-100">
  <h5 class="mb-4">Add New Projects</h5>
      <div class="row">
          <div class="col-md-12">
              <!-- Project Name -->
      <div class="form-outline mb-4">
        <input id="ProjectNameAddId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Project Name</label>
      </div>
      <!-- Project Description -->
      <div class="form-outline mb-4">
        <input id="ProjectDesAddId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Project Description</label>
      </div>
      <!-- Project Link -->
      <div class="form-outline mb-4">
        <input id="ProjectLinkId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Project Link</label>
      </div>
      <!-- Project Image Link -->
      <div class="form-outline mb-4">
        <input id="ProjectImageAddId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Project Image Link</label>
      </div>
          </div>
      </div>
      
      
</div>

      </div>
      <div class="modal-footer">
        <button  class="btn btn-primary" data-mdb-dismiss="modal">Cancel</button>
        <button  id="ProjectAddConfirmBTN" type="button" class="btn btn-danger">Add New</button>
      </div>
    </div>
  </div>
</div>


<!-- Project Edit Modal -->
<div
  class="modal fade"
  id="editProjectModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>

  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit Project</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                <span aria-hidden="true" >&times;</span>
            </button>
        </div>
      <div class="modal-body mt-3 pt-5 text-center">

<div id="ProjectEditForm" class="w-100 d-none">
    <h6 class="d-none" id="ProjectEditId" ></h6>
      <div class="row">
          <div class="col-md-12">
    <!-- Project Name -->
      <div class="form-outline mb-4">
        <input id="ProjectNameEditId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Project Name</label>
      </div>
      <!-- Project Description -->
      <div class="form-outline mb-4">
        <input id="ProjectDesEditId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Project Description</label>
      </div>
      <!-- Project Link -->
      <div class="form-outline mb-4">
        <input id="ProjectLinkEditId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Project Link</label>
      </div>
      <!-- Project Image Link -->
      <div class="form-outline mb-4">
        <input id="ProjectImageEditId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Project Image Link</label>
      </div>
          </div>
      </div>   
</div>

<img id="ProjectEditLoader" src="{{asset('images/loading.svg')}}" alt="" srcset="">
<h5 id="ProjectEditWrong" class="d-none" >Something went wrong</h5>

      </div>
      <div class="modal-footer">
        <button  class="btn btn-primary" data-mdb-dismiss="modal">Cancel</button>
        <button  id="ProjectEditConfirmBTN" type="button" class="btn btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>


<!-- Delete Modal -->
<div
  class="modal fade"
  id="ProjectDeleteModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body mt-3">
        <h5 class="">Do you want to Delete ?</h5>
        <h5 id='ProjectDeleteId' class="d-none"></h5>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-mdb-dismiss="modal">No</button>
        <button id="ProjectDeleteConfirmBTN" type="button" class="btn btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section("script")
<script>
    getProjectsData()

function getProjectsData() {
    axios
        .get("/getprojectsdata")
        .then(function (response) {
            if (response.status == 200) {
                $("#mainDivProject").removeClass("d-none");
                $("#loadingDivProject").addClass("d-none");

                $("#ProjectDataTable").DataTable().destroy();
                $("#Project_table").empty();

                //Project Data-table
                var jsonData = response.data;
                $.each(jsonData, function (i, item) {
                    $("<tr>")
                        .html(
                            "<td><img class='table-img' src=" + jsonData[i].project_img + "></td>" +
                            "<td>" +
                                jsonData[i].project_name +
                                "</td>" +
                                "<td>" +
                                jsonData[i].project_des +
                                "</td>" +
                                "<td>" +
                                jsonData[i].project_link +
                                "</td>" +
                                "<td><a data-id='" +
                                jsonData[i].id +
                                "' class='ProjectEditBtn' ><i class='fas fa-edit'></i></a></td>" +
                                "<td><a data-id='" +
                                jsonData[i].id +
                                "' class='ProjectDeleteBtn' ><i class='fas fa-trash-alt'></i></a></td>"
                        )
                        .appendTo("#Project_table");
                });

                $(".ProjectDeleteBtn").click(function () {
                    var id = $(this).data("id");
                    $("#ProjectDeleteId").html(id);
                    $("#ProjectDeleteModal").modal("show");
                });

                //Projects table edit icon
                $(".ProjectEditBtn").click(function () {
                    var id = $(this).data("id");
                    $("#ProjectEditId").html(id);
                    ProjectDetails(id);
                    $("#editProjectModal").modal("show");
                });

                $("#ProjectDataTable").DataTable({ order: false });
                $(".dataTables_length").addClass("bs-select");

            } else {
                $("#loadingDivProject").addClass("d-none");
                $("#errorDivProject").removeClass("d-none");
            }
        })
        .catch(function (error) {
            $("#loadingDivProject").addClass("d-none");
            $("#errorDivProject").removeClass("d-none");
        });
}


/* Add New Project Click*/
$("#addNewProjectBtnId").click(function () {

    $("#addProjectModal").modal("show");

});

$("#ProjectAddConfirmBTN").click(function () {
    var ProjectNameAddId = $("#ProjectNameAddId").val();
    var ProjectDesAddId = $("#ProjectDesAddId").val();
    var ProjectLinkId = $("#ProjectLinkId").val();
    var ProjectImageAddId = $("#ProjectImageAddId").val();

    ProjectAddDetails(
        ProjectNameAddId,
        ProjectDesAddId,
        ProjectLinkId,
        ProjectImageAddId
    );
});

/* Project Add Method */
function ProjectAddDetails(
    ProjectName,
    ProjectDes,
    ProjectLink,
    ProjectImg
) {
    if (ProjectName.length == 0) {
        //Toaster Msg
        console.log("Error");
    } else if (ProjectDes.length == 0) {
        //Toaster Msg
        console.log("Error");
    } else if (ProjectLink.length == 0) {
        //Toaster Msg
        console.log("Error");
    } else if (ProjectImg.length == 0) {
        //Toaster Msg
        console.log("Error");
    } else {
        $("#ProjectAddConfirmBTN").html(
            "<div class='spinner-border spinner-border-sm' role='status'></div>"
        ); //Loading Animation

        axios
            .post("/projectsAdd", {
                project_name: ProjectName,
                project_des: ProjectDes,
                project_link: ProjectLink,
                project_img: ProjectImg
            })

            .then(function (response) {
                $("#ProjectAddConfirmBTN").html("Add");

                if (response.status == 200) {
                    if (response.data == 1) {
                        $("#addProjectModal").modal("hide");
                        //Toaster Msg
                        getProjectsData();
                    } else {
                        $("#addProjectModal").modal("hide");
                        //Toaster Msg
                        getProjectsData();
                    }
                } else {
                    $("#addProjectModal").modal("hide");
                    //Toaster Msg
                }
            })
            .catch(function (error) {
                $("#addProjectModal").modal("hide");
                //Toaster Msg
            });
    }
}


  //Project Delete Modal Yes button
    $("#ProjectDeleteConfirmBTN").click(function () {
        var id = $("#ProjectDeleteId").html();
        getProjectDelete(id);
    });

    
//Project Delete
function getProjectDelete(deleteId) {
    $("#ProjectDeleteConfirmBTN").html(
        "<div class='spinner-border spinner-border-sm' role='status'></div>"
    ); //Loading Animation

    axios
        .post("/projectdelete", { id: deleteId })
        .then(function (response) {
            $("#ProjectDeleteConfirmBTN").html("Yes");
            if (response.status == 200) {
                if (response.data == 1) {
                    $("#ProjectDeleteModal").modal("hide");
                    //Toaster Msg
                    getProjectsData();
                } else {
                    $("#ProjectDeleteModal").modal("hide");
                    //Toaster Msg
                    getProjectsData();
                }
            } else {
                $("#ProjectDeleteModal").modal("hide");
                //Toaster Msg
            }
        })
        .catch(function (error) {
            $("#ProjectDeleteModal").modal("hide");
            //Toaster Msg
        });
}


//Each Project Update Details
function ProjectDetails(detailsId) {
    axios
        .post("/projectDetails", { id: detailsId })

        .then(function (response) {
            if (response.status == 200) {
                $("#ProjectEditLoader").addClass("d-none");
                $("#ProjectEditForm").removeClass("d-none");
                var jsonData = response.data
                $("#ProjectNameEditId").val(jsonData[0].project_name);
                $("#ProjectDesEditId").val(jsonData[0].project_des);
                $("#ProjectLinkEditId").val(jsonData[0].project_link);
                $("#ProjectImageEditId").val(jsonData[0].project_img);
            }else{
                $("#ProjectEditLoader").addClass("d-none");
                $("#ProjectEditWrong").removeClass("d-none");
            }
        })
        .catch(function (error) {
            $("#ProjectEditLoader").addClass("d-none");
            $("#ProjectEditWrong").removeClass("d-none");
        });
}

    //Project Edit Save BTN
    $("#ProjectEditConfirmBTN").click(function () {
        var id = $("#ProjectEditId").html();
        var ProjectNameEditId = $("#ProjectNameEditId").val();
        var ProjectDesEditId = $("#ProjectDesEditId").val();
        var ProjectLinkEditId = $("#ProjectLinkEditId").val();
        var ProjectImageEditId = $("#ProjectImageEditId").val();
        ProjectUpdateDetails(
            id,
            ProjectNameEditId,
            ProjectDesEditId,
            ProjectLinkEditId,
            ProjectImageEditId
        );
    });

//Project Update
function ProjectUpdateDetails(
    ProjectId,
    ProjectName,
    ProjectDes,
    ProjectLinkEdit,
    ProjectImg
) {
    if (ProjectName.length == 0) {
        //Toaster Msg
    } else if (ProjectDes.length == 0) {
        //Toaster Msg
    } else if (ProjectLinkEdit.length == 0) {
        //Toaster Msg
    }  else if (ProjectImg.length == 0) {
        //Toaster Msg
    } else {
        $("#ProjectEditConfirmBTN").html(
            "<div class='spinner-border spinner-border-sm' role='status'></div>"
        ); //Loading Animation

        axios
            .post("/projectUpdate", {
                id: ProjectId,
                project_name: ProjectName,
                project_des: ProjectDes,
                project_link: ProjectLinkEdit,
                project_img: ProjectImg
            })

            .then(function (response) {
                $("#ProjectEditConfirmBTN").html("Save");

                if (response.status == 200) {
                    if (response.data == 1) {
                        $("#editProjectModal").modal("hide");
                        //Toaster Msg
                        getProjectsData();
                    } else {
                        $("#editProjectModal").modal("hide");
                        //Toaster Msg
                        getProjectsData();
                    }
                } else {
                    $("#editProjectModal").modal("hide");
                    //Toaster Msg
                }
            })
            .catch(function (error) {
                $("#editProjectModal").modal("hide");
                //Toaster Msg
            });
    }
}



</script>
@endsection