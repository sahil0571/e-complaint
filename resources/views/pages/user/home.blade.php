@extends('app')

@section('title')
    Home
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
                    Recent Posts
                    <div class="row col-md-10 match-height">
                        @foreach ($feeds as $feed)
                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <a href="/feeds/{{ $feed->slug }}">
                                <img class=" card-img-top img-fluid"
                                        src="{{ asset('/storage/feeds') . '/' . $feed->photo }}" alt="Blog Post pic">
                                    </a>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="/feeds/{{ $feed->slug }}"
                                                class="blog-title-truncate text-body-heading">{{ $feed->title }}</a>
                                        </h4>
                                        <div class="d-flex">
                                            <div class="avatar me-50">
                                                <img src="{{ asset('/storage/feeds') . '/' . $feed->photo }}" alt="Avatar"
                                                    width="24" height="24">
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
                                        </div>
                                        <p class="card-text blog-content-truncate">
                                            {{ $feed->sub_title }}
                                        </p>
                                        <hr>
                                        <div class="d-flex justify-content-between align-items-center">
                                            
                                            <a href="/feeds/{{ $feed->slug }}" class=" fw-bold ms-auto">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
