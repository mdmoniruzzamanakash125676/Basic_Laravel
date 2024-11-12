@extends('layouts.app')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('category.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Category Table</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

     <!-- Success Message -->
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
                <h3 class="card-title">All Categories</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 5%;">SL.</th>  
                    <th style="width: 35%;">Name</th>  
                    <th style="width: 35%;">Slug</th>  
                    <th style="width: 25%;">Action</th>  
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($category as $key => $row)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $row->category_name }}</td>
                        <td>{{ $row->category_slug }}</td>
                        <td>
                        <a href="{{route('category.edit',$row->id)}}" class="btn btn-sm btn-info me-2">Edit</a>
                       <!-- Delete Button -->
                    <a href="javascript:void(0);" class="btn btn-sm btn-danger delete-btn" data-id="{{ $row->id }}">Delete</a>

                    <!-- Delete Form (Hidden) -->
                    <form id="delete-form" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                        </td>
                  </tr>
                   @endforeach
                  </tfoot>
                </table>
              </div>
            </div>
         </div>
      </div>
</section>
@endsection