@extends('auth.auth-layout')

@section('content')
    <form class="pt-3" action="{{ route('login.post') }}" method="POST">
        @csrf

        <div class="form-group">
            <input type="email" name="email" class="form-control form-control-lg" placeholder="Email"
                value="{{ old('email') }}">
            @error('email') <span class="text-danger text-small">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Login</button>
        </div>

        <div class="my-2 d-flex justify-content-between align-items-center">
            <div class="form-check">
                <label class="form-check-label text-muted">
                    <input type="checkbox" name="remember" class="form-check-input">
                    Keep me signed in
                </label>
            </div>
        </div>
    </form>
@endsection
