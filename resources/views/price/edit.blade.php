@extends('layout.master')

@section('content')
{{-- {{ dd($data) }} --}} 
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4>Edit Price</h4>
            <br>
            <form action="/price/update" method="POST">
              {{csrf_field()}}
              <input type="hidden" name="id" class="form-control" value="{{ $dataPrice->id }}">
            <div class="form-group">
              <label>Name Price</label>
              <input type="text" name="name" class="form-control" placeholder="Name" aria-label="Name" value="{{ $dataPrice->name }}">
            </div>
            <div class="form-group">
              <label>Price</label>
              <input type="text" name="price" class="form-control" placeholder="Price" aria-label="Price" value="{{ $dataPrice->price }}">
            </div>
            <div class="form-group">
              <label>Description</label>
              <div class="col-sm-12 col-md-7">
                <textarea class="summernote-simple" name="description">{{ $dataPrice->description }}</textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection