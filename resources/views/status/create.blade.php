@extends('layout.master')

@section('content')
{{-- {{ dd($data) }} --}} 
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4>Create Status</h4>
            <br>
            <form action="/status/store" method="POST">
              {{csrf_field()}}
            <div class="form-group">
              <label>Name Status</label>
              <input type="text" name="name" class="form-control" placeholder="Name" aria-label="Name">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection