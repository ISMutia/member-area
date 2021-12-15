@extends('layout.master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4>Edit Testimoni</h4>
                        <br>
                        <form action="{{ route('testimoni.update', ['id' => $data->id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="id_customers">Customers</label>
                                <select name="id_customers" class="form-control form-group-sm">
                                    @foreach ($dataUser as $d)
                                        <option value="{{ $d->id }}" @if ($data->id_customers == $d->id) selected @endif>
                                            {{ $d->fullname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control form-group-sm">
                                    @foreach (\App\Enums\StatusActive::asArray() as $value => $key)
                                        <option value="{{ $key }}" @if ($d->status === $key) selected @endif>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" cols="30" rows="5" placeholder="Description"
                                    class="form-control">{{ $data->description }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
