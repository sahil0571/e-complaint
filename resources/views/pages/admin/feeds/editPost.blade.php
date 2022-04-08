@extends('app')

@section('title')
    Edit Post
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
                            <h4 class="card-title">Edit Post.</h4>
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
                        </div>
                        <div class="card-body">
                            <form class="auth-register-form mt-2" id="postForm" action="{{ route('admin.updatePost') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $feed->id }}">

                                <div class="mb-1">
                                    <label class="form-label fw-bold" for="title">Title</label>
                                    <input class="form-control" id="title" type="text" name="title"
                                        value="{{ $feed->title }}" aria-describedby="title" tabindex="1" />
                                    @error('title')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label class="form-label fw-bold" for="sub_title">Sub Title</label>
                                    <input class="form-control" id="sub_title" type="text" name="sub_title"
                                        value="{{ $feed->sub_title }}" aria-describedby="sub_title" autofocus=""
                                        tabindex="1" />
                                    @error('sub_title')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label class="form-label fw-bold" for="slug">Slug (Route Name)</label>
                                    <input class="form-control" id="slug" type="text" name="slug" aria-describedby="slug"
                                        value="{{ $feed->slug }}" autofocus="" tabindex="1" readonly />
                                    @error('slug')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>


                                <label class="form-label mt-1" for="default-select">Department</label>
                                <div class="position-relative">
                                    <select style="text-align: left"
                                        class="select2-icons form-select select2-hidden-accessible" id="default-select"
                                        name="dept_id">
                                        <option value="1" {{ $feed->dept_id == 1 ? 'selected' : '' }}>All</option>
                                        @foreach ($depts as $dept)
                                            <option value="{{ $dept->id }}"
                                                {{ $feed->dept_id == $dept->id ? 'selected' : '' }}>{{ $dept->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-2 mt-2">
                                    <label class="form-label" for="blog-edit-status">Status</label>
                                    <select class="form-select" name="status" id="blog-edit-status">
                                        <option value="1" {{ $feed->status == 1 ? 'selected' : '' }}>Published</option>
                                        <option value="0" {{ $feed->status == 0 ? 'selected' : '' }}>Pending</option>
                                    </select>
                                </div>

                                <div class="col-12 mb-2">
                                    <div class="border rounded p-2">
                                        <h4 class="mb-1">Featured Image</h4>
                                        <div class="d-flex flex-column flex-md-row">
                                            <img src=" {{asset('/storage/feeds') . '/' . $feed->photo}}" id="blog-feature-image" class="rounded me-2 mb-1 mb-md-0"
                                                width="170" height="110" alt="Please select a display image.">
                                            <div class="featured-info">
                                                <small class="text-muted">Required image resolution 800x400, image size
                                                    10mb.</small>
                                                <p class="my-50">
                                                    <a href="#" id="blog-image-text"> {{ asset('/storage/feeds') . '/' . $feed->photo}}</a>
                                                </p>
                                                <div class="d-inline-block">
                                                    <input class="form-control" name="photo" type="file"
                                                        id="blogCustomFile" accept="image/*">
                                                    @error('photo')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="mb-2">
                                    <label class="form-label">Content</label>
                                    <div id="blog-editor-wrapper">
                                        <div id="blog-editor-container">
                                            <div class="editor ql-container ql-snow">
                                                <div class="ql-editor" data-gramm="false" contenteditable="true">
                                                    {!! $feed->desc !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <button class="btn btn-primary w-100" type="submit" tabindex="5">Save</button>
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

@section('custome-script')
    <script src="{{ asset(mix('/vendors/js/editors/quill/katex.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/editors/quill/highlight.min.js')) }}"></script>
    <script src="{{ asset(mix('/vendors/js/editors/quill/quill.min.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/page-blog-edit.js')) }}"></script>
    <script>
        $(document).ready(function() {
            $("#postForm").on("submit", function() {
                var hvalue = $('.ql-editor').html();
                $(this).append("<textarea name='desc' style='display:none'>" + hvalue + "</textarea>");
            });
        });

        let title = document.getElementById('title');
        let slug = document.getElementById('slug');

        title.addEventListener('keyup', (e) => {
            console.log(e.target.value);
            let val = e.target.value.toLowerCase().replace(/ /g, '-')
                .replace(/[^\w-]+/g, '');

            slug.value = val.toLowerCase()
        })
    </script>
@endsection
