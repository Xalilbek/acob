@extends('front.front')
@section('content')
    <section id="subheader" data-speed="8" data-type="background"
             style="background-position: 50% 0px;background-image:url('{{ asset('front/images/underground-construction-bg.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <span style="    color: #eceff3;
    margin-top: 80px;
    font-size: 32px;
    letter-spacing: 5px;
    float: left;
    padding-right: 40px;
    margin-right: 40px;
    text-transform: uppercase;">{{ __('setting.menu.design') }}</span>
                    <ul class="crumb">
                        <li><a href="/">{{ __('setting.menu.home') }}</a></li>
                        <li class="sep">/</li>
                        <li>{{ __('setting.menu.design') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="portfolio" class="no-top no-bottom">
        <div class="container">
            <div class="spacer-single"></div>
            <div id="gallery" style="margin-top:50px;"
                 class="long_portfolio row gallery full-gallery de-gallery pf_4_cols wow fadeInUp animated no_carousel"
                 data-wow-delay=".3s">
                @foreach($designs as $design)
                    <div class="col-md-4 col-sm-6 col-xs-12 item mb30 residential"
                         style="position: absolute; left: 0px; top: 0px;">
                        <div class="picframe">
                            <a href="{{ route('front.design',$design['slug']) }}">
{{--                                    <span class="overlay" style="opacity: 0;">--}}
{{--                                        <span class="pf_text" style="margin-top: 106px;">--}}
{{--                                            <span--}}
{{--                                                class="project-name">{{ $design['title'] }}</span>--}}
{{--                                        </span>--}}
{{--                                    </span>--}}
                            </a>
                            <img src="{{ $design->getMainImage() }}" alt="designs" class="img-responsive"
                                 style="display: inline-block; margin-left: 0px; margin-top: 0px; overflow: hidden;">
                        </div>
                                                <span class="project-name" style="font-size: 13px !important;">{{ $design['title'] }}</span>
                    </div>
                @endforeach
{{--                @foreach($designs as $design)--}}
{{--                    <div class="col-md-4 col-sm-6 col-xs-12 item mb30 residential"--}}
{{--                         style="position: absolute; left: 0px; top: 0px;">--}}
{{--                        <div class="picframe" style="height: 239px;">--}}
{{--                            <a class="" href="{{ route('front.design',$design['slug']) }}">--}}
{{--                            <span class="overlay" style="opacity: 0; width: 350px; height: 239px;">--}}
{{--                                <span class="pf_text" style="margin-top: 80px;">--}}
{{--                                   {{ $design['title'] }}--}}
{{--                                </span>--}}
{{--                            </span>--}}
{{--                            </a>--}}
{{--                            <img class="img-responsive" src="{{ url("/assets/images/projects/".$design['image']) }}"--}}
{{--                                 alt="acob.az ev tikinti layihesi , {{ $design['title'] }}"--}}
{{--                                 style="width: 100%; height: 100%; margin-left: 0px; margin-top: 0px;">--}}
{{--                        </div>--}}
{{--                        <span class="project-name">{{ $design['title'] }}</span>--}}
{{--                        <span class="">{{ $design['total_area'] }} m<sup>2</sup></span> /--}}
{{--                        <span class="">{{ $design['room_count'] }} otaq</span>--}}
{{--                    </div>--}}
{{--                @endforeach    --}}

            </div>
        </div>
    </section>

    <div style="text-align: center;background-color:#13233B;">
        {{$designs->links('vendor.pagination.bootstrap-4')}}
    </div>
@endsection
