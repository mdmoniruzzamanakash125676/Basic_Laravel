<x-app-layout>
    <div class="card">
    <x-slot name="header">
   
        <div class="class-body">
        <a href="{{route('students.index')}}" class="btn btn-sm btn-danger" style="float:right;">All Class</a>
            

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('STUDENT DETAILS') }}
            </h2>

            <br>
            <div class="card-body">
                <ul class="list">
                    <li class="list-item">Name:{{$students->name}}</li>
                    <li class="list-item">Class:{{$students->class_id}}</li>
                    <li class="list-item">Roll:{{$students->roll}}</li>
                    <li class="list-item">Phone:{{$students->phone}}</li>
                    <li class="list-item">Email:{{$students->email}}</li>
                </ul>
            </div>
 
    
     
    </x-slot>
    </div>
    

   
</x-app-layout>