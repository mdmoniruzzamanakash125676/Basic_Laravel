<x-app-layout>
    <div class="card">
    <x-slot name="header">
   
        <div class="class-body">
        <a href="{{route('students.index')}}" class="btn btn-sm btn-danger" style="float:right;">All Class</a>
            

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('ADD NEW STUDENT') }}
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
    <form action="{{route('students.store')}}" method="post">
        @csrf
 
        <div class="form-group">
        <label for="name">Class Name</label>
        <select class="form-control" name="class_id">

            @foreach($classes as $row)
                <option value="{{$row->id}}">{{$row->class_name}}</option>
            @endforeach

        </select>
        
      </div>


      <div class="form-group">
        <label for="name">Student Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="name" placeholder="Name">

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror

      </div>
      <div class="form-group">
        <label for="roll">Student Roll <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('roll') is-invalid @enderror" name="roll" id="roll" aria-describedby="roll" placeholder="Enter your Roll" required>

        @error('roll')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Student Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" required>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="phone">Student Phone <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" aria-describedby="phone" placeholder="Phone Number" required>

        @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
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