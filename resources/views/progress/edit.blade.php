@extends('layout.master')

@section('content')
{{-- {{ dd($data) }}  --}}
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4>Edit Progress</h4>
            <br>
            <form action="/progress/update" method="POST">
              {{csrf_field()}}

              <div class="form-group">
                <label><h5>Project Name : 
                <td>
                  {{ $dataProgress->order->project_name }}
                </td>
                </h5></label>
              </div>
              <div class="form-group">
                <input type="hidden" name="id" class="form-control" aria-label="id" value="{{ $dataProgress->id }}">
              </div>
            <div class="form-group">
              <label>Progress</label>
              <input type="text" name="progress" class="form-control" placeholder="Progress" aria-label="Progress" value="{{ $dataProgress->progress }}">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection