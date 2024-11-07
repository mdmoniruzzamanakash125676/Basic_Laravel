<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Updated Data') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header text-center bg-primary text-white">
                <h3>Update Class Information</h3>
            </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close t" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="card-body p-4">
                <form action="{{ route('class.update', $data->id) }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="class_name" class="form-label">Class Name</label>
                        <input 
                            type="text" 
                            class="form-control @error('class_name') is-invalid @enderror" 
                            name="class_name" 
                            value="{{ old('class_name', $data->class_name) }}"
                            placeholder="Enter class name"
                        >
                        @error('class_name')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Update Data</button>
                        <a href="{{ route('class.index') }}" class="btn btn-danger">Show All Classes</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
