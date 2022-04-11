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
  
  
						<h6 class="mb-0 text-uppercase">All Users</h6>
						<hr/>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#user_add_modal">Add New User</button>
            <br>
            <br>
						<div class="card">
							<div class="card-body">
								<table class="table mb-0 table-striped">
									<thead>
										<tr>
											<th scope="col">Serial</th>
											<th scope="col">Name</th>
											<th scope="col">User Name</th>
                      <th scope="col">Role</th>
											<th scope="col">Photo</th>
											<th scope="col">Status</th>
                      <th scope="col">Action</th>
										</tr>
									</thead>
									<tbody id="role_list">
									
										
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
  <div class="modal fade" id="user_add_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
				<form id="role_add_form" method="POST">
					@csrf
        <div class="modal-header">
          <h5 class="modal-title">Add New User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
					<div class="msg"></div>
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label for="">User Name</label>
						<input name="name" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="name" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input name="name" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Role</label>

						<select class="form-control" name="" id="">
							<option value="">-Select-</option>
							@foreach ($all_roles as $item)
							<option value="{{$item-> id}}">{{$item-> name}}</option>
							@endforeach
						</select>
						
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


{{--Modal for edit--}}
<div class="col">
  <!-- Modal -->
  <div class="modal fade" id="role_edit_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
				<form id="role_edit_form" method="POST">
					@csrf
					@method('PUT')
        <div class="modal-header">
          <h5 class="modal-title">Edit Role Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
					<div class="msg"></div>
					<div class="form-group">
						<label for="">Role Name</label>
						<input name="name" type="text" class="form-control">
						<input name="edit_id" type="hidden" class="form-control">
					</div>
					<div class="form-group">
						<hr>
						<label for="">Permissions</label>
						<hr>
						<div id="per_list_edit">

						</div>
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