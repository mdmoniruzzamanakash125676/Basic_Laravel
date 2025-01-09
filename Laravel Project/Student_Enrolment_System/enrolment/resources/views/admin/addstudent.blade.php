@extends('layout')
@section('content')
<div class="col-12 col-lg-6 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <h2 class="card-title">Add Student</h2>
                          <p class="alert-success"><?php
                          $exception=Session::get('exception');
                             if($exception){
                             echo $exception;
                             Session::put('exception',null);
                                 }
                          ?></p>

                          <form class="forms-sample" method="post" action="{{URL::to('/savestudent')}}" enctype='multipart/form-data'>
                            @csrf

                          <div class="form-group">
                                  <label for="exampleInputEmail1">Student Name</label>
                                  <input type="text" class="form-control p-input" name="student_name" aria-describedby="emailHelp" placeholder="Enter Your Name">
                           </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Student Roll</label>
                                  <input type="text" class="form-control p-input" name="student_roll" aria-describedby="emailHelp" placeholder="Enter Your Roll">
                                 
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Student Father's Name</label>
                                  <input type="text" class="form-control p-input" name="student_fathersname" aria-describedby="emailHelp" placeholder="Enter Your Father's Name">
                                 
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Student Mother's Name</label>
                                  <input type="text" class="form-control p-input" name="student_mothersname" aria-describedby="emailHelp" placeholder="Enter Your Mother's Name">
                                 
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Student Email</label>
                                  <input type="email" class="form-control p-input" name="student_email" aria-describedby="emailHelp" placeholder="Enter Your Email">
                                 
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Student Phone</label>
                                  <input type="text" class="form-control p-input" name="student_phone" aria-describedby="emailHelp" placeholder="Enter Your Phone Number">
                                 
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Student Adress</label>
                                  <input type="text" class="form-control p-input" name="student_address" aria-describedby="emailHelp" placeholder="Enter Your Address">
                                 
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Password</label>
                                  <input type="password" class="form-control p-input" name="student_password" placeholder="Password">
                              </div>
                           
                              <div class="form-group">
    <label>Upload file</label>
    <div class="row">
        <div class="col-12">
            <label for="student_image" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-upload btn-label btn-label-left"></i>Browse</label>
            <input type="file" class="form-control-file" id="student_image" name="student_image" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Please upload your image file.</small>
        </div>
    </div>
</div>


                              <div class="form-group">
                                  <label for="exampleInputEmail1">Student Department</label>
                                  <select class="form-control p-input" name="student_department" id="">
                                    <option value="1">CSE</option>
                                    <option value="2">ME</option>
                                    <option value="3">EEE</option>
                                    <option value="4">Civil</option>
                                    <option value="5">Food</option>
                                    <option value="6">MME</option>
                                  </select>
                                 
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Admission Year</label>
                                  <input type="date" class="form-control p-input" name="student_admissionyear" placeholder="Enter your Admission Year">
                              </div>

                              <button type="submit" class="btn btn-success">Submit</button>
                          </form>
                      </div>
                  </div>
              </div>

@endsection