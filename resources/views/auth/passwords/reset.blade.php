@extends('layouts.bootstrap')

@section('title', 'New Password')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url({{ asset('assets/img/change-password.png')}});"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Change Password</h4>


                                    </div>
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif


                                    <form class="user" method="post" action="{{ route('password.update') }}">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">
                                        
                                        <div class="form-group"><input class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="Registered Email Address" autocomplete="email" readonly></div>
                                        @error('email')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                        <div class="form-group"><input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="New Password"></div>


                                        <div class="form-group"><input id="password-confirm" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password_confirmation" autocomplete="new-password" placeholder="Confirm New Password"> </div>
                                        @error('password')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
 
                                        <div class="form-group">
                                        </div><button class="btn btn-primary btn-block text-white btn-user" type="submit">Change Password</button>
                    
                                        <hr>
                                    </form>
                                    <div class="text-center"><a class="small" href="{{ route('login') }}">Login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection