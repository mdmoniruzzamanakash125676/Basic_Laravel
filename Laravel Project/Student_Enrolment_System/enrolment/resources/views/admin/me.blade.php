
@extends('layout')
@section('content')

         
          <div class="card">
            <div class="card-body">
              <h2 class="card-title">Data table</h2>
              <div class="row">
                <div class="col-12">
                  <table id="order-listing" class="table table-striped" style="width:100%;">
                    <thead>
                      <tr>
                          <th>St_Roll</th>
                          <th>St_Name</th>
                          <th>Phone</th>
                          <th>Image</th>
                          <th>Address</th>
                          <th>Department</th>
                          <th>Action</th>
                          
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($me_student_info as $v_student)
                      <tr>
                          <td>{{$v_student->student_roll}}</td>
                          <td>{{$v_student->student_name}}</td>
                          <td>{{$v_student->student_phone}}</td>
                          <td><img src="{{URL::to($v_student->student_image)}}" alt="" height="70" width="90" style="border-radius:50%;"></td>
                          <td>{{$v_student->student_address}}</td>
                          <td>
                            @if($v_student->student_department==1)
                                <span>{{'CSE'}}</span>
                                @elseif($v_student->student_department==2)
                                <span>{{'ME'}}</span>
                                @elseif($v_student->student_department==3)
                                <span>{{'EEE'}}</span>
                                @elseif($v_student->student_department==4)
                                <span>{{'Civil'}}</span>
                                @elseif($v_student->student_department==5)
                                <span>{{'Food'}}</span>
                                @else($v_student->student_department==6)
                                <span>{{'MME'}}</span>
                            @endif
                              
                          </td>
                          
                          <td>
                            <button class="btn btn-outline-primary">View</button>
                            <button class="btn btn-outline-success">Edit</button>
                            <button class="btn btn-outline-danger">Delete</button>
                          </td>
                      </tr>
                      @endforeach
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        
        <!-- content-wrapper ends -->

@endsection