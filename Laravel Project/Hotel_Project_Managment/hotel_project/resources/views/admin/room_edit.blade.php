<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
   @include('admin.css')
  </head>
  <body>
         <!-- Tasks-->
            
         @include('admin.header')
         <!-- Tasks end-->
            
        <!-- Sidebar Navidation Menus-->
         @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <!-- body section -->
    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
          <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Update Room</h4>
                </div>
                @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
              
                <div class="card-body">
                    <form action="{{url('update_room',$data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Room Title -->
                        <div class="mb-3">
                            <label class="form-label">Room Title</label>
                            <input type="text" name="room_title" class="form-control" value="{{$data->room_title}}">
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="4" >{{$data->description}}</textarea>
                        </div>

                        <!-- Price -->
                        <div class="mb-3">
                            <label class="form-label">Price (৳)</label>
                            <input type="number" name="price" class="form-control" value="{{$data->price}}">
                        </div>

                        <!-- Room Type -->
                        <div class="mb-3">
                            <label class="form-label">Room Type</label>
                            <select name="room_type" class="form-select" required>
                                <option selected value="{{$data->room_type}}">{{$data->room_type}}</option>
                                <option value="Single">Single</option>
                                <option value="Double">Double</option>
                                <option value="Deluxe">Deluxe</option>
                                <option value="Suite">Suite</option>
                            </select>
                        </div>

                        <!-- Free Wi-Fi -->
                        <div class="mb-3">
                            <label class="form-label">Free Wi-Fi</label>
                            <option selected value="{{$data->wifi}}">{{$data->wifi}}</option>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="wifi" value="Yes" checked>
                                <label class="form-check-label">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="wifi" value="No">
                                <label class="form-check-label">No</label>
                            </div>
                        </div>

                        <!-- Upload Image -->
                        <div class="mb-3">
                            <label class="form-label">Current Image</label>
                            <img src="/room/{{$data->image}}" alt="" width="100">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Upload Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*" >
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">Update Room</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

          </div>
        </div>
    </div>
        <!-- body section end-->

        @include('admin.footer')
  </body>
</html>
