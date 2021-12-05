@extends('layout.master')

@section('content')
{{-- {{ dd($data) }}  --}}
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <h4 class="card-title card-title-dash">Price</h4>
              <div class="add-items d-flex mb-0">
                <a href="/price/create" class="btn btn-primary btn-sm text-white mb-0 me-0" type="button">Create New Price</a>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      Name
                    </th>
                    <th>
                      Price
                    </th>
                    <th>
                      Description
                    </th>
                    <th>
                      Aksi
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $d)  
                  <tr>
                    <td>
                      {{ $d->name }}
                    </td>
                    <td>
                      {{ $d->price }}
                    </td>
                    <td>
                      {{ $d->description }}
                    </td>
                    <td>
                      <a href="/price/edit/{{ $d->id }}"class="btn btn-primary btn-sm">Edit</a>
                      <a href="/price/delete/{{ $d->id }}" class="btn btn-danger btn-sm">Delete</button>
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