@extends("Layout.app")

@section("title", "Reviews")

@section("content")
<div id="mainDivReview" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">

<button id="addNewReviewBtnId" class="btn btn-sm btn-danger mb-3">Add New</button>

<table id="ReviewDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Image</th>
	  <th class="th-sm">Name</th>
	  <th class="th-sm">Description</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="Review_table">
  

	
  </tbody>
</table>

</div>
</div>
</div>



<div id="loadingDivReview" class="container mt-5">
<div class="row">
<div class="col-md-12 p-5 text-center">

  <img src="{{asset('images/loading.svg')}}" alt="" srcset="">

</div>
</div>
</div>


<div id="errorDivReview" class="container d-none mt-5">
<div class="row">
<div class="col-md-12 p-5 text-center">

  <h3>Error Something went wrong !</h3>

</div>
</div>
</div>

<!-- Add Review Modal -->
<div
  class="modal fade"
  id="addReviewModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body mt-3 pt-5 text-center">

<div id="ReviewAddForm" class="w-100">
  <h5 class="mb-4">Add New Reviews</h5>
      <div class="row">
          <div class="col-md-12">
              <!-- Review Name -->
      <div class="form-outline mb-4">
        <input id="ReviewNameAddId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Review Name</label>
      </div>
      <!-- Review Description -->
      <div class="form-outline mb-4">
        <input id="ReviewDesAddId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Review Description</label>
      </div>
      <!-- Review Image Link -->
      <div class="form-outline mb-4">
        <input id="ReviewImageAddId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Review Image Link</label>
      </div>
          </div>
      </div>
      
      
</div>

      </div>
      <div class="modal-footer">
        <button  class="btn btn-primary" data-mdb-dismiss="modal">Cancel</button>
        <button  id="ReviewAddConfirmBTN" type="button" class="btn btn-danger">Add New</button>
      </div>
    </div>
  </div>
</div>

<!-- Review Edit Modal -->
<div
  class="modal fade"
  id="editReviewModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>

  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit Review</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                <span aria-hidden="true" >&times;</span>
            </button>
        </div>
      <div class="modal-body mt-3 pt-5 text-center">

<div id="ReviewEditForm" class="w-100 d-none">
    <h6 class="d-none" id="ReviewEditId" ></h6>
      <div class="row">
          <div class="col-md-12">
    <!-- Review Name -->
      <div class="form-outline mb-4">
        <input id="ReviewNameEditId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Review Name</label>
      </div>
      <!-- Review Description -->
      <div class="form-outline mb-4">
        <input id="ReviewDesEditId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Review Description</label>
      </div>
      <!-- Review Image Link -->
      <div class="form-outline mb-4">
        <input id="ReviewImageEditId" type="email" id="form5Example2" class="form-control" />
        <label class="form-label" for="form5Example2">Review Image Link</label>
      </div>
          </div>
      </div>   
</div>

<img id="ReviewEditLoader" src="{{asset('images/loading.svg')}}" alt="" srcset="">
<h5 id="ReviewEditWrong" class="d-none" >Something went wrong</h5>

      </div>
      <div class="modal-footer">
        <button  class="btn btn-primary" data-mdb-dismiss="modal">Cancel</button>
        <button  id="ReviewEditConfirmBTN" type="button" class="btn btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>


<!-- Delete Modal -->
<div
  class="modal fade"
  id="ReviewDeleteModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body mt-3">
        <h5 class="">Do you want to Delete ?</h5>
        <h5 id='ReviewDeleteId' class="d-none"></h5>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-mdb-dismiss="modal">No</button>
        <button id="ReviewDeleteConfirmBTN" type="button" class="btn btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section("script")
<script>
    getReviewsData()

function getReviewsData() {
    axios
        .get("/getreviewsdata")
        .then(function (response) {
            if (response.status == 200) {
                $("#mainDivReview").removeClass("d-none");
                $("#loadingDivReview").addClass("d-none");

                $("#ReviewDataTable").DataTable().destroy();
                $("#Review_table").empty();

                //Review Data-table
                var jsonData = response.data;
                $.each(jsonData, function (i, item) {
                    $("<tr>")
                        .html(
                            "<td><img class='table-img' src=" + jsonData[i].img + "></td>" +
                            "<td>" +
                                jsonData[i].name +
                                "</td>" +
                                "<td>" +
                                jsonData[i].des +
                                "</td>" +
                                "<td><a data-id='" +
                                jsonData[i].id +
                                "' class='ReviewEditBtn' ><i class='fas fa-edit'></i></a></td>" +
                                "<td><a data-id='" +
                                jsonData[i].id +
                                "' class='ReviewDeleteBtn' ><i class='fas fa-trash-alt'></i></a></td>"
                        )
                        .appendTo("#Review_table");
                });

                $(".ReviewDeleteBtn").click(function () {
                    var id = $(this).data("id");
                    $("#ReviewDeleteId").html(id);
                    $("#ReviewDeleteModal").modal("show");
                });

                //Reviews table edit icon
                $(".ReviewEditBtn").click(function () {
                    var id = $(this).data("id");
                    $("#ReviewEditId").html(id);
                    ReviewDetails(id);
                    $("#editReviewModal").modal("show");
                });

                $("#ReviewDataTable").DataTable({ order: false });
                $(".dataTables_length").addClass("bs-select");

            } else {
                $("#loadingDivReview").addClass("d-none");
                $("#errorDivReview").removeClass("d-none");
            }
        })
        .catch(function (error) {
            $("#loadingDivReview").addClass("d-none");
            $("#errorDivReview").removeClass("d-none");
        });
}


