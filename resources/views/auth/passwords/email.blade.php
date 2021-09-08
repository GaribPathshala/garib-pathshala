@extends('layouts.bootstrap')

@section('title', 'Forgot Password')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url({{ asset('assets/img/password-reset.png')}});"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Password Reset</h4>


                                    </div>
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif


                                    <form class="user" method="post" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="form-group"><input class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Registered Email Address" autocomplete="email" autofocus></div>
                                        @error('email')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
 
                                        <div class="form-group">
                                        </div><button class="btn btn-primary btn-block text-white btn-user" type="submit">Send Password Reset Link</button>
                    
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