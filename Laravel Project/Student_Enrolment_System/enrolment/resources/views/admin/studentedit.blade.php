@extends('layout')
@section('content')
<div class="col-12 col-lg-6 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <h2 class="card-title">Update Student</h2>
                          <form class="forms-sample" method="post" action="{{URL::to('/student_update',$student_description_profile->student_id)}}" >
                            @csrf

                          <div class="form-group">
                                  <label for="exampleInputEmail1">Student Name</label>
                                  <input type="text" class="form-control p-input" name="student_name" aria-describedby="emailHelp" value="{{($student_description_profile->student_name)}}">
                           </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Student Roll</label>
                                  <input type="text" class="form-control p-input" name="student_roll" aria-describedby="emailHelp" value="{{($student_description_profile->student_roll)}}">
                                 
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Student Father's Name</label>
                                  <input type="text" class="form-control p-input" name="student_fathersname" aria-describedby="emailHelp" value="{{($student_description_profile->student_fathersname)}}">
                                 
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Student Mother's Name</label>
                                  <input type="text" class="form-control p-input" name="student_mothersname" aria-describedby="emailHelp" value="{{($student_description_profile->student_mothersname)}}">
                                 
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Student Email</label>
                                  <input type="email" class="form-control p-input" name="student_email" aria-describedby="emailHelp" value="{{($student_description_profile->student_email)}}">
                                 
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Student Phone</label>
                                  <input type="text" class="form-control p-input" name="student_phone" aria-describedby="emailHelp" value="{{($student_description_profile->student_phone)}}">
                                 
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Student Adress</label>
                                  <input type="text" class="form-control p-input" name="student_address" aria-describedby="emailHelp" value="{{($student_description_profile->student_address)}}">
                                 
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Password</label>
                                  <input type="password" class="form-control p-input" name="student_password" value="{{($student_description_profile->student_password)}}">
                              </div>
                           
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Admission Year</label>
                                  <input type="date" class="form-control p-input" name="student_admissionyear" value="{{($student_description_profile->student_admissionyear)}}">
                              </div>

                              <button type="submit" class="btn btn-success">Update</button>
                          </form>
                      </div>
                  </div>
              </div>

@endsection