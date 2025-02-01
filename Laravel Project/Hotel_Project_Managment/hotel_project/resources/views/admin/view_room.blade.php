<!DOCTYPE html>
<html>
  <head> 
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
    <h2 class="text-center my-4">Room Details</h2>
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<table class="table table-striped table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Room Title</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Wi-Fi</th>
            <th scope="col">Room Type</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $room)
            <tr>
                <td>{{ $room->room_title }}</td>
                <td>{{ $room->description }}</td>
                <td>${{ number_format($room->price, 2) }}</td>
                <td>{{ $room->wifi ? 'Available' : 'Not Available' }}</td>
                <td>{{ $room->room_type }}</td>
                <td>
                    <img src="{{ asset('room/'.$room->image) }}" alt="Room Image" class="img-thumbnail" width="100">
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ url('room_edit', $room->id) }}" class="btn btn-warning btn-sm" style="margin-right: 8px;">Edit</a>
                        <a onclick="return confirm('Are you sure to Delete this?');" href="{{ url('room_delete', $room->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



</div>




            </div>
        </div>
    </div>
        <!-- body section end-->

        @include('admin.footer')
  </body>
</html>
