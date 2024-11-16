@extends('layouts.app') 
@section('content')

<!-- Content Wrapper -->
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="content-wrapper" style="width: 100%; max-width: 800px;">
        <!-- Content Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-center">Add New Post</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Add Post</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <!-- Form Column -->
                    <div class="col-12">
                        <!-- Form Card -->
                        <div class="card card-primary shadow-lg">
                            <div class="card-header text-center">
                                <h3 class="card-title">Create New Post</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- Form Start -->
                            <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Post Title</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Post Title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Category</label>
                                        <select name="subcategory_id" class="form-control" >
                                            <option disable selected>Choose Category</option>
                                            @foreach($category as $cat)
                                             @php
                                                $subcategories=DB::table('subcategories')->where('category_id',$cat->id)->get();
                                             @endphp
                                                <option disable class="text-info">{{$cat->category_name}}</option>
                                                @foreach($subcategories as $sub)
                                                <option value="{{$sub->id}}">---{{$sub->subcategory_name}}</option>
                                                @endforeach
                                            @endforeach
                                        </select>   
                                    </div>
                                    
                                    <!-- <div class="form-group">
                                        <label for="subcategory_id">SubCategory</label>
                                        <select name="subcategory_id" class="form-control" id="subcategory_id">
                                            <option value="">Select SubCategory</option>
                                            <option value="1">Example One</option>
                                            <option value="2">Example Two</option>
                                        </select>
                                    </div> -->
                                    <div class="form-group">
                                        <label for="post_date">Post Date</label>
                                        <input type="date" name="post_date" class="form-control" id="post_date" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tags">Tags</label>
                                        <input type="text" name="tags" class="form-control" id="tags" placeholder="Enter Tags (comma separated)">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" id="description" rows="4" placeholder="Write your description here..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="file">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="file" class="custom-file-input" id="file">
                                                <label class="custom-file-label" for="file">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="status" name="status" value="1">
                                        <label class="form-check-label" for="status">Publish Now</label>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">Submit</button>
                                </div>
                            </form>
                            <!-- /.form -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- /.d-flex -->

@endsection
