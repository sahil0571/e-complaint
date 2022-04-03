@extends('app')

@section('title')
    Admin of this websites
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
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <h4 class="alert-heading">Failed</h4>
                            <div class="alert-body">
                                {{ Session::get('failed') }}.
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <h4 class="alert-heading">Success</h4>
                            <div class="alert-body">
                                {{ Session::get('success') }}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Admins</h4>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        All admins of this website who manage and handle all Users.
                                        These users can be managed by using <code class="highlighter-rouge">actions.</code>
                                    </p>
                                </div>
                                <div class="table-responsive" style="min-height: 200px;">
                                    <table class="table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Id</th>
                                                <th>Invoice Number</th>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Department</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($complaints as $complaint)
                                                <tr>
                                                    <td>{{ $complaint->id }}</td>
                                                    <td>{{ $complaint->invoice_number }}</td>
                                                    <td>{{ $complaint->title }}</td>
                                                    <td>
                                                        @if ($complaint->status == 1)
                                                            <span
                                                                class="badge rounded-pill badge-light-info me-1">Review</span>
                                                        @elseif($complaint->status == 5)
                                                            <span
                                                                class="badge rounded-pill badge-light-danger me-1">Unverified</span>
                                                        @elseif($complaint->status == 0)
                                                            <span
                                                                class="badge rounded-pill badge-light-warning me-1">Pending</span>
                                                        @elseif($complaint->status == 2)
                                                            <span
                                                                class="badge rounded-pill badge-light-success me-1">Solved</span>
                                                        @elseif($complaint->status == 3)
                                                            <span
                                                                class="badge rounded-pill badge-light-danger me-1">Rejected</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $complaint->department->name }}</td>
                                                    <td><button type="button"
                                                            class="btn btn-primary waves-effect waves-float waves-light"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#show-{{ $complaint->invoice_number }}">
                                                            View
                                                        </button>
                                                        <div class="modal fade modal-danger text-start show"
                                                            id="show-{{ $complaint->invoice_number }}" tabindex="-1"
                                                            aria-labelledby="myModalLabel120" style="display: none;"
                                                            aria-modal="true" role="dialog">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                <div class="modal-content">

                                                                    <div class="modal-header bg-transparent">
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>

                                                                    <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                        <h1 class="text-center mb-1" id="addNewCardTitle">
                                                                            Complaint #{{ $complaint->invoice_number }}
                                                                        </h1>
                                                                        {{-- <p class="text-center">Add card for future billing</p> --}}
                                                                        <div class="col-md-12 p-0 mt-xl-0 mt-2">
                                                                            <h6 class="">Complaint Details:
                                                                            </h6>

                                                                            <table>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="pe-1">Complaint
                                                                                            Title:</td>
                                                                                        <td><span
                                                                                                class="fw-bold">{{ $complaint->title }}</span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Complaint
                                                                                            Description:</td>
                                                                                        <td><span
                                                                                                class="fw-bold">{{ $complaint->desc }}</span>

                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Complaint
                                                                                            Status:</td>
                                                                                        <td>
                                                                                            @if ($complaint->status == 1)
                                                                                                <span
                                                                                                    class="badge rounded-pill badge-light-info me-1">Review</span>
                                                                                            @elseif($complaint->status == 5)
                                                                                                <span
                                                                                                    class="badge rounded-pill badge-light-danger me-1">Unverified</span>
                                                                                            @elseif($complaint->status == 0)
                                                                                                <span
                                                                                                    class="badge rounded-pill badge-light-warning me-1">Pending</span>
                                                                                            @elseif($complaint->status == 2)
                                                                                                <span
                                                                                                    class="badge rounded-pill badge-light-success me-1">Solved</span>
                                                                                            @elseif($complaint->status == 3)
                                                                                                <span
                                                                                                    class="badge rounded-pill badge-light-danger me-1">Rejected</span>
                                                                                            @endif
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Complaint
                                                                                            Type:</td>
                                                                                        <td><span
                                                                                                class="fw-bold">{{ $complaint->type->name }}</span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Complaint
                                                                                            Department:</td>
                                                                                        <td><span
                                                                                                class="fw-bold">{{ $complaint->department->name }}</span>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>

                                                                            <div class="d-block mx-auto my-2 text-center">

                                                                                @if ($complaint->status != 1)
                                                                                    <a class="btn btn-sm btn-info me-1">Put
                                                                                        under Review</a>
                                                                                @endif

                                                                                @if ($complaint->status != 0)
                                                                                    <a class="btn btn-sm btn-warning me-1">Mark
                                                                                        as Pending</a>
                                                                                @endif
                                                                                @if ($complaint->status != 2)
                                                                                    <a class="btn btn-sm btn-success me-1">Mark
                                                                                        as Solved</a>
                                                                                @endif
                                                                                @if ($complaint->status != 3)
                                                                                    <a class="btn btn-sm btn-danger me-1">Reject
                                                                                        Complaint</a>
                                                                                @endif

                                                                            </div>

                                                                            <div class="d-block mx-auto mb-2 text-center">
                                                                                <button data-bs-toggle="modal"
                                                                                    data-bs-target="#delete-{{ $complaint->id }}"
                                                                                    class="btn btn-danger btn-sm  ">Delete</button>


                                                                                <a href="/print-recipt/complaint/{{ $complaint->invoice_number }}"
                                                                                    target="blank"
                                                                                    class="btn btn-secondary btn-sm my-2 ">Print
                                                                                    Recipt</a>
                                                                            </div>

                                                                            <div class="modal fade modal-danger text-start show"
                                                                                id="delete-{{ $complaint->id }}"
                                                                                tabindex="-1"
                                                                                aria-labelledby="myModalLabel120"
                                                                                style="display: none;" aria-modal="true"
                                                                                role="dialog">
                                                                                <div
                                                                                    class="modal-dialog modal-dialog-centered">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title"
                                                                                                id="myModalLabel120">Warning
                                                                                                !</h5>
                                                                                            <button type="button"
                                                                                                class="btn-close"
                                                                                                data-bs-dismiss="modal"
                                                                                                aria-label="Close"></button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            Are you sure you want to delete
                                                                                            <code
                                                                                                class="highlighter-rouge">{{ $complaint->title }}</code>
                                                                                            complaint.
                                                                                            You will not be able to retrive
                                                                                            it again.
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <a class="btn btn-danger waves-effect waves-float waves-light del_complaint"
                                                                                                href="/complaint/delete/{{ $complaint->id }}">Delete</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>



                                                </tr>


                                                {{-- <div class="modal fade modal-danger text-start show"
                                                    id="delete-{{ $user->id }}" tabindex="-1"
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
                                                                    class="highlighter-rouge">{{ $user->name }}</code>
                                                                deparmment.
                                                                You will not be able to retrive it again.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="/delete-user/{{ $user->id }}"
                                                                    class="btn btn-danger waves-effect waves-float waves-light">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                <div class="mx-2">

                                    {{ $complaints->links() }}
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
