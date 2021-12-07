@extends('layout.master')

@section('content')
{{-- {{ dd($data) }}  --}}
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4>Edit Bill</h4>
            <br>
            <form action="/bill/update" method="POST">
              {{csrf_field()}}
              <div class="form-group">
                <input type="hidden" name="id" class="form-control" aria-label="Bills Id" value="{{ $dataBills->id }}">
                <input type="hidden" name="id_h_orders" class="form-control" aria-label="Bills Id" value="{{ $dataBills->order->id }}">

              </div>
            <div class="form-group">
              <label><h5>No Bills : 
              <td>
                {{ $dataBills->id }}
              </td>
            </h5></label>
            </div>
            
            <div class="form-group">
              <label><h5>Project Name : </label>
              <td>
                {{ $dataBills->order->project_name }}
              </td>
            </h5></label>
            </div>

            <div class="form-group">
              <label for="id_status">Status:</label>
              <select name="id_status" id="id_status" class="form-control form-group-sm">
                @foreach ($dataStatus as $d)
                <option value="{{ $d->id }}" @if ($dataBills->id_status==$d->id) {{ "selected" }}@endif> 
                    {{ $d->name }}</option>                    
                @endforeach
              </select>
            </div>
           
            <div class="form-group">
              <label>Total Bayar</label>
              <input type="text" name="total_bayar" class="form-control" placeholder="Total Bayar" aria-label="Total Bayar" value="{{ $dataBills->total_bayar }}">
            </div>
           
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection