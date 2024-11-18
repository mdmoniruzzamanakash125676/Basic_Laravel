@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="content-wrapper" style="width: 100%; max-width: 800px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Post</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Post</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card card-primary shadow-lg">
                            <div class="card-header text-center">
                                <h3 class="card-title">Edit Post</h3>
                            </div>

                            <form action="{{route('post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Post Title</label>
                                        <input type="text" name="title" class="form-control"  value="{{ old('title', $post->title) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="subcategory_id">Category</label>
                                        <select name="subcategory_id" class="form-control" required>
                                            <option disabled selected>Choose Category</option>

                                            @foreach($category as $cat)
                                                @php
                                                    $subcategory=DB::table('subcategories')->where('category_id',$cat->id)->get();
                                                @endphp

                                                <option disabled class="text-info">{{ $cat->category_name }}</option>
                                                @foreach($subcategory as $sub)
                                                    <option value="{{ $sub->id }}" @if($sub->id == $post->subcategory_id) selected @endif>
                                                        --- {{ $sub->subcategory_name }}
                                                    </option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="post_date">Post Date</label>
                                        <input type="date" name="post_date" class="form-control" id="post_date" value="{{ old('post_date', $post->post_date) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tags">Tags</label>
                                        <input type="text" name="tags" class="form-control" id="tags" value="{{ old('tags', $post->tags) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" id="description" rows="4" required>{{ old('description', $post->description) }}</textarea>
                                    </div>
                                    <input type="hidden" name="old_image" value="{{ $post->image }}">
                                    <div class="form-group">
                                        <label for="file">Image</label>
                                        <input type="file" name="image" class="form-control-file" id="file">
                                        @if($post->image)
                                            <img src="{{ asset($post->image) }}" alt="Post Image" class="mt-2" style="max-height: 150px;">
                                        @endif
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="status" name="status" value="1" @if($post->status == 1) checked @endif>
                                        <label class="form-check-label" for="status">Publish Now</label>
                                    </div>
                                </div>

                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection
