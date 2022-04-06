@extends('app')

@section('title')
    Edit User
@endsection
@section('content')
<style>
    .select2{
        text-align: left !important;
    }
    .select2-results__option{
        text-align: left !important;
    }
</style>

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit User.</h4>
                            @if (Session::has('failed'))
                                <div class="alert alert-danger" role="alert">
                                    <h4 class="alert-heading">Failed</h4>
                                    <div class="alert-body">
                                        {{Session::get('failed')}}.
                                    </div>
                                </div>
                            @endif
                            @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading">Success</h4>
                                    <div class="alert-body">
                                        {{Session::get('success')}}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <form class="auth-register-form mt-2" action="{{route('user.updateUser')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input class="form-control hidden" id="id" type="text" name="id" value="{{$editUser->id}}" aria-describedby="id" autofocus="" tabindex="1" required/>

                                <div class="mb-1">
                                    <label class="form-label fw-bold" for="name">Username</label>
                                    <input class="form-control" id="name" type="text" name="name" value="{{$editUser->name}}" aria-describedby="name" autofocus="" tabindex="1" required/>
                                    @error('name')
                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label class="form-label fw-bold" for="email">Email Address<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email" type="text" name="email" value="{{$editUser->email}}" aria-describedby="email" autofocus="" tabindex="1" required/>

                                    @error('email')
                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label class="form-label fw-bold" for="photo">Select Department</label>
                                    <select name="dept_id" class="form-select" id="dept_id" required>
                                        <option value="{{$editUser->dept_id}}" selected>{{$userDept->name}}</option>
                                        @foreach ($department as $dept)
                                            <option value="{{$dept->id}}">{{$dept->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('dept_id')
                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                    @enderror
                                </div>
                                    <div class="mb-1">
                                        <label class="form-label fw-bold" for="photo">Profile photo</label>
                                        <input class="form-control" id="photo" type="file" name="photo" placeholder="Add photo" aria-describedby="photo" tabindex="2" required/>
                                        @error('photo')
                                        <div class="invalid-feedback d-block">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label fw-bold" for="currentPassword">Old Password</label>
                                        <div class="input-group input-group-merge form-currentPassword-toggle">
                                            <input class="form-control form-control-merge" id="currentPassword" type="Password" name="currentPassword" placeholder="Enter current password" aria-describedby="currentPassword" tabindex="3" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                        @error('currentPassword')
                                        <div class="invalid-feedback d-block">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label fw-bold" for="password">New Password</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="Enter new password" aria-describedby="password" tabindex="3" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                        @error('password')
                                        <div class="invalid-feedback d-block">{{$message}}</div>
                                        @enderror
                                    </div>
                                <button class="btn btn-primary w-100" type="submit" tabindex="5">Update</button>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>


    <!-- END: Content-->
@endsection
