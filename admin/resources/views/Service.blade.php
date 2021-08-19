@extends("Layout.app")

@section("title", "Services")

@section("content")
<div id="mainDivService" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">

<button id="addNewServiceBtnId" class="btn btn-sm btn-danger mb-3">Add New</button>

<table id="ServiceDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Image</th>
	  <th class="th-sm">Name</th>
	  <th class="th-sm">Description</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="Service_table">
  

	
  </tbody>
</table>

</div>
</div>
</div>



<div id="loadingDivService" class="container mt-5">
<div class="row">
<div class="col-md-12 p-5 text-center">

  <img src="{{asset('images/loading.svg')}}" alt="" srcset="">

</div>
</div>
</div>


<div id="errorDivService" class="container d-none mt-5">
<div class="row">
<div class="col-md-12 p-5 text-center">

  <h3>Error Something went wrong !</h3>

</div>
</div>
</div>

<!-- Add Service Modal -->
<div
  class="modal fade"
  id="addServiceModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body mt-3 pt-5 text-center">

<div id="ServiceAddForm" class="w-100">
  <h5 class="mb-4">Add New Services</h5>
      <div class="row">
          <div class="col-md-12">
              <!-- Service Name -->
      <div class="form-outline mb-4">
        <input id="ServiceNameAddId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Service Name</label>
      </div>
      <!-- Service Description -->
      <div class="form-outline mb-4">
        <input id="ServiceDesAddId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Service Description</label>
      </div>
      <!-- Service Image Link -->
      <div class="form-outline mb-4">
        <input id="ServiceImageAddId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Service Image Link</label>
      </div>
          </div>
      </div>
      
      
</div>

      </div>
      <div class="modal-footer">
        <button  class="btn btn-primary" data-mdb-dismiss="modal">Cancel</button>
        <button  id="ServiceAddConfirmBTN" type="button" class="btn btn-danger">Add New</button>
      </div>
    </div>
  </div>
</div>


<!-- Service Edit Modal -->
<div
  class="modal fade"
  id="editServiceModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>

  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit Service</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                <span aria-hidden="true" >&times;</span>
            </button>
        </div>
      <div class="modal-body mt-3 pt-5 text-center">

<div id="ServiceEditForm" class="w-100 d-none">
    <h6 class="d-none" id="ServiceEditId" ></h6>
      <div class="row">
          <div class="col-md-12">
    <!-- Service Name -->
      <div class="form-outline mb-4">
        <input id="ServiceNameEditId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Service Name</label>
      </div>
      <!-- Service Description -->
      <div class="form-outline mb-4">
        <input id="ServiceDesEditId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Service Description</label>
      </div>
      <!-- Service Image Link -->
      <div class="form-outline mb-4">
        <input id="ServiceImageEditId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Service Image Link</label>
      </div>
          </div>
      </div>   
</div>

<img id="ServiceEditLoader" src="{{asset('images/loading.svg')}}" alt="" srcset="">
<h5 id="ServiceEditWrong" class="d-none" >Something went wrong</h5>

      </div>
      <div class="modal-footer">
        <button  class="btn btn-primary" data-mdb-dismiss="modal">Cancel</button>
        <button  id="ServiceEditConfirmBTN" type="button" class="btn btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>


<!-- Delete Modal -->
<div
  class="modal fade"
  id="ServiceDeleteModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body mt-3">
        <h5 class="">Do you want to Delete ?</h5>
        <h5 id='ServiceDeleteId' class="d-none"></h5>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-mdb-dismiss="modal">No</button>
        <button id="ServiceDeleteConfirmBTN" type="button" class="btn btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section("script")
<script>
    getServicesData()

function getServicesData() {
    axios
        .get("/getServicesData")
        .then(function (response) {
            if (response.status == 200) {
                $("#mainDivService").removeClass("d-none");
                $("#loadingDivService").addClass("d-none");

                $("#ServiceDataTable").DataTable().destroy();
                $("#Service_table").empty();

                //Service Data-table
                var jsonData = response.data;
                $.each(jsonData, function (i, item) {
                    $("<tr>")
                        .html(
                            "<td><img class='table-img' src=" + jsonData[i].service_img + "></td>" +
                            "<td>" +
                                jsonData[i].service_name +
                                "</td>" +
                                "<td>" +
                                jsonData[i].service_des +
                                "</td>" +
                                "<td><a data-id='" +
                                jsonData[i].id +
                                "' class='ServiceEditBtn' ><i class='fas fa-edit'></i></a></td>" +
                                "<td><a data-id='" +
                                jsonData[i].id +
                                "' class='ServiceDeleteBtn' ><i class='fas fa-trash-alt'></i></a></td>"
                        )
                        .appendTo("#Service_table");
                });

                $(".ServiceDeleteBtn").click(function () {
                    var id = $(this).data("id");
                    $("#ServiceDeleteId").html(id);
                    $("#ServiceDeleteModal").modal("show");
                });

                //Services table edit icon
                $(".ServiceEditBtn").click(function () {
                    var id = $(this).data("id");
                    $("#ServiceEditId").html(id);
                    ServiceDetails(id);
                    $("#editServiceModal").modal("show");
                });

                $("#ServiceDataTable").DataTable({ order: false });
                $(".dataTables_length").addClass("bs-select");

            } else {
                $("#loadingDivService").addClass("d-none");
                $("#errorDivService").removeClass("d-none");
            }
        })
        .catch(function (error) {
            $("#loadingDivService").addClass("d-none");
            $("#errorDivService").removeClass("d-none");
        });
}


