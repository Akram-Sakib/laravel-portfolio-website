@extends("Layout.app")

@section("title","Sevices")

@section("content")
<div id="mainDiv" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">
<table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
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



<div id="loadingDiv" class="container mt-5">
<div class="row">
<div class="col-md-12 p-5 text-center">

  <img src="{{asset('images/loading.svg')}}" alt="" srcset="">

</div>
</div>
</div>


<div id="errorDiv" class="container d-none mt-5">
<div class="row">
<div class="col-md-12 p-5 text-center">

  <h3>Error Something went wrong !</h3>

</div>
</div>
</div>




<!-- Modal -->
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">
          No
        </button>
        <button type="button" class="btn btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>
@endsection


@section("script")
	<script type="text/javascript">
		getServiceData()
	</script>
@endsection