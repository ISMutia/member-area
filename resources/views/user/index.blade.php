@extends('layout.master')

@section('content')
    {{-- {{ dd($data) }} --}}
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card card-rounded shadow-lg">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title card-title-dash">User</h4>
                            <div class="add-items d-flex mb-5">
                                <a href="/user/create" class="btn btn-primary btn-sm text-white mb-0 me-0"
                                    type="button">Create New User</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Date Birth</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Status</th>
                                        <th>Contact WA</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->fullname }}</td>
                                            <td>{{ $d->date_birth }}</td>
                                            <td>{{ $d->email }}</td>
                                            <td>{{ $d->password }}</td>
                                            <td>{{ $d->status }}</td>
                                            <td>{{ $d->contact_wa }}</td>
                                            <td>{{ Str::limit($d->address, 50) }}</td>
                                            <td>
                                                <a href="{{ route('user.edit', ['id' => $d->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="{{ route('user.delete', ['id' => $d->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete it?')">Delete</a>
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
