@extends('layout.master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4>Create Price</h4>
                        <br>
                        <form action="/price/store" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Name Price</label>
                                <input type="text" name="name" class="form-control" placeholder="Name Price" value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control" placeholder="Price" value="{{ old('price') }}">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" placeholder="Description" id="tiny-mce">{{ old('description') }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
