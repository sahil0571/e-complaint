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
                            <div class="d-flex mb-1">
                                <svg viewBox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                    <defs>
                                        <linearGradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%"
                                            y2="89.4879456%">
                                            <stop stop-color="#000000" offset="0%"></stop>
                                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                                        </linearGradient>
                                        <linearGradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%"
                                            x2="37.373316%" y2="100%">
                                            <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                                        </linearGradient>
                                    </defs>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                            <g id="Group" transform="translate(400.000000, 178.000000)">
                                                <path class="text-primary" id="Path"
                                                    d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                                    style="fill: currentColor"></path>
                                                <path id="Path1"
                                                    d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                                    fill="url(#linearGradient-1)" opacity="0.2"></path>
                                                <polygon id="Path-2" fill="#000000" opacity="0.049999997"
                                                    points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325">
                                                </polygon>
                                                <polygon id="Path-21" fill="#000000" opacity="0.099999994"
                                                    points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338">
                                                </polygon>
                                                <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994"
                                                    points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288">
                                                </polygon>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <h3 class="text-primary fw-bold ms-1">E-Complaint System</h3>
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
