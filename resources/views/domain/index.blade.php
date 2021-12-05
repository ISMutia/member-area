@extends('layout.master')

@section('content')
{{-- {{ dd($data) }}  --}}
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <h4 class="card-title card-title-dash">Domain {{ $keyword }}</h4>
              <div class="add-items d-flex mb-0">
                <a href="/domain/create" class="btn btn-primary btn-sm text-white mb-0 me-0" type="button">Create New Domain</a>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      Price Name
                      </th>
                    <th>
                      Name
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
                      {{ $d->price_name }}
                      </td>
                    <td>
                      {{ $d->name }}
                    </td>
                    <td>
                      <a href="/domain/edit/{{ $d->id }}"class="btn btn-primary btn-sm">Edit</button>
                      <a href="/domain/delete/{{ $d->id }}" class="btn btn-danger btn-sm">Delete</button>
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