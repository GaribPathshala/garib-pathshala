@extends('layouts.bootstrap')

@section('title' , 'Login')
@section('content')
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url({{asset('assets/img/login.png')}});"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                    </div>
                                    <form class="user" method="post" action="login">
                                        @csrf
                                        <div class="form-group">
                                            <input class="form-control form-control-user @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}">
                                        </div>
                                        @error('email')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror


                                        <div class="form-group">
                                            <input class="form-control form-control-user @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                        </div>
                                        @error('password')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror


                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><label class="form-check-label custom-control-label" for="remember">Remember Me</label></div>
                                            </div>
                                        </div>
                                        
                                        <button class="btn btn-primary btn-block text-white btn-user" type="submit">Login</button>
                    
                                        <hr>
                                    </form>
                                    <div class="text-center"><a class="small" href="{{ route('password.request')}}">Forgot Password?</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection