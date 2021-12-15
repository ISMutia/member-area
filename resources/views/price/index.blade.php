@extends('layout.master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card card-rounded shadow-lg">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title card-title-dash">Price</h4>
                            <div class="add-items d-flex mb-5">
                                <a href="{{ route('price.create') }}" class="btn btn-primary btn-sm text-white mb-0 me-0"
                                    type="button">Create New Price</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->name }}</td>
                                            <td>{{ $d->price }}</td>
                                            <td>{{ strip_tags(Str::limit($d->description, 50)) }}</td>
                                            <td>
                                                <a href="{{ route('price.edit', ['id' => $d->id]) }}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                <a href="{{ route('price.delete', ['id' => $d->id]) }}"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure to delete it?')">Delete</a>
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
