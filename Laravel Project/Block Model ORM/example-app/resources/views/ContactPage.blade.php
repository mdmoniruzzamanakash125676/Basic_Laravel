
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

  <h1>This is a Contact Page....</h1> <br><br>


    <div class="row ">
        <div class="col-lg-3"></div>
        <div class="card col-lg-6 ml-4">

   
            <div class="card-body">

 <form action="{{route('store.contact')}}" method="post">
  @csrf
  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Full Name</label>
    <input type="text" class="form-control  @error('title') is-invalid @enderror"  name="name" value="{{ old('name') }}">
    @error('name')
    <strong class="text-danger">{{ $message }}</strong>
    @enderror 
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email Name</label>
    <input type="email" class="form-control  @error('title') is-invalid @enderror"   name="email" value="{{ old('email') }}">
    @error('email')
    <strong class="text-danger">{{ $message }}</strong>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control  @error('title') is-invalid @enderror"  name="password" value="{{ old('password') }}">
    @error('password')
    <strong class="text-danger">{{ $message }}</strong>
@enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

            </div>
       

        </div>
    </div>
    


  

   










<a href="{{url('/home')}}">Home</a> <br>
<a href="{{url('/about')}}">About</a><br>
<a href="{{url('/contact')}}">Contact</a><br>
  </body>
</html>

