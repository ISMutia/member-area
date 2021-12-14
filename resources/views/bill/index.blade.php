@extends('layout.master')

@section('content')
{{-- {{ dd($data) }}  --}}
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <h4 class="card-title card-title-dash">Bills {{ $keyword }}</h4>
            </div>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      No Bills
                      </th>
                    <th>
                      Project Name
                    </th>
                    <th>
                      Bukti
                    </th>
                    <th>
                      Status
                    </th>
                    <th>
                      Total Harga
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $d)  
                  <tr>
                    <td>
                      {{ $d->id }}
                      </td>
                    <td>
                      {{ $d->project_name }}
                    </td>
                    <td>
                      {{ $d->bukti }}
                    </td>
                    <td>
                      {{ $d->name_status }}
                    </td>
                    <td>
                      {{ $d->total_bayar }}
                    </td>
                    <td>
                      <a href="/bill/edit/{{ $d->id }}"class="btn btn-primary btn-sm">Edit</button>
                      {{-- <a href="/bill/delete/{{ $d->id }}" class="btn btn-danger btn-sm">Delete</button> --}}
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