<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Students') }}
        </h2>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close t" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        <div class="class-body">
            <a href="{{route('students.create')}}" class="btn btn-sm btn-primary" style="float:right;">Add Student</a>
            <table class="table table-responsive table-strioe">
                <thead>
                    <tr>
                        <td>SL</td>
                        <td>Roll</td>
                        <td>Name</td>
                        <td>Phone</td>
                        <td>Class Name</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $key=>$row)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$row->roll}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->phone}}</td>
                        <td>{{$row->class_name}}</td>
                <td>
                    <a href="{{route('students.show', $row->id)}}" class="btn btn-sm btn-success d-inline-block">View</a>
                    <a href="{{route('students.edit', $row->id)}}" class="btn btn-sm btn-info d-inline-block">Edit</a>
                    <form action="{{route('students.destroy', $row->id)}}" method="post" class="d-inline-block" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>

   
</x-app-layout>