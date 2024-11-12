@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit SubCategory</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('subcategory.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit SubCategory</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-primary shadow-lg">
                        <div class="card-header">
                            <h3 class="card-title">Edit SubCategory</h3>
                        </div>

                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('subcategory.update', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="category_id">Choose Category</label>
                                    <select name="category_id" class="form-control" required>
                                        <option value="" disabled>Select Category</option>
                                        @foreach($categories as $row)
                                            <option value="{{ $row->id }}" @if($row->id == $data->category_id) selected @endif>{{ $row->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="subcategory_name">SubCategory Name</label>
                                    <input type="text" name="subcategory_name" class="form-control @error('subcategory_name') is-invalid @enderror" placeholder="SubCategory Name" value="{{ $data->subcategory_name }}" required>
                                    @error('subcategory_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
