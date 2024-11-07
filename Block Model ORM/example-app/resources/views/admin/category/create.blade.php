<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <h3 class="text-lg font-bold">Category List</h3>
                        <a href="{{ route('category.index') }}" class="btn btn-danger btn-sm" style="float: right;">
                           All Category
                        </a>
                    </div>
                    
                    <div class="card border-0 shadow">
                    @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close t" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
                        <div class="card-body p-0">
                        <form action="{{route('category.store')}}" method="Post">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" aria-describedby="emailHelp" value="{{old('category_name')}}" placeholder="Enter Category Name" >
                           
                        </div>
                        @error('category_name')
                         <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                       
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>   


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
