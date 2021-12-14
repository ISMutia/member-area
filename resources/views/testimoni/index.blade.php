@extends('layout.master')

@section('content')
{{-- {{ dd($data) }}  --}}
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <h4 class="card-title card-title-dash">Testimoni</h4>
            </div>
            <div class="table-responsive">
              <table class="table table-striped" id="data-table" style="width: 100%">
                <thead>
                  <tr>
                    <th>Customer Name</th>
                    <th>Description</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $d)
                  <tr>
                    <td>{{ $d->customer_name }}</td>
                    <td>{{ $d->description }}</td>
                    <td>
                      {{-- <a class="btn btn-primary btn-sm">Edit</button> --}}
                      <a href="/testimoni/delete/{{ $d->id }}" class="btn btn-danger btn-sm">Delete</button>
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
