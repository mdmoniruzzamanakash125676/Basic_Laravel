@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Update Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- Update Category Card -->
                    <div class="card card-primary shadow-lg">
                        <!-- Card Header -->
                        <div class="card-header">
                            <h3 class="card-title text-white">Update Category</h3>
                            <a href="{{ route('category.index') }}" class="btn btn-secondary btn-sm float-right">
                                All Categories
                            </a>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body">
                            <!-- Success Message -->
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <!-- Form Section -->
                            <form action="{{ route('category.update', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Category Name Input -->
                                <div class="form-group">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name="category_name" value="{{ $data->category_name }}" required>
                                    @error('category_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Update Category
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
