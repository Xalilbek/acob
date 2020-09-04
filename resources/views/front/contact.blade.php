@extends('front.front')

@section('content')
    <section id="subheader" data-speed="8" data-type="background"
             style="background-position: 50% 0px;background-image:url('{{ asset('front/images/int_bg.png') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ __('setting.menu.contact') }}</h1>
                    <ul class="crumb">
                        <li><a href="/">{{ __('setting.menu.home') }}</a></li>
                        <li class="sep">/</li>
                        <li>{{ __('setting.menu.contact') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div id="content" class="no-top">
        <div class="container" style="padding-top:60px;">
            <div class="row" style=" text-align: center;">
                <div class="col-md-8">
                    <div class="mapouter" style="height: 400px;
    width: 100%;">
                        <div class="gmap_canvas" style="height: 400px;
    width: 100%;">
                            <iframe width="600" height="500" id="gmap_canvas"
                                    src="https://maps.google.com/maps?q=%20%C3%87inar%20Plaza%20106A%20Heyd%C9%99r%20%C6%8Fliyev%20prospekti%2C%20Bak%C4%B1&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            <a href="https://www.thevpncoupons.com"></a></div>
                        <style>.mapouter {
                                position: relative;
                                /*text-align: right;*/
                                height: 500px;
                                width: 600px;
                            }

                            .gmap_canvas {
                                overflow: hidden;
                                background: none !important;
                                height: 500px;
                                width: 600px;
                            }</style>
                    </div>
                </div>
                <div id="sidebar" class="col-md-4">
                    <div class="widget widget_text">
                        <h3>{{ __('setting.menu.contact') }}</h3>
                        <address style="font-family: 'Montserrat', sans-serif;">
                            <span>{{ $setting['location'] }}</span>
                            <span><strong>Tel: </strong>{{ $setting['home_phone'] }}</span>
                            <span><strong>Mobil: </strong>{{ $setting['mobile_phone'] }}</span>
                            <span><strong>Email: </strong><a
                                    href="mailto:{{ $setting['email'] }}">
                                    {{ $setting['email'] }}
                                </a></span>
                            <span><strong>İş Saatları: </strong>
                            {{ $setting['work_times'] }}
                            </span>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
