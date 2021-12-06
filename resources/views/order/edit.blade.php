@extends('layout.master')

@section('content')
{{-- {{ dd($data) }}  --}}
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4>Edit Order</h4>
            <br>
            <form action="/order/update" method="POST">
              {{csrf_field()}}

              <div class="form-group">
                <label for="id_customers">Customers:</label>
                <select name="id_customers" id="class">
                  @foreach ($dataUser as $d)
                  <option value="{{ $d->id }}" @if ($dataOrder->id_customers==$d->id) {{ "selected" }}@endif> 
                    {{ $d->fullname }}</option>                    
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <input type="hidden" name="id" class="form-control" aria-label="Domain Name" value="{{ $dataOrder->id }}">
              </div>
            <div class="form-group">
              <label>Project Name</label>
              <input type="text" name="project_name" class="form-control" placeholder="Project Name" aria-label="Project Name" value="{{ $dataOrder->project_name }}">
            </div>
            <div class="form-group">
                <label for="id_price">Type Price:</label>
                <select name="id_price" >
                  @foreach ($dataPrice as $d)
                  <option value="{{ $d->id }}" @if ($dataOrder->id_price==$d->id) {{ "selected" }}@endif> 
                  {{ $d->name }}</option>                    
                  @endforeach
                </select>
              </div>  
            <div class="form-group">
                <label for="id_domain">Domain:</label>
                <select name="id_domain" id="class">
                  @foreach ($dataDomain as $d)
                  <option value="{{ $d->id }}" @if ($dataOrder->id_domain==$d->id) {{ "selected" }}@endif>
                    {{ $d->name }}</option>                    
                  @endforeach
                </select>
              </div>
              
              <div class="form-group">
                <label> Status : </label>
                <td>
                  {{ $dataOrder->status->name }}
                </td>
              </div>
            <div class="form-group">
              <label>Lama Pengerjaan</label>
              <input type="text" name="lama_p" class="form-control" placeholder="Lama Pengerjaan" aria-label="Lama Pengerjaan" value="{{ $dataOrder->lama_p }}">
            </div>
            <div class="form-group">
              <label>Mulai Pengerjaan</label>
              <input type="text" name="mulai_p" class="form-control" placeholder="Mulai Pengerjaan" aria-label="Mulai Pengerjaan" value="{{ $dataOrder->mulai_p }}">
            </div>
            <div class="form-group">
              <label>Selesai Pengerjaan</label>
              <input type="text" name="selesai_p" class="form-control" placeholder="Selesai Pengerjaan" aria-label="Selesai Pengerjaan" value="{{ $dataOrder->selesai_p }}">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection