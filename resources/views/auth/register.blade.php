@extends('auth.auth-layout')

@section('content')
    <form action="{{ route('register.post') }}" method="POST">
        @csrf

        <div class="form-group">
            <input type="text" name="fullname" class="form-control form-control-lg" placeholder="Full name"
                value="{{ old('fullname') }}">
            @error('fullname') <span class="text-danger text-small">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <input type="email" name="email" class="form-control form-control-lg" placeholder="Email"
                value="{{ old('email') }}">
            @error('email') <span class="text-danger text-small">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
            @error('password') <span class="text-danger text-small">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <input type="password" name="confirmPassword" class="form-control form-control-lg" placeholder="Confirm Password">
            @error('confirmPassword') <span class="text-danger text-small">{{ $message }}</span> @enderror
        </div>

        <div class="mt-3">
            <button type="submit"
                class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Register</button>
        </div>

        <div class="mt-4">
            <p>Already have an account ? <a href="{{ route('login') }}">Login</a> </p>
        </div>
    </form>
@endsection
