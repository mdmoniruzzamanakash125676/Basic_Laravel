@extends('layouts.guest')
@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-lg" style="width: 100%; max-width: 500px; border-radius: 15px;">
        
        <!-- Card Header with Gradient Background -->
        <div class="card-header text-center text-white" style="border-top-left-radius: 15px; border-top-right-radius: 15px; background: linear-gradient(to right, #6a11cb, #2575fc);">
            <h5 class="mb-0 font-weight-bold">Forgot Your Password?</h5>
        </div>
        
        <!-- Card Body -->
        <div class="card-body p-4">
            <p class="text-muted text-center mb-4">
                {{ __('No problem! Just enter your email address, and we’ll send you a link to reset your password.') }}
            </p>

            <!-- Session Status -->
            @if(session('status'))
                <div class="alert alert-success text-center">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Forgot Password Form -->
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address Input -->
                <div class="form-group mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg w-100" style="border-radius: 10px; background-color: #2575fc;">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
        
        <!-- Card Footer -->
        <div class="card-footer text-center text-muted" style="border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
            <small>Need further help? <a href="{{ url('/') }}" class="text-decoration-none">Contact Support</a></small>
        </div>
    </div>
</div>
@endsection
