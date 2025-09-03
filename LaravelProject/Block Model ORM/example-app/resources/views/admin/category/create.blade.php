@extends('layouts.app')
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Category') }}
        </h2>
    </x-slot>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Category</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <!-- Category Form Card -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Category</h3>
                                <a href="{{ route('category.index') }}" class="btn btn-danger btn-sm float-right">
                                    All Categories
                                </a>
                            </div>
                            
                            <!-- Display Success Message -->
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <!-- Category Form Start -->
                            <form action="{{ route('category.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="category_name">Category Name</label>
                                        <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" value="{{ old('category_name') }}" placeholder="Enter Category Name">
                                        @error('category_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            <!-- Category Form End -->

                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
