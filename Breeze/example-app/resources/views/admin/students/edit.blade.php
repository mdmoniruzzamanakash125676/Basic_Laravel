<x-app-layout>
    <div class="card">
    <x-slot name="header">
   
        <div class="class-body">
        <a href="{{route('students.index')}}" class="btn btn-sm btn-danger" style="float:right;">All Class</a>
            

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('UPDATE STUDENT') }}
            </h2>
            <br>
<div class="card">
<div class="d-flex justify-content-center">
    @if(session()->has('success'))
        <strong class="text-success text-center">{{ session()->get('success') }}</strong>
    @endif
</div>
<div class="container d-flex min-vh-100  justify-content-center">
  <div class="card p-4" style="max-width: 650px; width: 100%; height: 550px">
    <form action="{{route('students.update',$students->id)}}" method="post">
        @csrf
        @method('patch')
 
        <div class="form-group">
        <label for="name">Class Name</label>
        <select class="form-control" name="class_id">

            @foreach($classes as $row)
                <option value="{{$row->id}}" @if($row->id == $students->class_id) selected @endif >{{$row->class_name}}</option>
            @endforeach

        </select>
        
      </div>


      <div class="form-group">
        <label for="name">Student Name <span class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control" value="{{$students->name}}" required>
      </div>

      <div class="form-group">
        <label for="roll">Student Roll <span class="text-danger">*</span></label>
        <input type="text" name="roll" class="form-control" value="{{$students->roll}}" required>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Student Email</label>
        <input type="text" name="email" class="form-control" value="{{$students->email}}" required>
      </div>
      <div class="form-group">
        <label for="phone">Student Phone <span class="text-danger">*</span></label>
        <input type="text" name="phone" class="form-control" value="{{$students->phone}}" required>

      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
       
</div>
    
        </div>
    </x-slot>
    </div>
    

   
</x-app-layout>