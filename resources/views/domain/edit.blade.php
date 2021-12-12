@extends('layout.master')

@section('content')
{{-- {{ dd($data) }}  --}}
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4>Edit Domain</h4>
            <br>
            <form action="/domain/update" method="POST">
              {{csrf_field()}} 
            <div class="form-group">
                <input type="hidden" name="id" class="form-control" aria-label="Domain Name" value="{{ $dataDomain->id }}">
              </div>
            <div class="form-group">
              <label>Domain Name</label>
              <input type="text" name="name" class="form-control" placeholder="Domain Name" aria-label="Domain Name" value="{{ $dataDomain->name }}">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection