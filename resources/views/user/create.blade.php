@extends('layout.master')

@section('content')
{{-- {{ dd($data) }}  --}}
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4>Create User</h4>
            <br>
            <form action="/user/store" method="POST">
              {{csrf_field()}}
            <div class="form-group">
              <label>Fullname</label>
              <input type="text" name="fullname" class="form-control" placeholder="Fullname" aria-label="Fullname">
            </div>
            <div class="form-group">
              <label>Date Birth</label>
              <input type="text" name="date_birth" class="form-control" placeholder="Date Birth" aria-label="Date Birth">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control" placeholder="Email" aria-label="Email">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="text" name="password" class="form-control" placeholder="Password" aria-label="Password">
            </div>
            <div class="form-group">
              <label>Status</label>
              <input type="text" name="status" class="form-control" placeholder="Status" aria-label="Status">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection