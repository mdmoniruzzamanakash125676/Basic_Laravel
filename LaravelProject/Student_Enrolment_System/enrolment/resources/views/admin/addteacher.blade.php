@extends('layout')
@section('content')
<div class="col-12 col-lg-6 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <h2 class="card-title">Add Teacher</h2>
                          <p class="alert-success"><?php
                          $exception=Session::get('exception');
                             if($exception){
                             echo $exception;
                             Session::put('exception',null);
                                 }
                          ?></p>

                          <form class="forms-sample" method="post" action="{{URL::to('/saveteacher')}}" enctype='multipart/form-data'>
                            @csrf

                          <div class="form-group">
                                  <label for="exampleInputEmail1">Teacher Name</label>
                                  <input type="text" class="form-control p-input" name="teachers_name" aria-describedby="emailHelp" placeholder="Enter Your Name">
                           </div>

                           <div class="form-group">
                                  <label for="exampleInputEmail1">Teacher Phone</label>
                                  <input type="text" class="form-control p-input" name="teachers_phone" aria-describedby="emailHelp" placeholder="Enter Your Phone Number">
                                 
                              </div>
                              
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Teacher Email</label>
                                  <input type="email" class="form-control p-input" name="teachers_email" aria-describedby="emailHelp" placeholder="Enter Your Email">
                                 
                              </div>
                             
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Teacher Address</label>
                                  <input type="text" class="form-control p-input" name="teachers_address" aria-describedby="emailHelp" placeholder="Enter Your Address">
                                 
                              </div>
                           
                <div class="form-group">
                    <label>Upload file</label>
                        <div class="row">
                            <div class="col-12">
                                <label for="teachers_image" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-upload btn-label btn-label-left"></i>Browse</label>
                                <input type="file" class="form-control-file" id="teachers_image" name="teachers_image" aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">Please upload your image file.</small>
                            </div>
    </div>
</div>


                              <div class="form-group">
                                  <label for="exampleInputEmail1">Teacher Department</label>
                                  <select class="form-control p-input" name="teachers_department" id="">
                                    <option value="1">CSE</option>
                                    <option value="2">ME</option>
                                    <option value="3">EEE</option>
                                    <option value="4">Civil</option>
                                    <option value="5">Food</option>
                                    <option value="6">MME</option>
                                  </select>
                                 
                              </div>
                              <button type="submit" class="btn btn-success">Add Teacher</button>
                          </form>
                      </div>
                  </div>
              </div>

@endsection