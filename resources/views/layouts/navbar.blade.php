    <!-- BEGIN: Header-->
    <nav
        class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon ficon"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg></a></li>

                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                        id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">{{Auth::user()->name}}</span><span
                                class="user-status">{{ Auth::user()->role_id == 1 ? 'Admin' : 'User'}}</span></div><span class="avatar">

                            @if (Auth::user()->role_id == 1)
                            <img class="round" src="{{ asset('/images/portrait/small/avatar-s-11.jpg') }}"
                                alt="avatar" height="40" width="40">
                            @else
                            <img class="round" src="{{ asset('/storage/userImages/'.Auth::user()->photo.'') }}"
                                alt="avatar" height="40" width="40">

                            @endif
                                <span class="avatar-status-online">
                            </span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a
                            class="dropdown-item" href="{{route('user.profile')}}"><i class="me-50"
                                data-feather="user"></i> Profile</a><a class="dropdown-item" href="app-email.html"><i
                                class="me-50" data-feather="mail"></i> Inbox</a><a class="dropdown-item"
                            href="app-todo.html"><i class="me-50" data-feather="check-square"></i> Task</a><a
                            class="dropdown-item" href="app-chat.html"><i class="me-50"
                                data-feather="message-square"></i> Chats</a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="page-account-settings-account.html"><i class="me-50"
                                data-feather="settings"></i> Settings</a>

                        <a class="dropdown-item" href="page-pricing.html"><i class="me-50"
                                data-feather="credit-card"></i> Pricing</a>

                        <a class="dropdown-item" href="page-faq.html"><i class="me-50"
                                data-feather="help-circle"></i> FAQ</a>

                        <a class="dropdown-item" href="{{ route('logout') }}"><i class="me-50"
                                data-feather="power"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- END: Header-->
