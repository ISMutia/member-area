@extends('layout.master')

@section('content')
    {{-- {{ dd($data) }} --}}
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title card-title-dash">Project Waiting</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Project Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->project_name }}</td>
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
