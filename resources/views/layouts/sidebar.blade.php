<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand"
                    href="{{ Auth()->user()->role_id == 1 ? '/admin' : '/' }}"><span class="brand-logo">
                        <img src="{{ asset('images/logo.png') }}" alt=""></span>
                    <h2 class="brand-text">E-complaint</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">

        @if (Auth::user()->role_id == 1)
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="navigation-header"><span data-i18n="Apps &amp; Pages">Options</span><i
                        data-feather="more-horizontal"></i>
                    @php
                        $activeDept = '';
                        if (Route::currentRouteName() == 'admin.makeDepartment' || Route::currentRouteName() == 'admin.listDepartments' || Route::currentRouteName() == 'admin.admin.editDepartment') {
                            $activeDept = 'active';
                        }
                        $activeUsers = '';
                        if (Route::currentRouteName() == 'admin.listUsers' || Route::currentRouteName() == 'admin.editUser') {
                            $activeUsers = 'active';
                        }
                        $activeComplaint = '';
                        if (Route::currentRouteName() == 'admin.Complaints' || Route::currentRouteName() == 'admin.SolvedComplaints' || Route::currentRouteName() == 'admin.complaintTypes' || Route::currentRouteName() == 'admin.complaint.search') {
                            $activeComplaint = 'active';
                        }
                        $activeFeeds = '';
                        if (Route::currentRouteName() == 'admin.listFeeds' || Route::currentRouteName() == 'admin.listFeeds') {
                            $activeFeeds = 'active';
                        }
                    @endphp
                <li class="{{ Route::currentRouteName() == 'admin.home' ? 'active' : '' }} nav-item"><a
                        class="d-flex align-items-center" ><i data-feather="home"></i><span
                            class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span></a>
                    <ul class="menu-content">
                        <li><a class="{{ Route::currentRouteName() == 'admin.home' ? 'active' : '' }} d-flex align-items-center"
                                href="{{ route('admin.home') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="Analytics">Home</span></a>
                        </li>
                    </ul>
                </li>
                <li class="{{ $activeDept }} nav-item"><a class="d-flex align-items-center" href="#"><i
                            data-feather="server"></i><span class="menu-title text-truncate"
                            data-i18n="Invoice">Departments</span></a>
                    <ul class="menu-content">
                        <li><a class="{{ Route::currentRouteName() == 'admin.listDepartments' ? 'active' : '' }} {{ Route::currentRouteName() == 'admin.admin.editDepartment' ? 'active' : '' }} d-flex align-items-center"
                                href="{{ route('admin.listDepartments') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="List">List Deparments</span></a>
                        </li>
                        <li><a class="{{ Route::currentRouteName() == 'admin.makeDepartment' ? 'active' : '' }} d-flex align-items-center"
                                href="{{ route('admin.makeDepartment') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="Add">Add Department</span></a>
                        </li>
                    </ul>
                </li>
                <li class="{{ $activeUsers }} nav-item"><a class="d-flex align-items-center" href="#"><i
                            data-feather="user"></i><span class="menu-title text-truncate"
                            data-i18n="Invoice">Users</span></a>
                    <ul class="menu-content">
                        <li><a class="{{ (Route::currentRouteName() == 'admin.listUsers' || Route::currentRouteName() == 'admin.editUser') ? 'active' : '' }} d-flex align-items-center"
                                href="{{ route('admin.listUsers') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="Add">All User</span></a></li>
                        <li><a class="{{ Route::currentRouteName() == 'admin.listAdmins' ? 'active' : '' }} d-flex align-items-center"
                                href="{{ route('admin.listAdmins') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="Add">All Admin</span></a></li>
                    </ul>
                </li>
                <li class="{{ $activeComplaint }} nav-item"><a class="d-flex align-items-center" href="#"><i
                            data-feather='alert-triangle'></i><span class="menu-title text-truncate"
                            data-i18n="Invoice">Complaints</span></a>
                    <ul class="menu-content">
                        <li><a class="{{ Route::currentRouteName() == 'admin.Complaints' || Route::currentRouteName() == 'admin.complaint.search'? 'active': '' }} d-flex align-items-center"
                                href="{{ route('admin.Complaints') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="List">All Complaints</span></a>
                        </li>
                        <li><a class="{{ Route::currentRouteName() == 'admin.SolvedComplaints' ? 'active' : '' }} d-flex align-items-center"
                                href="{{ route('admin.SolvedComplaints') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="List">Solved Complaints</span></a>
                        </li>
                        <li><a class="{{ Route::currentRouteName() == 'admin.complaintTypes' ? 'active' : '' }} d-flex align-items-center"
                                href="{{ route('admin.complaintTypes') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="List">Complaints Types</span></a>
                        </li>
                    </ul>
                </li>
                <li class="{{ $activeFeeds }} nav-item"><a class="d-flex align-items-center" ><i
                            data-feather='airplay'></i><span class="menu-title text-truncate"
                            data-i18n="Dashboards">Feeds</span></a>
                    <ul class="menu-content">
                        <li><a class="{{ Route::currentRouteName() == 'admin.listFeeds' ? 'active' : '' }} d-flex align-items-center"
                                href="{{ route('admin.listFeeds') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="Analytics">List Feeds</span></a>
                        </li>
                        <li><a class="{{ Route::currentRouteName() == 'admin.makePost' ? 'active' : '' }} d-flex align-items-center"
                                href="{{ route('admin.makePost') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="Analytics">Make Post</span></a>
                        </li>
                    </ul>
                </li>
                </li>
            </ul>
        @endif

        @if (Auth::user()->role_id == 2)
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="navigation-header"><span data-i18n="Apps &amp; Pages">Options</span><i
                        data-feather="more-horizontal"></i>
                    @php
                        $activeComplaint = '';
                        if (Route::currentRouteName() == 'user.makeComplaint' || Route::currentRouteName() == 'user.listComplaint') {
                            $activeComplaint = 'active';
                        }
                    @endphp
                <li class="{{ Route::currentRouteName() == 'user.home' ? 'active' : '' }} nav-item"><a
                        class="d-flex align-items-center" ><i data-feather="home"></i><span
                            class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span></a>
                    <ul class="menu-content">
                        <li><a class="{{ Route::currentRouteName() == 'user.home' ? 'active' : '' }} d-flex align-items-center"
                                href="{{ route('user.home') }}"><i data-feather="box"></i><span
                                    class="menu-item text-truncate" data-i18n="Analytics">Home</span></a>
                        </li>
                    </ul>
                </li>
                <li class="{{ $activeComplaint }} nav-item"><a class="d-flex align-items-center" href="#"><i
                            data-feather='alert-triangle'></i><span class="menu-title text-truncate"
                            data-i18n="Invoice">Complaints</span></a>
                    <ul class="menu-content">
                        <li><a class="{{ Route::currentRouteName() == 'user.listComplaint' ? 'active' : '' }} d-flex align-items-center"
                                href="{{ route('user.listComplaint') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="List">My Complaints</span></a>
                        </li>
                        @if (Auth::User()->status == 1)
                            <li><a class="{{ Route::currentRouteName() == 'user.makeComplaint' ? 'active' : '' }} d-flex align-items-center"
                                    href="{{ route('user.makeComplaint') }}"><i data-feather="circle"></i><span
                                        class="menu-item text-truncate" data-i18n="List">Make Complaint</span></a>
                            </li>
                        @endif
                    </ul>
                </li>
                <li class="{{ Route::currentRouteName() == 'user.profile' ? 'active' : '' }} nav-item"><a
                        class="d-flex align-items-center" ><i data-feather="user-check"></i><span
                            class="menu-title text-truncate" data-i18n="Dashboards">My Profile</span></a>
                    <ul class="menu-content">
                        <li><a class="{{ Route::currentRouteName() == 'user.profile' ? 'active' : '' }} d-flex align-items-center"
                                href="{{ route('user.profile') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="Analytics">Profile</span></a>
                        </li>
                    </ul>
                </li>
                <li class="{{ Route::currentRouteName() == 'user.feeds' ? 'active' : '' }} nav-item"><a
                        class="d-flex align-items-center" href="{{ route('user.feeds') }}"><i
                        data-feather='airplay'></i><span class="menu-title text-truncate"
                            data-i18n="Dashboards">Feeds</span></a>

                </li>

                </li>
            </ul>

        @endif
    </div>
</div>
<!-- END: Main Menu-->
