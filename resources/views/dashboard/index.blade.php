@extends('layout.master')

@section('content')
    <div class="content-wrapper">
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
