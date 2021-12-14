@extends('layout.master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card card-rounded shadow-lg">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title card-title-dash">Order</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="data-table">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Project Name</th>
                                        <th>Domain Name</th>
                                        <th>Domain Extention</th>
                                        <th>Package</th>
                                        <th>Status Name</th>
                                        <th>Work Duration</th>
                                        <th>Start Work</th>
                                        <th>Finish Work</th>
                                        <th>Domain Expired</th>
                                        <th>Date Order</th>
                                        <th>Update Order</th>
                                        <th>Link Group WA</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->customer_name }}</td>
                                            <td>{{ $d->project_name }}</td>
                                            <td>{{ $d->name_domain }}</td>
                                            <td>{{ $d->domain_name }}</td>
                                            <td>{{ $d->price_name }}</td>
                                            <td>{{ $d->status_name }}</td>
                                            <td>{{ $d->lama_p }}</td>
                                            <td>{{ $d->mulai_p }}</td>
                                            <td>{{ $d->selesai_p }}</td>
                                            <td>{{ $d->lama_domain }}</td>
                                            <td>{{ $d->created_at }}</td>
                                            <td>{{ $d->updated_at }}</td>
                                            <td>{{ Str::limit($d->link_group_wa, 50) }}</td>

                                            <td>
                                                <a href="{{ route('order.edit', ['id' => $d->id]) }}"
                                                    class="btn btn-primary btn-sm">Edit</button>
                                                    <a href="{{ route('order.delete', ['id' => $d->id]) }}"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure to delete it?')">Delete</button>
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
