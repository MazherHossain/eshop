@extends('admin.layouts.app')

@section('main-content')


<style>
	.switch {
		position: relative;
		display: inline-block;
		width: 60px;
		height: 34px;
	}
	
	.switch input { 
		opacity: 0;
		width: 0;
		height: 0;
	}
	
	.slider {
		position: absolute;
		cursor: pointer;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background-color: #ccc;
		-webkit-transition: .4s;
		transition: .4s;
	}
	
	.slider:before {
		position: absolute;
		content: "";
		height: 26px;
		width: 26px;
		left: 4px;
		bottom: 4px;
		background-color: white;
		-webkit-transition: .4s;
		transition: .4s;
	}
	
	input:checked + .slider {
		background-color: #2196F3;
	}
	
	input:focus + .slider {
		box-shadow: 0 0 1px #2196F3;
	}
	
	input:checked + .slider:before {
		-webkit-transform: translateX(26px);
		-ms-transform: translateX(26px);
		transform: translateX(26px);
	}
	
	/* Rounded sliders */
	.slider.round {
		border-radius: 34px;
	}
	
	.slider.round:before {
		border-radius: 50%;
	}
	#role_add_modal ul li{
		list-style: none;
	}
	</style>


				<!--end breadcrumb-->
				<div class="row">
					<div class="col">
						<!-- Button trigger modal -->
  
  
						<h6 class="mb-0 text-uppercase">All Permissions</h6>
						<hr/>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#permission_add_modal">Add New Permission</button>
            <br>
            <br>
						<div class="card">
							<div class="card-body">
								<table class="table mb-0 table-striped">
									<thead>
										<tr>
											<th scope="col">Serial</th>
											<th scope="col">Permission Name</th>
											<th scope="col">Slug</th>
                      <th scope="col">Action</th>
										</tr>
									</thead>
									<tbody id="permission_list">
										
									</tbody>
								</table>
							</div>
						</div>
						
					</div>
				</div>
				<!--end row-->


{{--Modal for new role--}}
<div class="col">
  <!-- Modal -->
  <div class="modal fade" id="permission_add_modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
				<form id="permission_add_form" method="POST">
					@csrf
        <div class="modal-header">
          <h5 class="modal-title">Add New Permission</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
					<div class="msg"></div>
					<div class="form-group">
						<label for="">Permission Name</label>
						<input name="name" type="text" class="form-control">
					</div>
					
					<div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
			</form>
      </div>
    </div>
  </div>
</div>

@endsection