/* Add New Service Click*/
$("#addNewServiceBtnId").click(function () {

    $("#addServiceModal").modal("show");

});

$("#ServiceAddConfirmBTN").click(function () {
    var ServiceNameAddId = $("#ServiceNameAddId").val();
    var ServiceDesAddId = $("#ServiceDesAddId").val();
    var ServiceImageAddId = $("#ServiceImageAddId").val();

    ServiceAddDetails(
        ServiceNameAddId,
        ServiceDesAddId,
        ServiceImageAddId
    );
});

/* Service Add Method */
function ServiceAddDetails(
    ServiceName,
    ServiceDes,
    ServiceImg
) {
    if (ServiceName.length == 0) {
        //Toaster Msg
        console.log("Error");
    } else if (ServiceDes.length == 0) {
        //Toaster Msg
        console.log("Error");
    } else if (ServiceImg.length == 0) {
        //Toaster Msg
        console.log("Error");
    } else {
        $("#ServiceAddConfirmBTN").html(
            "<div class='spinner-border spinner-border-sm' role='status'></div>"
        ); //Loading Animation

        axios
            .post("/ServiceAdd", {
                service_name: ServiceName,
                service_des: ServiceDes,
                service_img: ServiceImg
            })

            .then(function (response) {
                $("#ServiceAddConfirmBTN").html("Add");

                if (response.status == 200) {
                    if (response.data == 1) {
                        $("#addServiceModal").modal("hide");
                        //Toaster Msg
                        getServicesData();
                    } else {
                        $("#addServiceModal").modal("hide");
                        //Toaster Msg
                        getServicesData();
                    }
                } else {
                    $("#addServiceModal").modal("hide");
                    //Toaster Msg
                }
            })
            .catch(function (error) {
                $("#addServiceModal").modal("hide");
                //Toaster Msg
            });
    }
}


  //Service Delete Modal Yes button
    $("#ServiceDeleteConfirmBTN").click(function () {
        var id = $("#ServiceDeleteId").html();
        getServiceDelete(id);
    });

    
//Service Delete
function getServiceDelete(deleteId) {
    $("#ServiceDeleteConfirmBTN").html(
        "<div class='spinner-border spinner-border-sm' role='status'></div>"
    ); //Loading Animation

    axios
        .post("/ServiceDelete", { id: deleteId })
        .then(function (response) {
            $("#ServiceDeleteConfirmBTN").html("Yes");
            if (response.status == 200) {
                if (response.data == 1) {
                    $("#ServiceDeleteModal").modal("hide");
                    //Toaster Msg
                    getServicesData();
                } else {
                    $("#ServiceDeleteModal").modal("hide");
                    //Toaster Msg
                    getServicesData();
                }
            } else {
                $("#ServiceDeleteModal").modal("hide");
                //Toaster Msg
            }
        })
        .catch(function (error) {
            $("#ServiceDeleteModal").modal("hide");
            //Toaster Msg
        });
}


//Each Service Update Details
function ServiceDetails(detailsId) {
    axios
        .post("/ServiceDetails", { id: detailsId })

        .then(function (response) {
            if (response.status == 200) {
                $("#ServiceEditLoader").addClass("d-none");
                $("#ServiceEditForm").removeClass("d-none");
                var jsonData = response.data
                $("#ServiceNameEditId").val(jsonData[0].service_name);
                $("#ServiceDesEditId").val(jsonData[0].service_des);
                $("#ServiceImageEditId").val(jsonData[0].service_img);
            }else{
                $("#ServiceEditLoader").addClass("d-none");
                $("#ServiceEditWrong").removeClass("d-none");
            }
        })
        .catch(function (error) {
            $("#ServiceEditLoader").addClass("d-none");
            $("#ServiceEditWrong").removeClass("d-none");
        });
}

    //Service Edit Save BTN
    $("#ServiceEditConfirmBTN").click(function () {
        var id = $("#ServiceEditId").html();
        var ServiceNameEditId = $("#ServiceNameEditId").val();
        var ServiceDesEditId = $("#ServiceDesEditId").val();
        var ServiceImageEditId = $("#ServiceImageEditId").val();
        ServiceUpdateDetails(
            id,
            ServiceNameEditId,
            ServiceDesEditId,
            ServiceImageEditId
        );
    });

//Service Update
function ServiceUpdateDetails(
    ServiceId,
    ServiceName,
    ServiceDes,
    ServiceImg
) {
    if (ServiceName.length == 0) {
        //Toaster Msg
    } else if (ServiceDes.length == 0) {
        //Toaster Msg
    } else if (ServiceImg.length == 0) {
        //Toaster Msg
    } else {
        $("#ServiceEditConfirmBTN").html(
            "<div class='spinner-border spinner-border-sm' role='status'></div>"
        ); //Loading Animation

        axios
            .post("/ServiceUpdate", {
                id: ServiceId,
                service_name: ServiceName,
                service_des: ServiceDes,
                service_img: ServiceImg
            })

            .then(function (response) {
                $("#ServiceEditConfirmBTN").html("Save");

                if (response.status == 200) {
                    if (response.data == 1) {
                        $("#editServiceModal").modal("hide");
                        //Toaster Msg
                        getServicesData();
                    } else {
                        $("#editServiceModal").modal("hide");
                        //Toaster Msg
                        getServicesData();
                    }
                } else {
                    $("#editServiceModal").modal("hide");
                    //Toaster Msg
                }
            })
            .catch(function (error) {
                $("#editServiceModal").modal("hide");
                //Toaster Msg
            });
    }
}



</script>
@endsection