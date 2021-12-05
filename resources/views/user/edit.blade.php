@extends('layout.master')

@section('content')
{{-- {{ dd($data) }} --}} 
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4>Edit User</h4>
            <br>
            <form action="/user/update" method="POST">
              {{csrf_field()}}
              <input type="hidden" name="id" class="form-control" value="{{ $dataUser->id }}">
              <div class="form-group">
                <label>Fullname</label>
                <input type="text" name="fullname" class="form-control" placeholder="Fullname" aria-label="Fullname" value="{{ $dataUser->fullname }}">
              </div>
            <div class="form-group">
              <label>Date Birth</label>
              <input type="text" name="date_birth" class="form-control" placeholder="Date Birth" aria-label="Date Birth" value="{{ $dataUser->date_birth }}">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control" placeholder="Email" aria-label="Email" value="{{ $dataUser->email }}">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="text" name="password" class="form-control" placeholder="Password" aria-label="Password" value="{{ $dataUser->password }}">
            </div>
            <div class="form-group">
              <label>Status</label>
              <input type="text" name="status" class="form-control" placeholder="Status" aria-label="Status" value="{{ $dataUser->status }}">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection