@extends('layout.master')

@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card card-rounded shadow-lg">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <h4 class="card-title card-title-dash">Subscribe</h4>
            </div>
            <div class="table-responsive">
              <table class="table table-striped" id="data-table" style="width: 100%">
                <thead>
                  <tr>
                    <th>Project Name</th>
                    <th>Domain Expired</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $order)
                  <tr>
                    <td>{{ $order->project_name }}</td>
                    <td>{{ $order->lama_domain->isoFormat('DD MMMM Y') }}</td>
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
