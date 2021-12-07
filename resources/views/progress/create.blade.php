@extends('layout.master')

@section('content')
{{-- {{ dd($data) }}  --}}
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4>Create Progress</h4>
            <br>
            <form action="/progress/store" method="POST">
              {{csrf_field()}}
              <div class="form-group">
                <label for="id_h_orders">Project Name</label>
                <select name="id_h_orders" id="id_h_orders" class="form-control form-group-sm">
                  @foreach ($dataOrder as $d)
                  <option value="{{ $d->id }}">{{ $d->project_name }}</option>                    
                  @endforeach
                </select>
              </div>
            <div class="form-group">
              <label>Progress</label>
              <input type="text" name="progress" class="form-control" placeholder="Progress" aria-label="Progress">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection