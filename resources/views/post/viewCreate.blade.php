@extends('layouts.mainLayout')

@section('content')

@php
    $id = session('id');
    $role = session('role');
    $name = session('name');
@endphp

    <div class="container-fluid">
        <div class="row">

            @include('layouts.sideBar')

             <!-- Main Content -->
             <main class="col-md-9 ms-sm-auto col-lg-10 content ">
                <div class="container-fluid">
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
                        <form action="{{ url('/createPost') }}" class="needs-validation" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="d-flex align-items-center mb-3 text-center">
                              <span class="h1 fw-bold mb-0 text-warning"><i>Create Post Here</i></span>
                            </div>
                            <hr>
        
                            <div class="form-outline mb-2">
                                <input type="text" id="title" name="title" class="form-control form-control-lg" placeholder="Title" required/>
                                <label class="form-label" for="form2Example17">Post Title<span class="text-danger fs-4"> *</span></label>
                                <div class="invalid-feedback">Please enter name.</div>
                            </div>
                        
                            <div class="form-outline mb-2">
                                <textarea type="number" id="content" name="content" class="form-control form-control-lg" placeholder="write here" required ></textarea>
                                <label class="form-label" for="form2Example17">Post Content<span class="text-danger fs-4"> *</span></label>
                                <div class="invalid-feedback">Please enter contact number.</div>
                            </div>

                            <div class="form-outline mb-2">
                                <input type="file" id="image" name="image" class="form-control form-control-lg" placeholder="" accept="image/*" required/>
                                <label class="form-label" for="form2Example17">Upload image<span class="text-danger fs-4"> *</span></label>
                                <div class="invalid-feedback">Please enter name.</div>
                            </div>
          
                            <div class="pt-1 mb-3">
                              <button  class="btn btn-warning btn-lg btn-block" type="submit">Create Post</button>
                            </div>
    
                          </form>
                    </div>
                    
                            
                </div>
            </main>

            
            

            
        </div>
    </div>


@endsection