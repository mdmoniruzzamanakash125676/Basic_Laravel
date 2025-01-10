@extends('layouts.guest')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-lg" style="width: 100%; max-width: 500px; border-radius: 15px;">
        
        <!-- Card Header with Gradient Background -->
        <div class="card-header text-center text-white" style="border-top-left-radius: 15px; border-top-right-radius: 15px; background: linear-gradient(to right, #6a11cb, #2575fc);">
            <h5 class="mb-0 font-weight-bold">Email Verification</h5>
        </div>
        
        <!-- Card Body -->
        <div class="card-body p-4">
            <p class="text-muted text-center mb-4">
                {{ __('Thanks for signing up! Please verify your email address by clicking on the link we just emailed to you. Didn\'t receive the email? We will gladly send you another.') }}
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success text-center">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="d-flex justify-content-between mt-4">
                <!-- Resend Verification Email Form -->
                <form method="POST" action="{{ route('verification.send') }}" class="w-100 me-2">
                    @csrf
                    <button type="submit" class="btn btn-primary w-100" style="border-radius: 10px;">
                        {{ __('Resend Verification Email') }}
                    </button>
                </form>

                <!-- Logout Form -->
                <form method="POST" action="{{ route('logout') }}" class="w-100">
                    @csrf
                    <button type="submit" class="btn btn-outline-secondary w-100" style="border-radius: 10px;">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
