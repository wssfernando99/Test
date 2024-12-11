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
            <main class="col-md-9 ms-sm-auto col-lg-10 content">
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
                    
                    <form action="{{ url('/search') }}" class="needs-validation" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-8 form-outline mb-3">
                                <input type="text" id="search" name="search" class="form-control form-control-lg" placeholder="Search by Title"/>
                            </div>
                            
          
                            <div class="col-md-2 mb-3">
                              <button  class="btn btn-warning btn-lg btn-block" type="submit">Search</button>
                            </div>
                            <div class="col-md-2 mb-3">
                                <a href="{{ url('/viewPosts') }}" class="btn btn-secondary btn-lg btn-block" >Reset</a>
                              </div>
                        </div>

                        

                      </form>
                
                    
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Post Id</th>
                                        <th>Title</th>
                                        <th>image</th>
                                        <th>Content</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @if (!@empty($posts))
                                        @foreach ($posts as $post)
                                    
                                            <tr>
                                                <td>
                                                    {{ $post->id }}
                                                </td>
                                                <td>
                                                    {{ $post->title }}
                                                </td>
                                                <td>
                                                    <img src="{{ URL::to('/') }}/images/postImages/{{ $post->image }}"
                                                    width="120px" height="auto">
                                                </td>
                                                <td>
                                                    {{ $post->content }}
                                                </td>
                                                
                                                <td>
                                                    <div class="d-flex">

                                                        <a href="{{ url('/viewEdit/'.$post->id) }}"
                                                            class="btn btn-primary btn-sm ms-4">
                                                            Edit Post
                                                        </a>
                                                        
                                                
                                                        <form action="{{ url('/deletePost/'.$post->id)  }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm ms-4">Delete</button>
                                                        </form>
                                                    </div>
                    
                                                   
                                                
                                                             
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                </tbody>
                            </table>
                        </div>
            </main>
        </div>
    </div>


@endsection