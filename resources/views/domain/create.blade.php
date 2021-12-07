@extends('layout.master')

@section('content')
{{-- {{ dd($data) }}  --}}
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4>Create Domain</h4>
            <br>
            <form action="/domain/store" method="POST">
              {{csrf_field()}}
            <div class="form-group">
              <label for="id_price">Type Price</label>
              <select name="id_price" id="id_price" class="form-control form-group-sm">
                @foreach ($dataPrice as $d)
                <option value="{{ $d->id }}">{{ $d->name }}</option>                    
                @endforeach
              </select>
            </div>  
            
            
            <div class="form-group">
              <label>Domain Name</label>
              <input type="text" name="name" class="form-control" placeholder="Domain Name" aria-label="Domain Name">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection