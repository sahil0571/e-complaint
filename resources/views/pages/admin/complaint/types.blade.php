@extends('app')

@section('title')
    Complaint Types
@endsection

@section('custome-css')
    <style>
        .w-80 {
            max-width: 80%
        }

    </style>
@endsection


@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">



            <div class="card p-2">
                <form action="{{ route('admin.complaintTypeAdd') }}" method="POST">
                    @csrf
                    <div class="mb-1 row d-flex justify-content-center">
                        <div class="col-md-9">
                            <input id="type" class="form-control d-inline " name="type_name" type="text"
                                placeholder="Enter Type name">
                        </div>
                        <div class="col-md-2 ">
                            <button class="btn btn-primary ms-1" type="submit"><i data-feather='plus'></i> Add</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="container">

                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show w-80 mx-auto" role="alert">
                        <div class="alert-body">
                            {!!Session::get('success')!!}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (Session::has('failed'))
                    <div class="alert alert-danger alert-dismissible fade show w-80 mx-auto" role="alert">
                        <div class="alert-body">
                            {{Session::get('failed')}}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @error('type_name')
                <div class="alert alert-danger alert-dismissible fade show w-80 mx-auto" role="alert">
                    <div class="alert-body">
                        {{$message}}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @enderror
                
                @foreach ($types as $type)
                    <div class=" card p-1 text-center d-flex w-80 mx-auto">
                        <form action="{{ route('admin.complaintTypeUpdate') }}" method="POST">
                            @csrf
                            <div class="mb-1 row d-flex align-items-center">
                                <div class="col-md-1 mt-1">
                                    <p>
                                        {{ $type->id }}.
                                    </p>
                                </div>
                                <div class="col-md-7 d-flex align-items-center">
                                    <input type="hidden" value="{{ $type->id }}" name="id">
                                    <input id="type" class="form-control " name="type_name" type="text"
                                        placeholder="Enter Type name" value="{{ $type->name }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">
                                    <button class="btn btn-sm btn-success ms-1" type="submit"><i
                                            data-feather='edit'></i></button>

                                    <div class="icon-wrapper ms-1">
                                        <a href="" class="text-danger"><i data-feather='trash-2'></i></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>


        </div>
    </div>


    <!-- END: Content-->
@endsection
