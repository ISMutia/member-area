@extends('layout.master')

@section('content')
{{-- {{ dd($data) }}  --}}
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4>Create Order</h4>
            <br>
            <form action="/order/update" method="POST">
              {{csrf_field()}}
              <div class="form-group">
                <input type="hidden" name="id" class="form-control" aria-label="Bills Id">
              </div>
            <div class="form-group">
              <label>No Bills : </label>
              <td>
                {{ $dataBills->id }}
              </td>
            </div>
            
            <div class="form-group">
              <label for="id_h_orders">project_name:</label>
              <select name="id_h_orders" id="class">
                @foreach ($dataOrder as $d)
                <option value="{{ $d->id }}" @if ($dataBills->id_h_orders==$d->id) {{ "selected" }}@endif> 
                    {{ $d->project_name }}</option>                    
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="id_status">Status:</label>
              <select name="id_status" id="class">
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