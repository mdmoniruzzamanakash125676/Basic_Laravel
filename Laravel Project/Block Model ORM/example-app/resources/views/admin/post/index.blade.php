@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Posts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">All Posts</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Posts</h3>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Category Name</th>
                                        <th>SubCategory Name</th>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th>Published</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $key => $row)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $row->category->category_name }}</td>
                                            <td>{{ $row->subcategory->subcategory_name }}</td>
                                            <td>{{ $row->user->name }}</td>
                                            <td>{{ $row->title }}</td>
                                            <td>{{ $row->post_date }}</td>
                                            <td>
                                                @if($row->status == 1)
                                                 <span class="badge badge-success">Active</span>
                                                @else
                                                 <span class="badge badge-danger">Inactive</span>
                                                @endif 
                                            </td>
                                             <td>
                                                <div class="btn-group" role="group" aria-label="Actions">
                                                    <a href="{{ route('post.edit', $row->id) }}" class="btn btn-sm btn-info me-1">Edit</a>
                                                    <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $row->id }}">Delete</button>
                                                </div>

                                                <form id="delete-form-{{ $row->id }}" action="{{ route('post.destroy', $row->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const postId = this.getAttribute('data-id');
                const form = document.getElementById(`delete-form-${postId}`);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
