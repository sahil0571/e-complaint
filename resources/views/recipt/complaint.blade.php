<!DOCTYPE html>
<html class="loading semi-dark-layout" lang="en" data-layout="semi-dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Complaint recipt </title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('vendors/css/vendors-rtl.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('css-rtl/custom-rtl.css') }}" />
    <link rel="stylesheet" href="{{ asset('css-rtl/style-rtl.css') }}" />

    <link rel="stylesheet" href="{{ asset(mix('vendors/css/vendors.min.css')) }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">


    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" href="{{ asset(mix('css/core.css')) }}" />
    <link rel="stylesheet" href="{{ asset(mix('css/base/themes/semi-dark-layout.css')) }}" />

    <link rel="stylesheet" href="{{ asset('css/base/core/menu/menu-types/horizontal-menu.css') }}" />

    <link rel="stylesheet" href="{{ asset(mix('css/base/core/menu/menu-types/vertical-menu.css')) }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('/css/base/pages/dashboard-ecommerce.css')) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('/css/base/plugins/charts/chart-apex.css')) }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">

    <!-- laravel style -->
    <link rel="stylesheet" href="{{ asset(mix('css/overrides.css')) }}" />

    <!-- BEGIN: Custom CSS-->

    <link rel="stylesheet" href="{{ asset(mix('css/style.css')) }}" />


    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" href="{{ asset('css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/base/themes/dark-layout.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/base/themes/bordered-layout.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/base/themes/semi-dark-layout.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/base/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base/pages/authentication.css') }}">

    <link rel="stylesheet" href="{{ asset('css/base/pages/app-invoice-print.css') }}">


</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="invoice-print p-3">
                    <div class="invoice-header d-flex justify-content-between flex-md-row flex-column pb-2">
                        <div>
                            <div class="d-flex mb-1 mt-1 ms-0">

                                <h3 class="brand-text text-primary ms-1">
                                    <img style="filter: drop-shadow(2px 1px 5px #0016d259) drop-shadow(-1px -1px 5px #0016d259);"
                                        src="{{ asset('/images/logo.png') }}" alt="" width="55px">
                                    E-Complaint System
                                </h3>

                                {{-- <h3 class="text-primary fw-bold ms-1">E-Complaint System</h3> --}}
                            </div>
                            <p class="mb-25">123, Administrative Office</p>
                            <p class="mb-25">Xyz Collage, Surat, Gujrat, India.</p>
                            <p class="mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
                        </div>
                        <div class="mt-md-0 mt-2">
                            @php
                                date_default_timezone_set('Asia/Kolkata');
                            @endphp
                            <h4 class="fw-bold text-end mb-1">Complaint #{{ $complaint->invoice_number }}</h4>
                            <div class="invoice-date-wrapper mb-50">
                                <span class="invoice-date-title">Date Issued:</span>
                                <span class="fw-bold"> {{ $complaint->created_at->format('m-d-Y') }}</span>
                            </div>
                            <div class="invoice-date-wrapper">
                                <span class="invoice-date-title">Time Issued:</span>
                                <span class="fw-bold">{{ $complaint->created_at->format('h:i A') }}</span>
                            </div>
                        </div>
                    </div>

                    <hr class="my-2" />
                    <h2>User Details</h2>

                    <div class="row pb-2">
                        <div class="col-sm-6">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="pe-1">User Details:</td>
                                        <td>{{ $complaint->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-1">User Email:</td>
                                        <td>{{ $complaint->user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-1">User Enrollment No:</td>
                                        <td>{{ $complaint->user->enrollment_no }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-6 mt-sm-0 mt-2">
                            <h6 class="mb-1">User Details:</h6>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="pe-1">Complaint Status:</td>
                                        <td><strong>{{ $complaint->status == 0 ? 'Pending' : '' }}</strong></td>
                                        <td><strong>{{ $complaint->status == 1 ? 'Review' : '' }}</strong></td>
                                        <td><strong>{{ $complaint->status == 2 ? 'Resolved' : '' }}</strong></td>
                                        <td><strong>{{ $complaint->status == 3 ? 'Rejected' : '' }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="pe-1">Deparment name:</td>
                                        <td>{{ $dept->s_name }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <hr class="my-2" />

                    <h1>Complaint Detailes</h1>

                    <table>
                        <tbody>
                            <tr>
                                <th class="py-1">Invoice Number :</th>
                                <td class="py-1">
                                    <strong>{{ $complaint->invoice_number }}</strong>
                                </td>
                            </tr>
                            <tr>
                                <th class="py-1">Title:</th>
                                <td>{{ $complaint->title }}</td>
                            </tr>
                            <tr>
                                <th class="py-1">Descrition :</th>
                                <td>{{ $complaint->desc }}</td>
                            </tr>
                            <tr>
                                <th class="py-1">Status :</th>
                                <td>
                                    <strong><span
                                            style="color: black !important">{{ $complaint->status == 0 ? 'Pending' : '' }}</span></strong>
                                    <strong><span
                                            style="color: blue !important">{{ $complaint->status == 1 ? 'Review' : '' }}</span></strong>
                                    <strong><span
                                            style="color: green !important">{{ $complaint->status == 2 ? 'Resolved' : '' }}</span></strong>
                                    <strong><span
                                            style="color: red !important">{{ $complaint->status == 3 ? 'Rejected' : '' }}</span></strong>
                                </td>
                            </tr>
                            <tr>
                                <th class="py-1 col-2">Deparment name:</th>
                                <td>{{ $complaint->department->name }}</td>
                            </tr>
                            <tr>
                                <th class="py-1 col-2">Type :</th>
                                <td>{{ $complaint->type->name }}</td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- <div class="table-responsive mt-2">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th class="py-1">Id</th>
                                    <th class="py-1">Complaint Title</th>
                                    <th class="py-1 ps-4">description</th>
                                    <th class="py-1">Status</th>
                                    <th class="py-1">Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-1">
                                        <strong>{{ $complaint->id }}</strong>
                                    </td>
                                    <td class="py-1">
                                        <strong>{{ $complaint->title }}</strong>
                                    </td>
                                    <td class="py-1 ps-4">
                                        <p class="fw-semibold mb-25">{{ $complaint->desc }}</p>

                                    </td>
                                    <td class="py-1">
                                        <strong>{{ $complaint->status == 0 ? 'Pending' : '' }}</strong>
                                        <strong>{{ $complaint->status == 1 ? 'Resolved' : '' }}</strong>
                                        <strong>{{ $complaint->status == 2 ? 'Rejected' : '' }}</strong>
                                    </td>
                                    <td class="py-1">
                                        <strong>{{ $complaint->type->name }}</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> --}}


                    <hr class="my-2" />

                    <div class="row">
                        <div class="col-12">
                            <span class="fw-bold">Note:</span>
                            <span>Please make sure to verify detailes of the recipt if anything is wrong make sure to
                                update the detailes from account.</span>
                        </div>
                    </div>

                    ------------------------------------------------------------------------------------------------------------------------------
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset(mix('vendors/js/ui/jquery.sticky.js')) }}"></script>

    <!-- END: Page Vendor JS-->

    <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>


    <!-- BEGIN: Theme JS-->
    <script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
    <script src="{{ asset(mix('js/core/app.js')) }}"></script>

    <!-- custome scripts file for user -->
    <script src="{{ asset(mix('js/core/scripts.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/customizer.js')) }}"></script>


    <!-- BEGIN: Page JS-->
    <script src="{{ asset(mix('js/scripts/pages/app-invoice-print.js')) }}"></script>
    <!-- END: Page JS-->

    <script type="text/javascript">
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->



    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>
