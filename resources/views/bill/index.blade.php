@extends('layout.master')

@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card card-rounded shadow-lg">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <h4 class="card-title card-title-dash">Bills</h4>
            </div>
            <div class="table-responsive">
              <table class="table table-striped" id="data-table" style="width: 100%">
                <thead>
                  <tr>
                    <th>No Bills</th>
                    <th>Project Name</th>
                    <th>Receipt</th>
                    <th>Status</th>
                    <th>Payment</th>
                    <th>Payment Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $d)
                    <tr>
                      <td>{{ $d->id }}</td>
                      <td>{{ $d->order->project_name }}</td>
                      <td>
                        @if ($d->bukti)
                          <a href="{{ $d->buktiUrl }}" target="_blank">Bukti</a>
                        @else
                          no receipt
                        @endif
                      </td>
                      <td>{{ $d->status->name }}</td>
                      <td>Rp. {{ $d->total_bayar }}</td>
                      <td>{{ $d->created_at }}</td>
                      <td>
                        <a href="{{ route('bill.edit', ['id' => $d->id]) }}" class="btn btn-primary btn-sm">Edit</a>
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
