@extends('layout.master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4>Edit Progress</h4>
                        <br>
                        <form action="{{ route('progress.update', ['id' => $dataProgress->id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <h5 style="display: inline">Project Name :</h5>
                                <h5 style="display: inline">{{ $dataProgress->order->project_name }}</h5>
                            </div>

                            <div class="form-group">
                                <label>Progress</label>
                                <input type="text" name="progress" class="form-control" placeholder="Progress"
                                    value="{{ $dataProgress->progress }}">
                            </div>

                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
