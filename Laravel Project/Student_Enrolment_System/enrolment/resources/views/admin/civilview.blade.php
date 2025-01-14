@extends('layout')
@php
    function convert_department($value){
        $values=[
            1=>'CSE',
            2=>'ME',
            3=>'EEE',
            4=>'Civil',
            5=>'Food',
            6=>'MME',

            ];
            return $values[$value];
    }
@endphp
@section('content')
<div class="row d-flex justify-content-center ">
    <div class="col-lg-8">
        <!-- Single Card for Complete Profile -->
        <div class="card shadow-lg" style="height: auto; width: 800px;"> <!-- Adjusted height and width -->
            <div class="card-body p-5"> <!-- Increased padding -->
                <!-- Profile Header -->
                <div class="text-center">
                    <h2 class="card-title text-primary font-weight-bold mb-4">Student Profile</h2>
                    <img src="{{URL::to($student_description_profile->student_image)}}" class="rounded-circle my-3" alt="Profile Picture" style="width: 200px; height: 200px; object-fit: cover;"> <!-- Enlarged image -->
                    <p class="name h4 font-weight-bold mb-1">{{ $student_description_profile->student_name }}</p>
                    <p class="designation text-muted mb-3 h5">Roll: {{ $student_description_profile->student_roll }}</p>
                    <a class="email d-block text-dark mb-3 h5" href="mailto:{{ $student_description_profile->student_email }}">
                        <i class="fa fa-envelope text-primary mr-2"></i>{{ $student_description_profile->student_email }}
                    </a>
                    <a class="number d-block text-dark h5" href="tel:+88{{ $student_description_profile->student_phone }}">
                        <i class="fa fa-phone text-success mr-2"></i>+88{{ $student_description_profile->student_phone }}
                    </a>
                </div>

                <!-- Information Section -->
                <div class="info-links mt-5">
                    <h4 class="text-primary font-weight-bold mb-4 text-center">Student Details</h4>
                    <ul class="list-unstyled">
                        <li class="d-flex justify-content-between mb-3">
                            <span class="text-dark font-weight-bold">Father's Name:</span>
                            <span class="text-muted">{{ $student_description_profile->student_fathersname }}</span>
                        </li>
                        <li class="d-flex justify-content-between mb-3">
                            <span class="text-dark font-weight-bold">Mother's Name:</span>
                            <span class="text-muted">{{ $student_description_profile->student_mothersname }}</span>
                        </li>
                        <li class="d-flex justify-content-between mb-3">
                            <span class="text-dark font-weight-bold">Student Address:</span>
                            <span class="text-muted">{{ $student_description_profile->student_address }}</span>
                        </li>
                        <li class="d-flex justify-content-between mb-3">
                            <span class="text-dark font-weight-bold">Department:</span>
                            <span class="text-muted">{{convert_department($student_description_profile->student_department)}}</span>
                        </li>
                        <li class="d-flex justify-content-between mb-3">
                            <span class="text-dark font-weight-bold">Admission Year:</span>
                            <span class="text-muted">{{ $student_description_profile->student_admissionyear }}</span>
                        </li>
                    </ul>
                </div>

                <!-- Achievements Section -->
                <div class="mt-5">
                    <h4 class="text-primary font-weight-bold mb-4 text-center">Achievements</h4>
                    <ul class="achievements d-flex justify-content-around text-center list-unstyled">
                        <li>
                            <p class="h3 font-weight-bold text-success mb-0">34</p>
                            <p class="text-muted">Projects</p>
                        </li>
                        <li>
                            <p class="h3 font-weight-bold text-warning mb-0">23</p>
                            <p class="text-muted">Tasks</p>
                        </li>
                        <li>
                            <p class="h3 font-weight-bold text-info mb-0">29</p>
                            <p class="text-muted">Completed</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
