<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Class') }}
        </h2>
        <div class="class-body">
            <a href="{{route('create.class')}}" class="btn btn-sm btn-primary" style="float:right;">Add New</a>
            <table class="table table-responsive table-strioe">
                <thead>
                    <tr>
                        <td>SL</td>
                        <td>Class Name</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($class as $key=>$row)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$row->class_name}}</td>
                        <td>
                            <a href="" class="btn btn-sm btn-info">Edit</a>
                            <a href="" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>

   
</x-app-layout>