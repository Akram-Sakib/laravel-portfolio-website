@extends("Layout.app")

@section("title","Image Gallery")

@section("content")
<!-- Button trigger modal -->
<div id="mainDivPhoto" class="container">
    <div class="row">
        <div class="col-md-12 p-3">
            <button type="button" class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#photoModal">Add New</button>
        </div>
    </div>
</div>

<div class="container">
    <div class="row photoRow">

    </div>
    <button id="LoadMoreBTN" class="btn btn-primary">Load More</button>
</div>

<!-- Modal -->
<div
  class="modal fade"
  id="photoModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
          <input class="form-control mb-3" type="file" name="" id="imgInput">
          <img src="{{asset('images/default-placeholder.png')}}" class="text-center" id="imgPreview" alt="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
          Close
        </button>
        <button id="SavePhoto" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section("script")
	<script type="text/javascript">
        $('#imgInput').change(function(){

            var reader = new FileReader();
            reader.readAsDataURL(this.files[0])
            reader.onload = function(event){
               var imgSource = event.target.result;
               $("#imgPreview").attr("src",imgSource);
            };

        });

        $("#SavePhoto").on("click",function(){

            $("#SavePhoto").html("<div class='spinner-border spinner-border-sm' role='status'></div>");
            var photoFile = $("#imgInput").prop('files')[0];
            var formData = new FormData();

            formData.append("photo",photoFile);

            axios.post("/photouplaod",formData).then(function(response){

                if(response.status == 200 && response.data == 1){
                    $("#SavePhoto").html("Save");
                    $("#photoModal").modal("hide");
                }else{
                    $("#photoModal").modal("hide");
                    //Toast Msg
                }
                //Toast Msg
            }).catch(function(error){
                $("#SavePhoto").html("Save");
                //Toast Msg
            })

        });

        loadPhoto()

        function loadPhoto(){

        axios.get('/photojson').then(function(response){

          $.each(response.data, function (i, item) {
                    $("<div class='col-md-3 p-2'>")
                        .html(
                            "<img data-id='"+item['id']+"' class='imgOnRow' src='"+item['location']+"' alt='' >"+
                            "<button data-id='"+item['id']+"' data-photo='"+item['location']+"' class='btn btn-danger mt-2'>Delete</button>"
                        )
                        .appendTo(".photoRow");
                });

                $(".deletePhoto").on("click",function(event){
                  let id = $(this).data('id');
                  let photo = $(this).data('photo');
            
                  photoDelete(photo, id)
                  event.preventDefault();
                })
                

        }).catch(function(error){

        });

        }

        var imgID = 0;
        function loadById(FirstImgId,loadMoreBTN){

          imgID = imgID+3;
          let PhotoID = imgID+FirstImgId;
          let url = "/photojsonbyid/"+PhotoID;
          
          loadMoreBTN.html("<div class='spinner-border spinner-border-sm' role='status'></div>");
          axios.get(url).then(function(response){

            loadMoreBTN.html("Load More");
          $.each(response.data, function (i, item) {
                    $("<div class='col-md-3 p-2'>")
                        .html(
                            "<img data-id='"+item['id']+"' class='imgOnRow' src='"+item['location']+"' alt='' >"+
                            "<button data-id='"+item['id']+"' data-photo='"+item['location']+"' class='btn btn-danger mt-2 deletePhoto'>Delete</button>"
                        )
                        .appendTo(".photoRow");
                });

                $(".deletePhoto").on("click",function(event){
                  let id = $(this).data('id');
                  let photo = $(this).data('photo');
            
                  photoDelete(photo, id)
                  event.preventDefault();
                })

        }).catch(function(error){

        });

        }

        $("#LoadMoreBTN").on("click",function(){
          var loadMoreBTN = $(this);
          var firstImgId = $(this).closest("div").find('img').data('id');
          
          loadById(firstImgId,loadMoreBTN);

        });

        function photoDelete(OldPhotoUrl, id){

          let URL = "/photodelete";
          let MyFormData = new FormData();

          MyFormData.append('OldPhotoUrl',OldPhotoUrl);
          MyFormData.append('id',id);

          axios.post(URL,MyFormData).then(function(response){

            if(response.status == 200 && response.data == 1){
              //Toast
              alert("Photo Deleted Successfully");
              $(".photoRow").empty();
              loadPhoto();
              imgID = 0;
            }else{
              alert("Delete Failed");
            }

          }).catch(function(error){
            alert("Delete Failed");
          });

        }

	</script>
@endsection