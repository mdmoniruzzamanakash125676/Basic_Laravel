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
                        <a href="{{route('category.delete',$row->id)}}" class="btn btn-sm btn-danger">Delete</a>
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