@extends('student_layout')
@section('content')
<div class="col-12 col-lg-6 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <h2 class="card-title">Update Student Profile</h2>
                          <p class="alert-success"><?php
                          $exception=Session::get('exception');
                             if($exception){
                             echo $exception;
                             Session::put('exception',null);
                                 }
                          ?></p>
                          <form class="forms-sample" method="post" action="{{URL::to('/student_profile_update')}}" >
                            @csrf
 
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Student Phone</label>
                                  <input type="text" class="form-control p-input" name="student_phone" aria-describedby="emailHelp" value="{{($student_description_profile->student_phone)}}">
                                 
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Student Address</label>
                                  <input type="text" class="form-control p-input" name="student_address" aria-describedby="emailHelp" value="{{($student_description_profile->student_address)}}" >
                                 
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Student Password</label>
                                  <input type="text" class="form-control p-input" name="student_password" aria-describedby="emailHelp" value="{{($student_description_profile->student_password)}}" >
                                 
                              </div>
                           
                              <button type="submit" class="btn btn-success">Update</button>
                          </form>
                      </div>
                  </div>
              </div>

@endsection