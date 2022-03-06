@extends('admin.layouts.app')


@section('main-content')

<div class="row">
  <div class="col-12 col-lg-8">
    <div class="card radius-10">
      <div class="card-header border-bottom-0 bg-transparent">
        <div class="d-lg-flex align-items-center">
          <div>
            <h6 class="font-weight-bold mb-2 mb-lg-0">Hospital Activities</h6>
          </div>
          <div class="ms-lg-auto mb-2 mb-lg-0">
            <div class="btn-group-round">
              <div class="btn-group">
                <button type="button" class="btn btn-white">Last 1 Year</button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="javaScript:;">Last Month</a>
                  <a class="dropdown-item" href="javaScript:;">Last Week</a>
                </div>
                <button type="button" class="btn btn-white dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">	<span class="visually-hidden">Toggle Dropdown</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div id="chart1"></div>
      </div>
    </div>
  </div>
  <div class="col-12 col-lg-4">
    <div class="card radius-10 bg-gradient-burning">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <img src="assets/images/icons/appointment-book.png" width="45" alt="" />
          <div class="ms-auto text-end">
            <p class="mb-0 text-white"><i class='bx bxs-arrow-from-bottom'></i> 2.69%</p>
            <p class="mb-0 text-white">Since Last Month</p>
          </div>
        </div>
        <div class="d-flex align-items-center mt-3">
          <div class="flex-grow-1">
            <p class="mb-1 text-white">Appointments</p>
            <h4 class="mb-0 text-white font-weight-bold">1879</h4>
          </div>
          <div id="chart2"></div>
        </div>
      </div>
    </div>
    <div class="card radius-10 bg-gradient-blues">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <img src="assets/images/icons/surgery.png" width="45" alt="" />
          <div class="ms-auto text-end">
            <p class="mb-0 text-white"><i class='bx bxs-arrow-from-bottom'></i> 3.56%</p>
            <p class="mb-0 text-white">Since Last Month</p>
          </div>
        </div>
        <div class="d-flex align-items-center mt-3">
          <div class="flex-grow-1">
            <p class="mb-1 text-white">Surgery</p>
            <h4 class="mb-0 text-white font-weight-bold">3768</h4>
          </div>
          <div id="chart3"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--end row-->

<div class="row row-cols-1 row-cols-lg-3">
  <div class="col d-flex">
    <div class="card radius-10 w-100">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <h6 class="mb-0 font-weight-bold">Top Doctors</h6>
          <p class="mb-0 ms-auto"><i class='bx bx-dots-horizontal-rounded float-end font-24'></i>
          </p>
        </div>
        <div class="d-flex align-items-center mt-3">
          <img src="{{url('assets/images/avatars/avatar-1.png')}}" width="45" height="45" class="rounded-circle" alt="" />
          <div class="flex-grow-1 ms-3">
            <p class="mb-0"><span class="badge badge-pill bg-light-danger text-danger">4.9</span>
            </p>
            <p class="font-weight-bold mb-0">Dr. Neil Wagner</p>
            <p class="text-secondary mb-0">Pediatrician</p>
          </div> <a href="javaScript:;" class="btn btn-sm btn-outline-primary radius-10">Schedule</a>
        </div>
        <hr/>
        <div class="d-flex align-items-center">
          <img src="{{url('assets/images/avatars/avatar-2.png')}}" width="45" height="45" class="rounded-circle" alt="" />
          <div class="flex-grow-1 ms-3">
            <p class="mb-0"><span class="badge badge-pill bg-light-danger text-danger">3.5</span>
            </p>
            <p class="font-weight-bold mb-0">Dr. Kane Williamson</p>
            <p class="text-secondary mb-0">Psychiatrist</p>
          </div> <a href="javaScript:;" class="btn btn-sm btn-outline-primary radius-10">Schedule</a>
        </div>
        <hr/>
        <div class="d-flex align-items-center">
          <img src="{{url('assets/images/avatars/avatar-3.png')}}" width="45" height="45" class="rounded-circle" alt="" />
          <div class="flex-grow-1 ms-3">
            <p class="mb-0"><span class="badge badge-pill bg-light-danger text-danger">5.2</span>
            </p>
            <p class="font-weight-bold mb-0">Dr. Tom Bundle</p>
            <p class="text-secondary mb-0">Neurologist</p>
          </div> <a href="javaScript:;" class="btn btn-sm btn-outline-primary radius-10">Schedule</a>
        </div>
        <hr/>
        <div class="d-flex align-items-center">
          <img src="{{url('assets/images/avatars/avatar-4.png')}}" width="45" height="45" class="rounded-circle" alt="" />
          <div class="flex-grow-1 ms-3">
            <p class="mb-0"><span class="badge badge-pill bg-light-danger text-danger">8.9</span>
            </p>
            <p class="font-weight-bold mb-0">Dr. Tim Southee</p>
            <p class="text-secondary mb-0">Rheumatologist</p>
          </div> <a href="javaScript:;" class="btn btn-sm btn-outline-primary radius-10">Schedule</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col d-flex">
    <div class="card radius-10 w-100">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <h6 class="mb-0 font-weight-bold">Diseases Report</h6>
          <p class="mb-0 ms-auto"><i class='bx bx-dots-horizontal-rounded float-end font-24'></i>
          </p>
        </div>
        <div class="pt-5">
          <div id="chart4"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col d-flex">
    <div class="card radius-10 w-100 overflow-hidden">
      <div class="card-body">
        <div class="">
          <h4 class="mb-2 font-weight-bold">3,240</h4>
          <p class="mb-3 text-secondary">Patients this month</p>
        </div>
      </div>
      <div id="chart5"></div>
    </div>
  </div>
</div><!--end row-->



@endsection