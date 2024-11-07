<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Category') }}
        </h2>
    </x-slot>

  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <h3 class="text-lg font-bold">Category List</h3>
                        <a href="{{ route('category.create') }}" class="btn btn-danger btn-sm" style="float: right;">
                            Add Category
                        </a>
                    </div>
                   
                    <div class="card border-0 shadow">
                        <div class="card-body p-0">
                            <table class="table table-hover table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="width: 5%;">SL.</th>  
                                        <th style="width: 35%;">Name</th>  
                                        <th style="width: 35%;">Slug</th>  
                                        <th style="width: 25%;">Action</th>  
                                    </tr>

                                    @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close t" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
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
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
