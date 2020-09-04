<head>
    <title>Acob.az | Admin Panel</title>
    @include('admin.layouts.head')
</head>
<body data-open="click" data-menu="vertical-menu" data-col="2-columns"
      class="vertical-layout vertical-menu 2-columns  fixed-navbar">

<!-- navbar-fixed-top-->
<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu hidden-md-up float-xs-left">
                    <a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i>
                    </a></li>
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="navbar-brand nav-link"
                       style="    font-size: 25px;
    font-weight: bold;
    color: #b09658;
    border: 1px solid #b09658;
    padding: 10px;
    padding-top: 5px;
    margin-top: 8px;
    margin-left: 4px;">
                        Acob.az
                        {{--                        <img style="width:100px;margin-left: 40px;margin-top: -10px;" alt="branding logo"--}}
                        {{--                             src="{{ asset('front/images/logo.png') }}"--}}
                        {{--                             data-expand="{{ asset('front/images/logo.png') }}"--}}
                        {{--                             data-collapse="{{ asset('front/images/logo.png') }}"--}}
                        {{--                             class="brand-logo">--}}
                    </a>
                </li>
                <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile"
                                                                    class="nav-link open-navbar-container">
                        <i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content container-fluid">
            <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
                <ul class="nav navbar-nav float-xs-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a href="#" data-toggle="dropdown"
                           class="dropdown-toggle nav-link dropdown-user-link">
                            <span class="avatar avatar-online">
                                <img src="{{ asset('assets/images/portrait/small/avatar-s-12.png') }}"
                                     alt="avatar">
                                <i></i></span><span class="user-name">{{ auth()->user()->username }}</span></a>
                        <div class="dropdown-menu dropdown-menu-right"><a href="#" class="dropdown-item">
                                <i class="icon-head"></i> Profil</a><a href="#" class="dropdown-item">
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" class="dropdown-item">
                                    <i class="icon-power3"></i> Çıxış</a>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div id="load" style="display: none;">Əməliyyat gedir....</div>
