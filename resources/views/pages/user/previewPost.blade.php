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
                    <div class="content-detached content-left">
                        <div class="content-body">
                            <!-- Blog Detail -->
                            <div class="blog-detail-wrapper">
                                <div class="row">
                                    <!-- Blog -->
                                    <div class="col-12">
                                        <div class="card">
                                            <img src="{{ asset('/storage/feeds') . '/' . $feed->photo }}"
                                                class="img-fluid card-img-top" alt="Post Detail Pic">
                                            <div class="card-body">
                                                <h4 class="card-title">{{ $feed->title }}</h4>
                                                <span class="me-25">{{ $feed->sub_title }}</span>
                                                <div class="d-flex">
                                                    <div class="avatar me-50">
                                                    </div>
                                                    <div class="author-info">
                                                        <small class="text-muted me-25">for</small>
                                                        <small>
                                                            @if ($feed->dept_id == 1)
                                                                <span class="badge rounded-pill badge-light-success">
                                                                    All Departments
                                                                </span>
                                                            @else
                                                                <span class="badge rounded-pill badge-light-warning">
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
                                                    {{-- <a href="#">
                                                        <span
                                                            class="badge rounded-pill badge-light-danger me-50">Gaming</span>
                                                    </a>
                                                    <a href="#">
                                                        <span class="badge rounded-pill badge-light-warning">Video</span>
                                                    </a> --}}
                                                </div>

                                                <div class="post-body">
                                                    {!! $feed->desc !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Blog -->

                            </div>

                        </div>
                        <!--/ Blog Detail -->

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
