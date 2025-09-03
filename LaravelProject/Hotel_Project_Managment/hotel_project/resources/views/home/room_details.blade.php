<!DOCTYPE html>
<html lang="en">
    <base href="/public">
   <head>
      @include('home.css')
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         @include('home.header')
      </header>

      
             
         
      
      <div class="container my-5">
    <div class="row justify-content-center">
        <!-- Left Side: Room Details -->
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <!-- Room Image -->
                <div class="position-relative">
                    <img src="{{ asset('room/'.$room->image) }}" class="card-img-top img-fluid room-img" alt="Room Image">
                </div>
                <!-- Room Details -->
                <div class="card-body">
                    <h2 class="card-title text-center text-primary">{{ $room->room_title }}</h2>
                    <p class="card-text text-muted">
                        <i class="fas fa-info-circle"></i> {{ $room->description }}
                    </p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fas fa-wifi"></i> <strong>Free WiFi:</strong> {{ $room->wifi }}</li>
                        <li class="list-group-item"><i class="fas fa-bed"></i> <strong>Room Type:</strong> {{ $room->room_type }}</li>
                        <li class="list-group-item"><i class="fas fa-dollar-sign"></i> <strong>Price:</strong> ৳{{ number_format($room->price, 2) }}</li>
                    </ul>
                </div>
                <!-- Back Button -->
                <div class="card-footer text-center">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>

        <!-- Right Side: Room Booking Form -->
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Book Your Room</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('book_room') }}" method="POST">
                        @csrf
                        
                        <!-- Guest Name -->
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>

                        <!-- Check-in Date -->
                        <div class="mb-3">
                            <label class="form-label">Check-in Date</label>
                            <input type="date" name="checkin_date" class="form-control" required>
                        </div>

                        <!-- Check-out Date -->
                        <div class="mb-3">
                            <label class="form-label">Check-out Date</label>
                            <input type="date" name="checkout_date" class="form-control" required>
                        </div>

                        <!-- Number of Guests -->
                        <div class="mb-3">
                            <label class="form-label">Number of Guests</label>
                            <input type="number" name="guests" class="form-control" min="1" required>
                        </div>

                        <!-- Special Requests -->
                        <div class="mb-3">
                            <label class="form-label">Special Requests (Optional)</label>
                            <textarea name="special_requests" class="form-control" rows="3"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">Confirm Booking</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- End Right Side -->
    </div> <!-- End Row -->
</div> <!-- End Container -->
<style>
.room-img {
    transition: transform 0.3s ease-in-out;
    border-radius: 10px;
}
.room-img:hover {
    transform: scale(1.05);
}

.card {
    border-radius: 10px;
}

.card-header {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}
</style>
<!-- FontAwesome Icons (CDN) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">



              


      
      <!--  footer -->
      @include('home.footer')
   </body>
</html>