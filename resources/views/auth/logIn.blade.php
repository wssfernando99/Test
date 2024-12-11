@extends('layouts.mainLayout')

@section('content')

    <div class="container-fluid">
      <div class="row" style="height: 100vh">
              
              <div class="col-md-4 d-flex align-items-center justify-content-center ">
                <div class="container-fluid">
                <div class="row">
                    @if (session()->has('message'))
                    <div class="col-md-12">
                          <div class="alert alert-success alert-dismissible" role="alert">
                            <h6 class="alert-heading d-flex align-items-center mb-1">Completed:</h6>
                            <p class="mb-0">{{ session()->get('message') }}</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                          </div>
                    </div>
                    @endif
                    @if (session()->has('error'))
                    <div class="col-md-12">
                          <div class="alert alert-danger alert-dismissible" role="alert">
                            <h6 class="alert-heading d-flex align-items-center mb-1">Error:</h6>
                            <p class="mb-0">{{ session()->get('error') }}</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                          </div>
                    </div>
                    @endif
                <div class="col-md-12">
                    <form action="{{ url('/userLogin') }}" class="needs-validation" method="post" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <div class="mb-3 ">
                          <span class="h1 fw-bold mb-0 text-warning"><i>Testing</i></span>
                        </div>
                        <hr>
      
                        <h5 class="fw-normal mb-3 pb-3">Sign into your account</h5>
      
                        <div class="mb-4">
                          <input type="email" id="email" name="email" class="form-control form-control-lg" required placeholder="Enter your email"  value="{{ old('email') }}" autofocus/>
                          <label class="form-label" for="form2Example17">Email address<span class="text-danger fs-4"> *</span></label>
                        </div>
      
                        <div class="mb-4">
                          <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="******"  required/>
                          <label class="form-label" for="form2Example27">Password<span class="text-danger fs-4"> *</span></label>
                        </div>
      
                        <div class="pt-1 mb-4">
                          <button  class="btn btn-warning btn-lg btn-block" type="submit">Login</button>
                        </div>
      
                        <a class="small text-muted" href="#!">Forgot password?</a>
                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="{{ url('/register') }}"
                            style="color: #393f81;">Register here</a></p>
                        <a href="#!" class="small text-muted">Terms of use.</a>
                        <a href="#!" class="small text-muted">Privacy policy</a>
                      </form>
                </div>
                </div>
                </div>
                
  
                 
              </div>
      </div>
    </div>
@endsection