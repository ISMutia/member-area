@extends('layout.master')

@section('content')
    <div class="content-wrapper">
        <div class="col-md-6 col-lg-12 grid-margin stretch-card">
            <div class="card bg-primary card-rounded">
              <div class="card-body pb-0">
                <h4 class="card-title card-title-dash text-white mb-4">Detail Project</h4>
                <div class="row">
                    <div class="row">
                        <div class="col-sm-12">
                          <div class="statistics-details d-flex align-items-center justify-content-between">
                            <div>
                              <p class="statistics-title text-white" >Waiting</p>
                              <h3 class="rate-percentage text-success">10</h3>
                            </div>
                            <div>
                              <p class="statistics-title text-white">Active</p>
                              <h3 class="rate-percentage text-danger d-flex">3</h3>
                            </div>
                            <div>
                              <p class="statistics-title text-white">On Progress</p>
                              <h3 class="rate-percentage text-success">9</h3>
                            </div>
                            <div>
                                <p class="statistics-title text-white">Finish</p>
                                <h3 class="rate-percentage text-danger d-flex">5</h3>
                            </div>
                            <div>
                                <p class="statistics-title text-white">Failed</p>
                                <h3 class="rate-percentage text-success">7</h3>

                            </div>
                          </div>
                        </div>
                      </div>
                  <div class="col-sm-8">
                    <div class="status-summary-chart-wrapper pb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                      {{-- <canvas id="status-summary" width="148" height="99" style="display: block; height: 66px; width: 99px;" class="chartjs-render-monitor"></canvas> --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-start">
                            <div>
                                <h4 class="card-title card-title-dash">Progress</h4>
                                <p class="card-subtitle card-subtitle-dash">Customer Order</p>
                            </div>
                        </div>
                        <div class="table-responsive  mt-1">
                            <table class="table select-table">
                                <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Project Name</th>
                                        <th>Progress</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>
                                                <h6>{{ $d->fullname }}</h6>
                                            </td>
                                            <td>{{ $d->project_name }}</td>
                                            <td>
                                                <div>
                                                    <div
                                                        class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                        <p class="text-success">{{ $d->progress }}%</p>
                                                    </div>
                                                    <div class="progress progress-md">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: {{ $d->progress }}%" aria-valuenow="25"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="badge badge-opacity-warning">{{ $d->nama_status }}</div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
