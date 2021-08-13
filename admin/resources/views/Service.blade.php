@extends("Layout.app")

@section("title","Sevices")

@section("content")
<div id="mainDiv" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">

<button id="addNewBtnId" class="btn btn-sm btn-danger mb-5">Add New</button>

<table id="serviceDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Image</th>
      <th class="th-sm">Name</th>
      <th class="th-sm">Description</th>
      <th class="th-sm">Edit</th>
      <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="service_table">
  
		
  </tbody>
</table>

</div>
</div>
</div>





<!-- Delete Modal -->
<div
  class="modal fade"
  id="deleteModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body mt-3">
        <h5 class="">Do you want to Delete ?</h5>
        <h5 class="d-none" id='serviceDeleteId'></h5>
      </div>
      <div class="modal-footer">
        <button  class="btn btn-primary" data-mdb-dismiss="modal">No</button>
        <button  id="serviceDeleteConfirmBTN" type="button" class="btn btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>


<!-- Edit Modal -->
<div
  class="modal fade"
  id="editModel"
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

      <h5 id="serviceEditId" class="d-none mt-4"></h5>
<div id="serviceEditForm" class="d-none w-100">
      <!-- Service Name -->
      <div class="form-outline mb-4">
        <input id="serviceNameId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Service Name</label>
      </div>
      <!-- Service Description -->
      <div class="form-outline mb-4">
        <input id="serviceDesId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Service Description</label>
      </div>
      <!-- Service Image Link -->
      <div class="form-outline mb-4">
        <input id="serviceImageId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Service Image Link</label>
      </div>
</div>
      <img id="serviceEditLoader" src="{{asset('images/loading.svg')}}" alt="" srcset="">
      <h5 id="serviceEditWrong" class="d-none" >Something went wrong</h5>

      </div>
      <div class="modal-footer">
        <button  class="btn btn-primary" data-mdb-dismiss="modal">Cancel</button>
        <button  id="serviceEditConfirmBTN" type="button" class="btn btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>


<!-- Add Modal -->
<div
  class="modal fade"
  id="addModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body mt-3 pt-5 text-center">

<div id="serviceAddForm" class="w-100">
  <h6>Add New Service</h6>
      <!-- Service Name -->
      <div class="form-outline mb-4">
        <input id="serviceNameAddId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Service Name</label>
      </div>
      <!-- Service Description -->
      <div class="form-outline mb-4">
        <input id="serviceDesAddId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Service Description</label>
      </div>
      <!-- Service Image Link -->
      <div class="form-outline mb-4">
        <input id="serviceImageAddId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Service Image Link</label>
      </div>
</div>

      </div>
      <div class="modal-footer">
        <button  class="btn btn-primary" data-mdb-dismiss="modal">Cancel</button>
        <button  id="serviceAddConfirmBTN" type="button" class="btn btn-danger">Add New</button>
      </div>
    </div>
  </div>
</div>
@endsection


@section("script")
	<script type="text/javascript">
		getServiceData()

    
function getServiceData() {
    
    axios
        .get("/getservicedata")
        .then(function (response) {
            if (response.status == 200) {
                $("#mainDiv").removeClass("d-none");
                $("#loadingDiv").addClass("d-none");
                
                $("#serviceDataTable").DataTable().destroy();
                $("#service_table").empty();
                
                //Service Data-table
                var jsonData = response.data;
                $.each(jsonData, function (i, item) {
                    $("<tr>")
                        .html(
                            "<td><img class='table-img' src='" +
                                jsonData[i].service_img +
                                "'></td>" +
                                "<td>" +
                                jsonData[i].service_name +
                                "</td>" +
                                "<td>" +
                                jsonData[i].service_des +
                                "</td>" +
                                "<td><a data-id='" +
                                jsonData[i].id +
                                "' class='serviceEditBtn' ><i class='fas fa-edit'></i></a></td>" +
                                "<td><a data-id='" +
                                jsonData[i].id +
                                "' class='serviceDeleteBtn' ><i class='fas fa-trash-alt'></i></a></td>"
                        )
                        .appendTo("#service_table");

                    //Service Table Icon Click
                    $(".serviceDeleteBtn").click(function () {
                        var id = $(this).data("id");
                        $("#serviceDeleteId").html(id);
                        $("#deleteModal").modal("show");
                    });

                    //Services table edit icon
                    $(".serviceEditBtn").click(function () {
                        var id = $(this).data("id");

                        $("#serviceEditId").html(id);
                        ServiceDetails(id);
                        $("#editModel").modal("show");
                    });

                    $("#serviceDataTable").DataTable();
                    $('.dataTables_length').addClass('bs-select');

                });

            }else{
                $("#loadingDiv").addClass("d-none");
                $("#errorDiv").removeClass("d-none");
            }

        })
        .catch(function (error) {
            $("#loadingDiv").addClass("d-none");
            $("#errorDiv").removeClass("d-none");
        });

}


    //Service Delete Modal Yes button
    $("#serviceDeleteConfirmBTN").click(function () {
        var id = $("#serviceDeleteId").html();
        getServiceDelete(id);
    });

    
