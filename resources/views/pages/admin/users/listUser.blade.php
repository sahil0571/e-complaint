@extends('app')

@section('title')
Users
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
                <!-- Table head options start -->

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

                <div class="row" id="table-head">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Users</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    All Users registered to website are listed below.
                                    These users can be managed by using <code
                                        class="highlighter-rouge">actions.</code>
                                </p>
                            </div>
                            <div class="table-responsive" style="min-height: 200px;">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Verified</th>
                                            <th>Department</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        @if ($user->role_id == 2)
                                            <tr>
                                                <td>
                                                    {{$user->id}}
                                                </td>
                                                <td>{{$user->name}}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if ($user->status == 1)
                                                    <span class="badge rounded-pill badge-light-success me-1">Active</span>
                                                    @else
                                                    <span
                                                        class="badge rounded-pill badge-light-warning me-1">Deactivated</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($user->verified == 1)
                                                    <span class="badge rounded-pill badge-light-success me-1">Verified</span>
                                                    @else
                                                    <span
                                                        class="badge rounded-pill badge-light-warning me-1">Unverified</span>
                                                    @endif
                                                </td>
                                                <td>{{ $user->department->s_name }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button"
                                                            class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                                            data-bs-toggle="dropdown">
                                                            <i data-feather='edit'></i>
                                                        </button>

                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="/edit-user/{{$user->id}}">
                                                                <i data-feather="edit-2" class="me-50"></i>
                                                                <span>Edit</span>
                                                            </a>


                                                            <a class="dropdown-item">
                                                                <i data-feather="trash" class="me-50"></i>
                                                                <span data-bs-toggle="modal"
                                                                data-bs-target="#delete-{{$user->id}}">Delete</span>
                                                            </a>
                                                            @if($user->status == 0)
                                                            <a class="dropdown-item" href="/edit-user-status/{{$user->id}}">
                                                                <i data-feather='unlock' style="fill: #0cf00c47;"></i>
                                                                <span> &nbsp; Activate</span>
                                                            </a>
                                                            @else
                                                            <a class="dropdown-item" href="/edit-user-status/{{$user->id}}">
                                                                <i data-feather='lock' style="fill: #e802025c;"></i>
                                                                <span> &nbsp; Deactivate</span>
                                                            </a>
                                                            @endif
                                                        </div>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endif

                                        <div class="modal fade modal-danger text-start show" id="delete-{{$user->id}}"
                                            tabindex="-1" aria-labelledby="myModalLabel120" style="display: none;"
                                            aria-modal="true" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel120">Warning !</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete <code
                                                            class="highlighter-rouge">{{$user->name}}</code> deparmment.
                                                        You will not be able to retrive it again.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="/delete-user/{{$user->id}}"
                                                            class="btn btn-danger waves-effect waves-float waves-light">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table head options end -->




            </section>
            <!-- Dashboard Ecommerce ends -->

        </div>
    </div>
</div>
<!-- END: Content-->

@endsection
