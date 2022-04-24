@extends('app')

@section('title')
    Feeds
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
                                {{ Session::get('failed') }}.
                            </div>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Success</h4>
                            <div class="alert-body">
                                {{ Session::get('success') }}
                            </div>
                        </div>
                    @endif

                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Feeds</h4>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        All Users registered to website are listed below.
                                        These users can be managed by using <code class="highlighter-rouge">actions.</code>
                                    </p>
                                </div>
                                <div class="table-responsive" style="min-height: 200px;">
                                    <table class="table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Id</th>
                                                <th>Title</th>
                                                <th>Slug</th>
                                                <th>Status</th>
                                                <th>Department</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($feeds as $feed)
                                                <tr>
                                                    <td>
                                                        {{ $feed->id }}
                                                    </td>
                                                    <td>{{ $feed->title }}</td>
                                                    <td>{{ $feed->slug }}</td>
                                                    <td>
                                                        @if ($feed->status == 1)
                                                            <span
                                                                class="badge rounded-pill badge-light-success me-1">Published</span>
                                                        @else
                                                            <span
                                                                class="badge rounded-pill badge-light-warning me-1">Pending</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($feed->department->id == 0)
                                                            All
                                                        @else
                                                            {{ $feed->department->s_name }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                                                data-bs-toggle="dropdown">
                                                                <i data-feather='edit'></i>
                                                            </button>

                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="/edit-post/{{$feed->id}}">
                                                                    <i data-feather="edit-2" class="me-50"></i>
                                                                    <span>Edit</span>
                                                                </a>
                                                                <a class="dropdown-item" target="blank" href="/feeds/preview-post/{{$feed->slug}}">
                                                                    <i data-feather="eye" class="me-50"></i>
                                                                    <span>Preview</span>
                                                                </a>
                                                            </div>

                                                        </div>
                                                    </td>
                                                </tr>

                                                <div class="modal fade modal-danger text-start show"
                                                    id="delete-{{ $feed->id }}" tabindex="-1"
                                                    aria-labelledby="myModalLabel120" style="display: none;"
                                                    aria-modal="true" role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel120">Warning !
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete <code
                                                                    class="highlighter-rouge">{{ $feed->name }}</code>
                                                                deparmment.
                                                                You will not be able to retrive it again.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="/delete-user/{{ $feed->id }}"
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
