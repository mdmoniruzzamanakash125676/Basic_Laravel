@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Profile Heading Card -->
            <div class="card shadow-lg mb-3" style="border-radius: 15px; background: #f7f7f7; border: 1px solid #ddd; margin-left: 250px;">
                <div class="card-body text-center">
                    <h2 class="font-semibold text-3xl text-gray-800 leading-tight" style="margin-left: 30px;">
                        {{ __('Your Profile') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Profile Information Form -->
    <div class="row justify-content-center">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow-lg mb-4" style="border-radius: 15px; background: #f7f7f7; border: 1px solid #ddd;">
            <div class="card-header bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 text-center" style="border-top-left-radius: 15px; border-top-right-radius: 15px; color: black;">
    <h5 class="mb-0 font-bold text-xl">Update Profile Information</h5>
</div>

                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="name" class="font-weight-bold text-dark">Name</label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required style="border-radius: 10px;">
                        </div>
                        <div class="form-group mb-4">
                            <label for="email" class="font-weight-bold text-dark">Email</label>
                            <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required style="border-radius: 10px;">
                        </div>
                        <button type="submit" class="btn btn-primary w-100 btn-lg" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 10px;">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Update Password Form -->
        <div class="col-md-6 offset-md-3">
            <div class="card shadow-lg mb-4" style="border-radius: 15px; background: #f7f7f7; border: 1px solid #ddd;">
            <div class="card-header bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 text-center" style="border-top-left-radius: 15px; border-top-right-radius: 15px; color: black;">
    <h5 class="mb-0 font-bold text-xl">Update Password</h5>
</div>

                <div class="card-body">
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="current_password" class="font-weight-bold text-dark">Current Password</label>
                            <input type="password" class="form-control form-control-lg" id="current_password" name="current_password" required style="border-radius: 10px;">
                        </div>
                        <div class="form-group mb-4">
                            <label for="new_password" class="font-weight-bold text-dark">New Password</label>
                            <input type="password" class="form-control form-control-lg" id="new_password" name="new_password" required style="border-radius: 10px;">
                        </div>
                        <div class="form-group mb-4">
                            <label for="new_password_confirmation" class="font-weight-bold text-dark">Confirm New Password</label>
                            <input type="password" class="form-control form-control-lg" id="new_password_confirmation" name="new_password_confirmation" required style="border-radius: 10px;">
                        </div>
                        <button type="submit" class="btn btn-info w-100 btn-lg" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 10px;">Update Password</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete User Form -->
        <div class="col-md-6 offset-md-3">
            <div class="card shadow-lg mb-4" style="border-radius: 15px; background: #f7f7f7; border: 1px solid #ddd;">
            <div class="card-header bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 text-center" style="border-top-left-radius: 15px; border-top-right-radius: 15px; color: black;">
    <h5 class="mb-0 font-bold text-xl">Delete Account</h5>
</div>

                <div class="card-body text-center">
                    <form action="{{ route('profile.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <p class="text-danger font-weight-bold mb-4">Once you delete your account, there is no going back. Please be certain.</p>
                        <button type="submit" class="btn btn-danger w-100 btn-lg" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 10px;">Delete Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