//Service Delete
function getServiceDelete(deleteId) {

    $("#serviceDeleteConfirmBTN").html(
        "<div class='spinner-border spinner-border-sm' role='status'></div>"
    ); //Loading Animation

    axios.post("/servicedelete",{id:deleteId})
    .then(function(response){
        
        $("#serviceDeleteConfirmBTN").html("Yes");
        if (response.status == 200) {

            if (response.data == 1) {
                $("#deleteModal").modal("hide");
                //Toaster Msg
                getServiceData();
            } else {
                $("#deleteModal").modal("hide");
                //Toaster Msg
                getServiceData();
            }

        }else{
            $("#deleteModal").modal("hide");
            //Toaster Msg
        }
        
    }).catch(function(error){
        $("#deleteModal").modal("hide");
        //Toaster Msg
    });
}

//Each Service Update Details
function ServiceDetails(detailsId) {
    axios
        .post("/serviceDetails", { id: detailsId })

        .then(function (response) {
            if (response.status == 200) {
                $("#serviceEditLoader").addClass("d-none");
                $("#serviceEditForm").removeClass("d-none");
                var jsonData = response.data
                $("#serviceNameId").val(jsonData[0].service_name);
                $("#serviceDesId").val(jsonData[0].service_des);
                $("#serviceImageId").val(jsonData[0].service_img);
            }else{
                $("#serviceEditLoader").addClass("d-none");
                $("#serviceEditWrong").removeClass("d-none");
            }
        })
        .catch(function (error) {
            $("#serviceEditLoader").addClass("d-none");
            $("#serviceEditWrong").removeClass("d-none");
        });
}

    //Service Edit Save BTN
    $("#serviceEditConfirmBTN").click(function () {
        var id = $("#serviceEditId").html();
        var name = $("#serviceNameId").val();
        var des = $("#serviceDesId").val();
        var img = $("#serviceImageId").val();
        ServiceUpdateDetails(id, name, des, img);
    });

//Service Update
function ServiceUpdateDetails(serviceId,serviceName,serviceDes,serviceImg) {
    if (serviceName.length == 0) {
        //Toaster Msg
    } else if (serviceDes.length == 0) {
        //Toaster Msg
    } else if (serviceImg.length == 0) {
        //Toaster Msg
    } else {

        $("#serviceEditConfirmBTN").html(
            "<div class='spinner-border spinner-border-sm' role='status'></div>"
        ); //Loading Animation

        axios
            .post("/serviceUpdate", {
                id: serviceId,
                name: serviceName,
                des: serviceDes,
                img: serviceImg,
            })

            .then(function (response) {

                $("#serviceEditConfirmBTN").html("Save");

                if (response.status == 200) {

                    if (response.data == 1) {
                        $("#editModel").modal("hide");
                        //Toaster Msg
                        getServiceData();
                    } else {
                        $("#editModel").modal("hide");
                        //Toaster Msg
                        getServiceData();
                    }
                } else {
                    $("#editModel").modal("hide");
                    //Toaster Msg
                }
            })
            .catch(function (error) {
                $("#editModel").modal("hide");
                //Toaster Msg
            });
    }
}


//Service Edit Save BTN
$("#serviceAddConfirmBTN").click(function () {
    var name = $("#serviceNameAddId").val();
    var des = $("#serviceDesAddId").val();
    var img = $("#serviceImageAddId").val();
    ServiceAddDetails(name, des, img);
});

/* Service Add New */

$("#addNewBtnId").click(function(){

    $("#addModal").modal("show");
});
/* Service Add Method */
function ServiceAddDetails(serviceName,serviceDes,serviceImg) {
    if (serviceName.length == 0) {
        //Toaster Msg
    } else if (serviceDes.length == 0) {
        //Toaster Msg
    } else if (serviceImg.length == 0) {
        //Toaster Msg
    } else {

        $("#serviceAddConfirmBTN").html(
            "<div class='spinner-border spinner-border-sm' role='status'></div>"
        ); //Loading Animation

        axios
            .post("/serviceAdd", {
                name: serviceName,
                des: serviceDes,
                img: serviceImg,
            })

            .then(function (response) {
                $("#serviceAddConfirmBTN").html("Add");

                if (response.status == 200) {
                    if (response.data == 1) {
                        $("#addModal").modal("hide");
                        //Toaster Msg
                        getServiceData();
                    } else {
                        $("#addModal").modal("hide");
                        //Toaster Msg
                        getServiceData();
                    }
                } else {
                    $("#addModal").modal("hide");
                    //Toaster Msg
                }
            })
            .catch(function (error) {
                $("#addModal").modal("hide");
                //Toaster Msg
            });
    }
}

	</script>
@endsection