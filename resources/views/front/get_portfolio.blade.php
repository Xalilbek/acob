@extends('front.front')
@section('content')
    <style>
        .image_container {
            width: 100%;
            height: 300px;
            background-size: 100%;
            background-repeat: no-repeat;
        }
        .mfp-container .mfp-img {
            width: 1000px;
            height: 1000px;
        }
    </style>
    <section id="subheader" data-speed="8" data-type="background"
             style="background-position: 50% 0px;background-image:url('')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $portfolio['title'] }}</h1>
                    <ul class="crumb">
                        <li><a href="/">{{ __('setting.menu.home') }}</a></li>
                        <li class="sep">/</li>
                        <li><a href="/portfolios/">{{ __('setting.menu.works') }}</a></li>
                        <li class="sep">/</li>
                        <li><a href="javascript:void(0)">{{ $portfolio['slug'] }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="elavesekiller">
        <div class="container">
            <h3 style="
                font-size: 32px;
                margin: 0;
                text-align: center;
                letter-spacing: 2px;
                text-transform: uppercase;
                font-weight: 300;
                display:block;">
                {{ __('setting.other_images') }}
            </h3>
            <div class="spacer-single"></div>
            <div id="gallery" class="long_portfolio gallery full-gallery de-gallery pf_4_cols wow fadeInUp"
                 data-wow-delay=".3s">
                <!-- gallery item -->
                @foreach($portfolio->images as $image)
                    <div class="col-md-4 col-sm-6 col-xs-12 item mb30 residential">
                        <div class="picframe">
                            <a class="image-popup-gallery" href="{{ url('assets/images/projects/'.$image['image']) }}">
                        <span class="overlay">
                            <span class="pf_text">
                                <span class="project-name">{{ $portfolio['title'] }}</span>
                            </span>
                        </span>
                            </a>
                            <img src="{{ url('assets/images/projects/'.$image['image']) }}" class="img-responsive"
                                 alt="{{ $portfolio['title'] }} {{ __('setting.project') }}">
                        </div>
                    </div>
            @endforeach
            <!-- close gallery item -->
            </div>
            <div class="spacer-single"></div>
        </div>
    </section>
@endsection
