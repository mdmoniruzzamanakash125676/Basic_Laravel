<div  class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Room</h2>
                     <p>Lorem Ipsum available, but the majority have suffered </p>
                  </div>
               </div>
            </div>
            <div class="row">
            @foreach($room as $rooms)
               <div class="col-md-4 col-sm-6 ">
                  <div id="serv_hover"  class="room ">
                     <div class="room_img">
                        <figure><img src="room/{{$rooms->image}}" style="height: 180px;width: 370px;" alt="#"/></figure>
                     </div>
                     <div class="bed_room" style="height: 220px;width: 370px;">
                        <h3>{{$rooms->room_title}}</h3>
                        <p>{!!Str::limit($rooms->description,100)!!}</p>
                     </div>
                  </div>
               </div>
            @endforeach   
               
            </div>
         </div>
      </div>