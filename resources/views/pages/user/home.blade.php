@extends('app')

@section('title')
E-complaint | Home
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
                    <div class="row">
                @foreach($feeds as $feed)
                <div class="col-md-6 col-12">
                    <div class="card">
                        <a href="/feeds/preview-post/{{$feed->slug}}"">
                            <img class="card-img-top img-fluid" src="{{ asset('/storage/feeds') . '/' . $feed->photo }}" alt="Blog Post pic">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="page-blog-detail.html" class="blog-title-truncate text-body-heading">{{ $feed->title }}</a>
                            </h4>
                            <div class="d-flex">
                                <div class="avatar me-50">
                                    <img src="{{ asset('/storage/feeds') . '/' . $feed->photo }}" alt="Avatar" width="24" height="24">
                                </div>
                                <div class="author-info">
                                    <small class="text-muted me-25">by</small>
                                    <small><a href="#" class="text-body">Ghani Pradita</a></small>
                                    <span class="text-muted ms-50 me-25">|</span>
                                    <small class="text-muted">{{$feed->created_at->format('M d, Y')}}</small>
                                </div>
                            </div>
                            <div class="my-1 py-25">
                                <a href="#">
                                    <span class="badge rounded-pill badge-light-info me-50">Quote</span>
                                </a>
                                <a href="#">
                                    <span class="badge rounded-pill badge-light-primary">Fashion</span>
                                </a>
                            </div>
                            <p class="card-text blog-content-truncate">
                                {{ $feed->sub_title }}
                            </p>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="page-blog-detail.html#blogComment">
                                    <div class="d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square font-medium-1 text-body me-50"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                        <span class="text-body fw-bold">76 Comments</span>
                                    </div>
                                </a>
                                <a href="/feeds/{{$feed->slug}}"" class="fw-bold">Read More</a>
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
