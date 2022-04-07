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
                        <form class="auth-register-form mt-2" action="{{route('admin.updateUser')}}" method="POST" enctype="multipart/form-data">
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
                                <label class="form-label fw-bold" for="email">Enrollment number<span class="text-danger">*</span></label>
                                <input class="form-control" id="enrollment_no" type="text" name="enrollment_no" value="{{$editUser->enrollment_no}}" placeholder="Enter enrollment No." aria-describedby="enrollment_no" tabindex="2" required/>
                                @error('enrollment_no')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold" for="photo">Select Department</label>
                                <select name="dept_id" class="form-select text-left" style="width: 100%; text-align: left !important;" id="dept_id" required>
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
                                <label class="form-label fw-bold" for="status">Status</label>
                                <select class="form-select text-left" id="status" type="text" name="status" required>
                                <option value="0" {{$editUser->status == 0 ? 'selected' : ''}}>Deactivated</option>
                                <option value="1" {{$editUser->status == 1 ? 'selected' : ''}}>Active</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold" for="role_id">Role</label>
                                <select class="form-select text-left" id="role_id" type="text" name="role_id" required>
                                    <option value="1" {{$editUser->role_id == 1 ? 'selected' : ''}}>Admin</option>
                                    <option value="2" {{$editUser->role_id == 2 ? 'selected' : ''}}>User</option>
                                </select>
                                @error('role_id')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold" for="verified">Verified</label>
                                <select class="form-select" id="verified" type="text" name="verified" required>
                                    <option value="0" {{$editUser->verified == 0 ? 'selected' : ''}}>Unverified</option>
                                    <option value="1" {{$editUser->verified == 1 ? 'selected' : ''}}>Verified</option>
                                </select>
                                @error('verified')
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
