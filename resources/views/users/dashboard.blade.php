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
                    <h1>Welcome {{ $name }}</h1>
                </div>
            </main>
        </div>
    </div>

@endsection

