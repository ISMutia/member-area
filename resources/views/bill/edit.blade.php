@extends('layout.master')

@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4>Edit Bill</h4>
            <br>
            <form action="{{ route('bill.update', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label>
                  <h5>No Bills :
                    {{ $data->id }}
                  </h5>
                </label>
              </div>

              <div class="form-group">
                <label>
                  <h5>Project Name :
                </label>
                {{ $data->order->project_name }}
                </h5>
              </div>

              <div class="form-group">
                <label for="id_status">Status:</label>
                <select name="id_status" id="id_status" class="form-control form-group-sm">
                  @foreach ($dataStatus as $d)
                    <option value="{{ $d->id }}" @if ($data->id_status == $d->id) selected @endif>
                      {{ $d->name }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Total Price</label>
                <input type="text" name="total_bayar" class="form-control" placeholder="Total Bayar"
                  value="{{ $data->total_bayar }}">
              </div>

              <div class="form-group">
                  <label>Receipt</label>
                  <input type="file" class="dropify" name="bukti" accept="image/*" data-default-file="{{ $data->buktiUrl }}">
              </div>

              <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
