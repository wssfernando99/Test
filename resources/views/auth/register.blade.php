@extends('layouts.mainLayout')

@section('content')

    <div class="container-fluid">
      <div class="row" style="height: 100vh">
        <div class="col-md-4 d-flex align-items-center">
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
                      <form action="{{ url('/userRegister') }}" class="needs-validation" method="post" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <div class="d-flex align-items-center mb-3 text-center">
                            <span class="h1 fw-bold mb-0 text-warning"><i>testing</i></span>
                          </div>
                          <hr>
        
                          <h5 class="fw-normal mb-3 pb-3">Register Here..</h5>
      
                          <div class="form-outline mb-2">
                              <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="Tony Stark" required/>
                              <label class="form-label" for="form2Example17">Name<span class="text-danger fs-4"> *</span></label>
                              <div class="invalid-feedback">Please enter name.</div>
                          </div>
                      
                          <div class="form-outline mb-2">
                              <input type="number" id="contact" name="contact" class="form-control form-control-lg" placeholder="078xxxxxxx" required />
                              <label class="form-label" for="form2Example17">Contact Number<span class="text-danger fs-4"> *</span></label>
                              <div class="invalid-feedback">Please enter contact number.</div>
                          </div>
        
                          <div class="form-outline mb-2">
                            <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Enter your email" value="{{ old('email') }}" required />
                            <label class="form-label" for="form2Example17">Email address<span class="text-danger fs-4"> *</span></label>
                            <div class="invalid-feedback">Please enter email.</div>
                          </div>
        
                          <div class="form-outline mb-2">
                            <input type="password" id="password" name="password" class="form-control form-control-lg"  value="{{ old('password') }}" placeholder="******" required/>
                            <label class="form-label" for="form2Example27">Password<span class="text-danger fs-4"> *</span></label>
                            <div class="invalid-feedback">Please enter password.</div>
                          
                          </div>

                          <div class="form-outline mb-2">
                            <input type="password" id="confirmpassword" name="confirmpassword" class="form-control form-control-lg" placeholder="******" required />
                            <label class="form-label" for="form2Example27">Confirm Password<span class="text-danger fs-4"> *</span></label>
                            <div class="invalid-feedback">Please enter password.</div>
                          </div>
        
                          <div class="pt-1 mb-3">
                            <button  class="btn btn-warning btn-lg btn-block" type="submit">Register</button>
                          </div>
        
              
                          <p class="mb-5 pb-lg-2" style="color: #393f81;">All ready have an account? <a href="{{ url('/login') }}"
                              style="color: #393f81;">Sign in</a></p>
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