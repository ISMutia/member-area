@extends('layout.master')

@section('content')
{{-- {{ dd($data) }}  --}}
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <h4 class="card-title card-title-dash">Order</h4>
              {{-- <div class="add-items d-flex mb-0">
                <a href="/order/create" class="btn btn-primary btn-sm text-white mb-0 me-0" type="button">Create New Order</a>
              </div> --}}
            </div>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      Customer Name
                    </th>
                    <th>
                      Project Name
                    </th>
                    <th>
                      Domain Name
                    </th>
                    <th>
                      Price Name
                    </th>
                    <th>
                      Status Name
                    </th>
                    <th>
                      Lama Pengerjaan
                    </th>
                    <th>
                      Mulai Pengerjaan
                    </th>
                    <th>
                      Selesai Pengerjaan
                    </th>
                    <th>
                      Lama Domain
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
                      {{ $d->customer_name }}
                    </td>
                    <td>
                      {{ $d->project_name }}
                    </td>
                    <td>
                      {{ $d->domain_name }}
                    </td>
                    <td>
                      {{ $d->price_name }}
                    </td>
                    <td>
                      {{ $d->status_name }}
                    </td>
                    <td>
                      {{ $d->lama_p }}
                    </td>
                    <td>
                      {{ $d->mulai_p }}
                    </td>
                    <td>
                      {{ $d->selesai_p }}
                    </td>
                    <td>
                      {{ $d->lama_domain }}
                    </td>

                    <td>
                      <a href="{{ route('order.edit', ['id' => $d->id]) }}"class="btn btn-primary btn-sm">Edit</button>
                      <a href="{{ route('order.delete', ['id' => $d->id]) }}" class="btn btn-danger btn-sm">Delete</button>
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
