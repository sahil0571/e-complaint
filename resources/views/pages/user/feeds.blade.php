@extends('app')

@section('title')
    Feeds
@endsection
@section('custome-css')
    <link rel="stylesheet" href="{{ asset('/vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/css/editors/quill/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/base/plugins/forms/form-quill-editor.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/base/pages/page-blog.css') }}">
@endsection
@section('content')
    <style>
        .select2 {
            text-align: left !important;
        }

        .select2-results__option {
            text-align: left !important;
        }

        .post-body img {
            max-width: 500px;
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
                    <div class="content-wrapper container-xxl p-0">
                        <div class="content-header row">
                            <div class="content-header-left col-md-9 col-12 mb-2">
                                <div class="row breadcrumbs-top">
                                    <div class="col-12">
                                        <h2 class="content-header-title float-start mb-0">Blog List</h2>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                                <div class="mb-1 breadcrumb-right">
                                    <div class="dropdown">
                                        <button
                                            class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle waves-effect waves-float waves-light"
                                            type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-grid">
                                                <rect x="3" y="3" width="7" height="7"></rect>
                                                <rect x="14" y="3" width="7" height="7"></rect>
                                                <rect x="14" y="14" width="7" height="7"></rect>
                                                <rect x="3" y="14" width="7" height="7"></rect>
                                            </svg> </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-detached content-left">
                            <div class="content-body">
                                <!-- Blog List -->
                                <div class="blog-list-wrapper">
                                    <!-- Blog List Items -->
                                    <div class="row match-height">
                                        @foreach ($feeds as $feed)
                                            <div class="col-md-6 col-12">
                                                <div class="card">
                                                    <a href="/feeds/{{ $feed->slug }}">
                                                        <img class=" card-img-top img-fluid"
                                                            src="{{ asset('/storage/feeds') . '/' . $feed->photo }}"
                                                            alt="Blog Post pic">
                                                    </a>
                                                    <div class="card-body">
                                                        <h4 class="card-title">
                                                            <a href="/feeds/{{ $feed->slug }}"
                                                                class="blog-title-truncate text-body-heading">{{ $feed->title }}</a>
                                                        </h4>
                                                        <div class="d-flex">
                                                            <div class="avatar me-50">
                                                                <img src="{{ asset('/storage/feeds') . '/' . $feed->photo }}"
                                                                    alt="Avatar" width="24" height="24">
                                                            </div>
                                                            <div class="author-info">
                                                                <small class="text-muted me-25">for</small>
                                                                <small>
                                                                    @if ($feed->dept_id == 1)
                                                                        <span
                                                                            class="badge rounded-pill badge-light-success">
                                                                            All Departments
                                                                        </span>
                                                                    @else
                                                                        <span
                                                                            class="badge rounded-pill badge-light-warning">
                                                                            {{ $feed->department->name }}
                                                                        </span>
                                                                    @endif
                                                                </small>
                                                                <span class="text-muted ms-50 me-25">|</span>
                                                                <small
                                                                    class="text-muted">{{ date_format($feed->created_at, 'd/m/Y ') }}</small>
                                                            </div>
                                                        </div>
                                                        <div class="my-1 py-25">
                                                        </div>
                                                        <p class="card-text blog-content-truncate">
                                                            {{ $feed->sub_title }}
                                                        </p>
                                                        <hr>
                                                        <div class="d-flex justify-content-between align-items-center">

                                                            <a href="/feeds/{{ $feed->slug }}"
                                                                class=" fw-bold ms-auto">Read More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!--/ Blog List Items -->

                                    <!-- Pagination -->
                                    {{ $feeds->render() }}
                                    <!--/ Pagination -->
                                </div>
                                <!--/ Blog List -->

                            </div>
                        </div>
                        <div class="sidebar-detached sidebar-right">
                            <div class="sidebar">
                                <div class="blog-sidebar my-2 my-lg-0">
    
                                    <!-- Recent Posts -->
                                    <div class="blog-recent-posts mt-3">
                                        <h6 class="section-label">Recent Posts</h6>
    
                                        @foreach ($recents as $r_feed)
                                            <div class="mt-75">
                                                <div class="d-flex mb-2">
                                                    <a href="/feeds/{{$r_feed->slug}}" class="me-2">
                                                        <img class="rounded"
                                                        src="{{ asset('/storage/feeds') . '/' . $r_feed->photo }}" width="100"
                                                            height="70" alt="Recent Post Pic">
                                                    </a>
                                                    <div class="blog-info">
                                                        <h6 class="blog-recent-post-title">
                                                            <a href="page-blog-detail.html" class="text-body-heading">{{$r_feed->title}}</a>
                                                        </h6>
                                                        <div class="text-muted mb-0">{{date_format($r_feed->created_at, 'd/m/Y ')}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
    
                                    </div>
                                    <!--/ Recent Posts -->
    
                                </div>
    
                            </div>
                        </div>
                    </div>
            </div>
            </section>
            <!-- Dashboard Ecommerce ends -->

        </div>
    </div>
    </div>


    <!-- END: Content-->
@endsection

@section('custome-script')
    <script src="{{ asset(mix('/vendors/js/editors/quill/katex.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/editors/quill/highlight.min.js')) }}"></script>
    <script src="{{ asset(mix('/vendors/js/editors/quill/quill.min.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/page-blog-edit.js')) }}"></script>
@endsection