/* Add New Review Click*/
$("#addNewReviewBtnId").click(function () {

    $("#addReviewModal").modal("show");

});

$("#ReviewAddConfirmBTN").click(function () {
    var ReviewNameAddId = $("#ReviewNameAddId").val();
    var ReviewDesAddId = $("#ReviewDesAddId").val();
    var ReviewImageAddId = $("#ReviewImageAddId").val();

    ReviewAddDetails(
        ReviewNameAddId,
        ReviewDesAddId,
        ReviewImageAddId
    );
});

/* Review Add Method */
function ReviewAddDetails(
    ReviewName,
    ReviewDes,
    ReviewImg
) {
    if (ReviewName.length == 0) {
        //Toaster Msg
        console.log("Error");
    } else if (ReviewDes.length == 0) {
        //Toaster Msg
        console.log("Error");
    } else if (ReviewImg.length == 0) {
        //Toaster Msg
        console.log("Error");
    } else {
        $("#ReviewAddConfirmBTN").html(
            "<div class='spinner-border spinner-border-sm' role='status'></div>"
        ); //Loading Animation

        axios
            .post("/reviewsAdd", {
                name: ReviewName,
                des: ReviewDes,
                img: ReviewImg
            })

            .then(function (response) {
                $("#ReviewAddConfirmBTN").html("Add");

                if (response.status == 200) {
                    if (response.data == 1) {
                        $("#addReviewModal").modal("hide");
                        //Toaster Msg
                        getReviewsData();
                    } else {
                        $("#addReviewModal").modal("hide");
                        //Toaster Msg
                        getReviewsData();
                    }
                } else {
                    $("#addReviewModal").modal("hide");
                    //Toaster Msg
                }
            })
            .catch(function (error) {
                $("#addReviewModal").modal("hide");
                //Toaster Msg
            });
    }
}


  //Review Delete Modal Yes button
    $("#ReviewDeleteConfirmBTN").click(function () {
        var id = $("#ReviewDeleteId").html();
        getReviewDelete(id);
    });

    
//Review Delete
function getReviewDelete(deleteId) {
    $("#ReviewDeleteConfirmBTN").html(
        "<div class='spinner-border spinner-border-sm' role='status'></div>"
    ); //Loading Animation

    axios
        .post("/reviewdelete", { id: deleteId })
        .then(function (response) {
            $("#ReviewDeleteConfirmBTN").html("Yes");
            if (response.status == 200) {
                if (response.data == 1) {
                    $("#ReviewDeleteModal").modal("hide");
                    //Toaster Msg
                    getReviewsData();
                } else {
                    $("#ReviewDeleteModal").modal("hide");
                    //Toaster Msg
                    getReviewsData();
                }
            } else {
                $("#ReviewDeleteModal").modal("hide");
                //Toaster Msg
            }
        })
        .catch(function (error) {
            $("#ReviewDeleteModal").modal("hide");
            //Toaster Msg
        });
}


//Each Review Update Details
function ReviewDetails(detailsId) {
    axios
        .post("/reviewDetails", { id: detailsId })

        .then(function (response) {
            if (response.status == 200) {
                $("#ReviewEditLoader").addClass("d-none");
                $("#ReviewEditForm").removeClass("d-none");
                var jsonData = response.data
                $("#ReviewNameEditId").val(jsonData[0].name);
                $("#ReviewDesEditId").val(jsonData[0].des);
                $("#ReviewImageEditId").val(jsonData[0].img);
            }else{
                $("#ReviewEditLoader").addClass("d-none");
                $("#ReviewEditWrong").removeClass("d-none");
            }
        })
        .catch(function (error) {
            $("#ReviewEditLoader").addClass("d-none");
            $("#ReviewEditWrong").removeClass("d-none");
        });
}

    //Review Edit Save BTN
    $("#ReviewEditConfirmBTN").click(function () {
        var id = $("#ReviewEditId").html();
        var ReviewNameEditId = $("#ReviewNameEditId").val();
        var ReviewDesEditId = $("#ReviewDesEditId").val();
        var ReviewImageEditId = $("#ReviewImageEditId").val();
        ReviewUpdateDetails(
            id,
            ReviewNameEditId,
            ReviewDesEditId,
            ReviewImageEditId
        );
    });

//Review Update
function ReviewUpdateDetails(
    ReviewId,
    ReviewName,
    ReviewDes,
    ReviewImg
) {
    if (ReviewName.length == 0) {
        //Toaster Msg
    } else if (ReviewDes.length == 0) {
        //Toaster Msg
    } else if (ReviewImg.length == 0) {
        //Toaster Msg
    } else {
        $("#ReviewEditConfirmBTN").html(
            "<div class='spinner-border spinner-border-sm' role='status'></div>"
        ); //Loading Animation

        axios
            .post("/reviewUpdate", {
                id: ReviewId,
                name: ReviewName,
                des: ReviewDes,
                img: ReviewImg
            })

            .then(function (response) {
                $("#ReviewEditConfirmBTN").html("Save");

                if (response.status == 200) {
                    if (response.data == 1) {
                        $("#editReviewModal").modal("hide");
                        //Toaster Msg
                        getReviewsData();
                    } else {
                        $("#editReviewModal").modal("hide");
                        //Toaster Msg
                        getReviewsData();
                    }
                } else {
                    $("#editReviewModal").modal("hide");
                    //Toaster Msg
                }
            })
            .catch(function (error) {
                $("#editReviewModal").modal("hide");
                //Toaster Msg
            });
    }
}

</script>
@endsection