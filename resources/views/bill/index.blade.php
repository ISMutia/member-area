@extends('layout.master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card card-rounded shadow-lg">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title card-title-dash">Bills {{ $keyword }}</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No Bills</th>
                                        <th>Project Name</th>
                                        <th>Bukti</th>
                                        <th>Status</th>
                                        <th>Total Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->id }}</td>
                                            <td>{{ $d->project_name }}</td>
                                            <td>{{ $d->bukti }}</td>
                                            <td>{{ $d->name_status }}</td>
                                            <td>{{ $d->total_bayar }}</td>
                                            <td>
                                                <a href="/bill/edit/{{ $d->id }}" class="btn btn-primary btn-sm">Edit</a>
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
