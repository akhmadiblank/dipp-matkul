@extends('login.layout')
@section('title')
    HALAMAN LOGIN
@endsection
@section('content')
@push('styles')
     <!-- Animate.css -->
     <link href="{{ URL::asset('vendors/animate.css/animate.min.css') }}" rel="stylesheet">
@endpush
    <div>
      {{-- <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a> --}}

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <img class="rounded-circle mb-5" src="{{ URL::asset('images/logo-ditipp.jpg')}}" alt="" style="width:50%;height:auto;">
            @if (session('success'))
            <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
              <strong>congratulation!</strong> {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (session('loginError'))
            <div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert">
              <strong>warning</strong> {{ session('loginError') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
  
            <form method="post" action="/login">
              @csrf
              <h1>Login Form</h1>
              <div>
                <input type="text" name="name" class="form-control @error('email')is-invalid @enderror" placeholder="Username" required autofocus/>
                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror

            </div>
              <div>
                <input type="password" name="password" class="form-control @error('email')is-invalid @enderror" placeholder="Password" required="" />
                @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
              <div>
                <button class="btn btn-secondary submit" type="submit" style="width: 60%;">Log in</button>
                {{-- <a class="reset_pass" href="#">Lost your password?</a> --}}
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />
                
                {{-- <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div> --}}
              </div>
            </form>
          </section>
        </div>

        {{-- <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div> --}}
      </div>
    </div>
   @endsection