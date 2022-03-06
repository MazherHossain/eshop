@extends('admin.layouts.app')

@section('main-content')



				<!--end breadcrumb-->
				<div class="row">
					<div class="col">
						<!-- Button trigger modal -->
  
  
						<h6 class="mb-0 text-uppercase">All Users Role</h6>
						<hr/>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal">Add New Role</button>
            <br>
            <br>
						<div class="card">
							<div class="card-body">
								<table class="table mb-0 table-striped">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Role Name</th>
											<th scope="col">Slug</th>
											<th scope="col">Status</th>
                      <th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row">1</th>
											<td>Mark</td>
											<td>Otto</td>
											<td>@mdo</td>
                      <td>
                        <a class="btn btn-warning" href="#">Edit</a>
                        <a class="btn btn-danger" href="#">Delete</a>
                      </td>
										</tr>
										
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
  <div class="modal fade" id="role_add_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur.</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection