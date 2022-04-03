@extends('app')

@section('title')
    Edit Depatment
@endsection
@section('content')

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
                        <h4 class="card-title">Edit Department.</h4>
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
                        <form class="needs-validation" method="POST" action="/edit-department">
                            @csrf
                            <input type="hidden" name="id" value="{{$dept->id}}">
                            <div class="mb-1">
                                <label for="deptName" class="form-label">Department Name</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="text" class="form-control" value="{{$dept->name}}" name="deptName" id="deptName" aria-describedby="inputGroupPrepend" >
                                    @error('deptName')
                                        <div class="invalid-feedback d-block">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-1">
                                <label for="s_name" class="form-label">Department Short Name</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="text" class="form-control" value="{{$dept->s_name}}" name="s_name" id="s_name" aria-describedby="inputGroupPrepend" >
                                    @error('s_name')
                                        <div class="invalid-feedback d-block">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-1">
                                <label class="d-block form-label" for="deptDesc">Description</label>
                                <textarea class="form-control" id="deptDesc" name="deptDesc" rows="3" >{{$dept->description}}</textarea>
                                @error('deptDesc')
                                    <div class="invalid-feedback d-block">Please enter a valid description.</div>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label">Staus</label>
                                <div class="form-check my-50">
                                    <input type="radio" {{ $dept->status == 1 ? 'checked' : ''}} id="validationRadio3" value="1" name="deptStatus" class="form-check-input" required="">
                                    <label class="form-check-label" for="validationRadio3">Active</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" {{ $dept->status == 0 ? 'checked' : ''}} id="validationRadio4" value="0" name="deptStatus" class="form-check-input" required="">
                                    <label class="form-check-label" for="validationRadio4">Deactivated</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Submit</button>
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