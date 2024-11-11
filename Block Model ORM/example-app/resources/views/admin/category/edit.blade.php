@extends('layouts.guest')
@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Card with Heading and Form -->
        <div class="card shadow-lg rounded-lg border-0">
            <!-- Header Section -->
            <div class="card-header bg-primary text-white text-center p-4">
                <h2 class="font-semibold text-xl mb-0" style="font-size: 2rem; font-weight: 700;">
                    Update Category
                </h2>
            </div>

            <!-- Body Section -->
            <div class="card-body p-6 text-gray-900">

                <!-- All Category Button Above Form -->
                <div class="d-flex justify-content-end mb-4">
                    <a href="{{ route('category.index') }}" class="btn btn-secondary btn-sm" style="padding: 0.5rem 1rem; font-size: 1rem;">
                        All Categories
                    </a>
                </div>

                <!-- Form Section -->
                <form action="{{ route('category.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- This ensures the form is treated as a PUT request -->

                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Category Name Input -->
                    <div class="form-group mb-4">
                        <label for="category_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control form-control-lg" id="category_name" name="category_name" value="{{ $data->category_name }}" required>
                    </div>

                    <!-- Update Button -->
                    <div class="form-group text-center mb-4">
                        <button type="submit" class="btn btn-primary btn-lg" style="padding: 0.8rem 2rem; border-radius: 8px; font-size: 1rem;">
                            Update Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
