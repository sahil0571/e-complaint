@extends('app')


@section('content')
    <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Posts</h1>
    </div>

    <div class="text-center">
      @php
            $logout = '<a href="/logout">Logout</a>';
        @endphp 
        Welcome {{ Auth::user()->fname }} 
        <a href="/logout"> logout </a>
    </div>
  </div>
  <!---Container Fluid-->
@endsection

