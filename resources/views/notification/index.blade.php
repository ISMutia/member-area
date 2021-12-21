@extends('layout.master')

@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card card-rounded shadow-lg">
          <div class="card-body">
            <h4 class="card-title card-title-dash mb-4">Trigger Notification</h4>
            <div class="row">
              <div class="col-sm-12">
                <div class="statistics-details d-flex align-items-center justify-content-between">
                    <div>
                        <a class="btn btn-info" href="/notifBirthday" class="dropdown-item">Customers Birthday</a>
                      </div>
                      <div>
                        <a class="btn btn-info" href="/notifDomainT/1" class="dropdown-item">Domain : 1 Month</a>
                      </div>
                      <div>
                        <a class="btn btn-info" href="/notifDomainT/2" class="dropdown-item">Domain : 2 Month</a>
                      </div>
                      <div>
                        <a class="btn btn-info" href="/notifDomainT/3" class="dropdown-item">Domain : 3 Month</a>
                      </div>
                      <div>
                        <a class="btn btn-info" href="/domainExpired" class="dropdown-item">Domain Expired</a>
                      </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card card-rounded shadow-lg">
          <div class="card-body">
            <h4 class="card-title card-title-dash mb-4">Trigger Notification</h4>
            <div class="row">
              <div class="col-sm-12">
                <div class="statistics-details d-flex align-items-center justify-content-between">
                    <div>
                        <a class="btn btn-info" href="/doneProjek" class="dropdown-item">Done Project</a>
                    </div>
                    <div>
                        <a class="btn btn-info" href="/doneDay/1" class="dropdown-item">Project : 1 Day</a>
                    </div>
                    <div>
                        <a class="btn btn-info" href="/doneDay/2" class="dropdown-item">Project : 2 Day</a>
                    </div>
                    <div>
                        <a class="btn btn-info" href="/doneDay/3" class="dropdown-item">Project : 3 Day</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
