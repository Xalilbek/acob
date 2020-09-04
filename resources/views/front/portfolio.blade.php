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
    text-transform: uppercase;">{{ __('setting.menu.works') }}</span>
                    <ul class="crumb">
                        <li><a href="/">{{ __('setting.menu.home') }}</a></li>
                        <li class="sep">/</li>
                        <li>{{ __('setting.menu.works') }}</li>
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
                @foreach($portfolios as $port)
                    <div class="col-md-4 col-sm-6 col-xs-12 item mb30 residential"
                         style="position: absolute; left: 0px; top: 0px;">
                        <div class="picframe" style="height: 239px;">
                            <a href="{{ route('front.portfolio',$port['slug']) }}">
                                    <span class="overlay" style="opacity: 0; width: 360px; height: 239px;">
                                        <span class="pf_text" style="margin-top: 106px;">
                                            <span
                                                class="project-name">{{ $port['title'] }}</span>
                                        </span>
                                    </span>
                            </a>
                            <img src="{{ url('assets/images/projects/'.$port->images[0]['image']) }}" alt="portfolios" class="img-responsive"
                                 style="display: inline-block; margin-left: 0px; margin-top: 0px; overflow: hidden;">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div style="text-align: center;background-color:#13233B;">
        {{$portfolios->links('vendor.pagination.bootstrap-4')}}
    </div>
@endsection
