@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} {{Auth::user()->name}} <br>
                    <a href="{{route('user.details',Crypt::encryptString('1'))}}" class="btn btn-sm btn-info">{{Auth::user()->name}} Details</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
