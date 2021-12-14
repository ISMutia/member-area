@extends('layout.master')

@section('content')
{{-- {{ dd($data) }}  --}}
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4>Create Price</h4>
            <br>
            <form action="/price/store" method="POST">
              {{csrf_field()}}
            <div class="form-group">
              <label>Name Price</label>
              <input type="text" name="name" class="form-control" placeholder="Name Price" aria-label="Name Price">
            </div>
            <div class="form-group">
              <label>Price</label>
              <input type="text" name="price" class="form-control" placeholder="Price" aria-label="Price">
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea class="summernote-simple" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection