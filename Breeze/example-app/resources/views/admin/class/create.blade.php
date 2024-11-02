<x-app-layout>
    <div class="card">
    <x-slot name="header">
   
        <div class="class-body">
        <a href="{{route('class.index')}}" class="btn btn-sm btn-danger" style="float:right;">All Class</a>
            

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('ADD NEW CLASS') }}
            </h2>
            <br>
<div class="card">
<div class="d-flex justify-content-center">
    @if(session()->has('success'))
        <strong class="text-success text-center">{{ session()->get('success') }}</strong>
    @endif
</div>
<div class="container d-flex min-vh-100  justify-content-center">
  <div class="card p-4" style="max-width: 650px; width: 100%; height: 190px">
    <form action="{{route('store.class')}}" method="post">
        @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">Class Name</label>
        <input type="text" class="form-control @error('class_name') is-invalid @enderror" name="class_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Class Name">

        @error('class_name')
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