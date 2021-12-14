@extends('layout.master')

@section('content')
    {{-- {{ dd($data) }} --}}
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4>Create User</h4>
                        <br>
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Fullname</label>
                                <input type="text" name="fullname" class="form-control" placeholder="Fullname"
                                    value="{{ old('fullname') }}">
                            </div>

                            <div class="form-group">
                                <label>Date Birth</label>
                                <input type="date" name="date_birth" class="form-control" placeholder="Date Birth"
                                    value={{ old('date_birth') }}>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email"
                                    value="{{ old('email') }}">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control" placeholder="Password">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control form-group-sm">
                                    @foreach (\App\Enums\UserType::asArray() as $value => $key)
                                        <option value="{{ $key }}" @if (old('status') === $key) selected @endif>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Kontak WA</label>
                                <input type="text" name="contact_wa" class="form-control" placeholder="Kontak WA"
                                    value="{{ old('contact_wa') }}">
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="address" cols="30" rows="5" class="form-control" placeholder="Alamat">{{ old('address') }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
