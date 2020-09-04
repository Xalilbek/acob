<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="GRINDUCK.COM">
    <title>Acob.az | Admin Panel</title>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/icomoon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/extensions/pace.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/core/menu/menu-types/vertical-overlay-menu.css') }}">


    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/login-register.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('org-assets/css/style.css') }}">
</head>
<body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
                <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 m-0">
                        <div class="card-header no-border">
                            <div class="card-title text-xs-center">
                                <div class="p-1">
                                    <img style=" width: 100px;margin-top: -32px;margin-bottom: -50px;"
                                         src="{{ asset('front/images/logo.png') }}"
                                         alt="acob.az logo">
                                </div>
                            </div>
                            <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Acob.az</span></h6>
                        </div>
                        <div class="card-body collapse in" style="padding-bottom: 40px;">
                            <div class="card-block">
                                <form class="form-horizontal form-simple" action="{{ route('login') }}" novalidate method="post">
                                    {{ csrf_field() }}
                                    <fieldset class="form-group position-relative has-icon-left mb-0">
                                        <input type="text" name="username" class="form-control form-control-lg input-lg" id="user-username" placeholder="İstifadəçi adı" required>
                                        <div class="form-control-position">
                                            <i class="icon-head"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" name="password" class="form-control form-control-lg input-lg" id="user-password" placeholder="Şifrə" required>
                                        <div class="form-control-position">
                                            <i class="icon-key3"></i>
                                        </div>
                                    </fieldset>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Daxil ol</button>
                                    <div style="padding-top: 10px;text-align: center;color: tomato;margin-bottom: -30px;">
                                        {{ session()->get('message') }}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<script src="{{ asset('assets/js/core/libraries/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/js/ui/tether.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/libraries/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/js/ui/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/js/ui/unison.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/js/ui/blockUI.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/js/ui/jquery.matchHeight-min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/js/ui/screenfull.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/js/extensions/pace.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/app-menu.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/app.js') }}" type="text/javascript"></script>
</body>
</html>
