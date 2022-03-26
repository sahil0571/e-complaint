@extends('app')


@section('title')
    Home Page
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

                    <div class="row match-height">

                        <!-- Statistics Card -->
                        <div class="col-xl-8 col-md-6 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Statistics</h4>

                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6 col-12 me-3 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-primary me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="trending-up" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">230k</h4>
                                                    <p class="card-text font-small-3 mb-0">Complaints</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 me-3 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-info me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="user" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{ $totalUsers }}</h4>
                                                    <p class="card-text font-small-3 mb-0">Users</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 me-3 mb-2 mb-sm-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-danger me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="box" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{ $totalDepartments }}</h4>
                                                    <p class="card-text font-small-3 mb-0">Departments</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Statistics Card -->
                    </div>



                    <div class="row match-height">

                        <!-- Browser States Card -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card card-browser-states">
                                <div class="card-header">
                                    <div>
                                        <h4 class="card-title">Browser States</h4>
                                        <p class="card-text font-small-2">Counter August 2020</p>
                                    </div>
                                    <div class="dropdown chart-dropdown">
                                        <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"
                                            data-bs-toggle="dropdown"></i>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Last 28 Days</a>
                                            <a class="dropdown-item" href="#">Last Month</a>
                                            <a class="dropdown-item" href="#">Last Year</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="browser-states">
                                        <div class="d-flex">
                                            <img src="{{ asset('/images/icons/google-chrome.png') }}"
                                                class="rounded me-1" height="30" alt="Google Chrome" />
                                            <h6 class="align-self-center mb-0">Google Chrome</h6>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="fw-bold text-body-heading me-1">54.4%</div>
                                            <div id="browser-state-chart-primary"></div>
                                        </div>
                                    </div>
                                    <div class="browser-states">
                                        <div class="d-flex">
                                            <img src="{{ asset('/images/icons/mozila-firefox.png') }}"
                                                class="rounded me-1" height="30" alt="Mozila Firefox" />
                                            <h6 class="align-self-center mb-0">Mozila Firefox</h6>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="fw-bold text-body-heading me-1">6.1%</div>
                                            <div id="browser-state-chart-warning"></div>
                                        </div>
                                    </div>
                                    <div class="browser-states">
                                        <div class="d-flex">
                                            <img src="{{ asset('/images/icons/apple-safari.png') }}"
                                                class="rounded me-1" height="30" alt="Apple Safari" />
                                            <h6 class="align-self-center mb-0">Apple Safari</h6>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="fw-bold text-body-heading me-1">14.6%</div>
                                            <div id="browser-state-chart-secondary"></div>
                                        </div>
                                    </div>
                                    <div class="browser-states">
                                        <div class="d-flex">
                                            <img src="{{ asset('/images/icons/internet-explorer.png') }}"
                                                class="rounded me-1" height="30" alt="Internet Explorer" />
                                            <h6 class="align-self-center mb-0">Internet Explorer</h6>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="fw-bold text-body-heading me-1">4.2%</div>
                                            <div id="browser-state-chart-info"></div>
                                        </div>
                                    </div>
                                    <div class="browser-states">
                                        <div class="d-flex">
                                            <img src="{{ asset('/images/icons/opera.png') }}" class="rounded me-1"
                                                height="30" alt="Opera Mini" />
                                            <h6 class="align-self-center mb-0">Opera Mini</h6>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="fw-bold text-body-heading me-1">8.4%</div>
                                            <div id="browser-state-chart-danger"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Browser States Card -->

                        <!-- Goal Overview Card -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Goal Overview</h4>
                                    <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                                </div>
                                <div class="card-body p-0">
                                    <div id="complaints-overview" class="my-2"></div>

                                @section('custome-script')
                                    <script>
                                        var options = {
                                            chart: {
                                                height: 280,
                                                type: "radialBar",
                                            },
                                            series: [67],
                                            colors: ["#20E647"],
                                            plotOptions: {
                                                radialBar: {
                                                    hollow: {
                                                        margin: 0,
                                                        size: "70%",
                                                    },
                                                    track: {
                                                        dropShadow: {
                                                            enabled: true,
                                                            top: 2,
                                                            left: 0,
                                                            blur: 4,
                                                            opacity: 0.15
                                                        }
                                                    },
                                                    dataLabels: {
                                                        name: {
                                                            offsetY: -10,
                                                            color: "#fff",
                                                            fontSize: "13px"
                                                        },
                                                        value: {
                                                            color: "#fff",
                                                            fontSize: "30px",
                                                            show: true
                                                        }
                                                    }
                                                }
                                            },
                                            fill: {
                                                type: "gradient",
                                                gradient: {
                                                    shade: "dark",
                                                    type: "vertical",
                                                    gradientToColors: ["#87D4F9"],
                                                    stops: [0, 100]
                                                }
                                            },
                                            stroke: {
                                                lineCap: "round"
                                            },
                                            labels: ["Progress"]
                                        };


                                        var chart = new ApexCharts(document.querySelector("#complaints-overview"), options);

                                        chart.render();
                                    </script>
                                @endsection

                                <div class="row border-top text-center mx-0">
                                    <div class="col-6 border-end py-1">
                                        <p class="card-text text-muted mb-0">Completed</p>
                                        <h3 class="fw-bolder mb-0">786,617</h3>
                                    </div>
                                    <div class="col-6 py-1">
                                        <p class="card-text text-muted mb-0">In Progress</p>
                                        <h3 class="fw-bolder mb-0">13,561</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Goal Overview Card -->

                    <!-- Transaction Card -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card card-transaction">
                            <div class="card-header">
                                <h4 class="card-title">Transactions</h4>
                                <div class="dropdown chart-dropdown">
                                    <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"
                                        data-bs-toggle="dropdown"></i>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Last 28 Days</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">Last Year</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="transaction-item">
                                    <div class="d-flex">
                                        <div class="avatar bg-light-primary rounded float-start">
                                            <div class="avatar-content">
                                                <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="transaction-percentage">
                                            <h6 class="transaction-title">Wallet</h6>
                                            <small>Starbucks</small>
                                        </div>
                                    </div>
                                    <div class="fw-bolder text-danger">- $74</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="d-flex">
                                        <div class="avatar bg-light-success rounded float-start">
                                            <div class="avatar-content">
                                                <i data-feather="check" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="transaction-percentage">
                                            <h6 class="transaction-title">Bank Transfer</h6>
                                            <small>Add Money</small>
                                        </div>
                                    </div>
                                    <div class="fw-bolder text-success">+ $480</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="d-flex">
                                        <div class="avatar bg-light-danger rounded float-start">
                                            <div class="avatar-content">
                                                <i data-feather="dollar-sign" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="transaction-percentage">
                                            <h6 class="transaction-title">Paypal</h6>
                                            <small>Add Money</small>
                                        </div>
                                    </div>
                                    <div class="fw-bolder text-success">+ $590</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="d-flex">
                                        <div class="avatar bg-light-warning rounded float-start">
                                            <div class="avatar-content">
                                                <i data-feather="credit-card" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="transaction-percentage">
                                            <h6 class="transaction-title">Mastercard</h6>
                                            <small>Ordered Food</small>
                                        </div>
                                    </div>
                                    <div class="fw-bolder text-danger">- $23</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="d-flex">
                                        <div class="avatar bg-light-info rounded float-start">
                                            <div class="avatar-content">
                                                <i data-feather="trending-up" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="transaction-percentage">
                                            <h6 class="transaction-title">Transfer</h6>
                                            <small>Refund</small>
                                        </div>
                                    </div>
                                    <div class="fw-bolder text-success">+ $98</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Transaction Card -->
                </div>
            </section>
            <!-- Dashboard Ecommerce ends -->

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection
