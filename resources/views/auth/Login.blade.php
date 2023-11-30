@extends('layouts.master')
@section('content')
<section class="login">
        <div class="container">
            <div class="row login-box">
                <div class="col-sm-6 col-md-6 col-xs-12 login-image">
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <div class="form-box text-center">
                        <img class="logo" src="{{asset('assets/images/logo.PNG')}}"> 
                        <h4 class="welcome-text">Welcome Back</h2>
                    
                    @if(session('failed'))
                        <div class="alert alert-danger"> {{ session('failed') }}</div>
					@endif
                        <form action="loggedin" method="post"> @csrf
                        <div class="mb-3 form-inputs">
                            <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
                            <input type="text" name="mobile_number" pattern=".{0}|.{10,10}" value="{{ old('mobile_number') }}" autofocus title="Mobile number must be 10 digit" required minlength="10" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder="Mobile Number" class="form-control @error('mobile_number') is-invalid @enderror" id="exampleFormControlInput1" autocomplete="off">
                            <i class="bi bi-phone-fill"></i>
                        </div>
                        @error('mobile_number') <p class="text-danger">{{ $message }}</p> @enderror
                        <div class="mb-3 form-inputs">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" id="password" pattern=".{0}|.{1,40}" title="Password must need to login" required name="password" placeholder="Password" class="form-control" autocomplete="off">
                            <i class="bi bi-lock-fill"></i>
                            <i style="right: 8px;left: unset;" id="show_password" class="bi bi-eye-fill"></i>
                            <i style="right: 8px;left: unset;" id="hide_password" class="bi bi-eye-slash-fill"></i>
                        </div>
                        <div class="reset">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Remember
                            </label>
                            </div>
                            <div>
                                <p class="reset-text">Reset Password</p>
                            </div>
                        </div>
                        <button class="btn login-btn" type="submit">Login</button></form>
                        <p class="signup-text">Don't have account? <span class="signup-link"> <a href="signup">Sign Up</a></span></p>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection