@extends('front.front')

@section('content')
    <section class="index_first">
        <div class="image">
            <img src="{{ asset('assets/images/'.$setting['main_bg']) }}" alt="">
        </div>
        <h3>
            @if (app()->getLocale() === 'az')
                {{strtoupper($about['slogan_az'])}}
            @elseif (app()->getLocale() === 'en')
                {{strtoupper($about['slogan_en'])}}
            @else
                {{strtoupper($about['slogan_ru'])}}
            @endif
        </h3>
    </section>
    {{--    <div class="populars_block" style="background-color:#13233B;">--}}
    {{--        <div>--}}
    {{--            <h3><span>{{ __('setting.popular_projects') }}</span></h3>--}}
    {{--            <div class="popular_carousel">--}}
    {{--                @foreach($projects as $project)--}}
    {{--                    <figure>--}}
    {{--                        <div class="image">--}}
    {{--                            <a href="{{ route('front.project',$project['slug']) }}">--}}
    {{--                                <img src="{{ url("/assets/images/projects/".$project->image) }}" style="width:376px;"--}}
    {{--                                     alt="Title"/>--}}
    {{--                            </a>--}}
    {{--                        </div>--}}
    {{--                        <figcaption>--}}

    {{--                            <h3 style="text-align:left;margin:0;"><a--}}
    {{--                                    href="{{ route('front.project',$project['slug']) }}">{{ $project->title }}</a></h3>--}}
    {{--                            <p>{{ $project->total_area }} m²</p>--}}
    {{--                        </figcaption>--}}
    {{--                    </figure>--}}
    {{--                @endforeach--}}
    {{--            </div>--}}
    {{--            <div class="all_link">--}}
    {{--                <a href="/projects/">{{ __('setting.show_all_projects') }}</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="about_new">
        <div class="about_block">
            <h3><span>{{ __('setting.menu.about') }}</span></h3>
        </div>
        <div>
            <div class="about_left">
                <img src="{{ url('assets/images/'.$about['image']) }}" alt="acob.az haqqinda , tikinti , inshaat"
                     style="width: 100%;">
                <div class="link">
                    <a href="/about/">{{ __('setting.show_more') }}</a>
                </div>
            </div>
            <div class="text">
                @if (app()->getLocale() === 'az')
                    {!! substr($about['content_az'],0,600).'...' !!}
                @elseif (app()->getLocale() === 'en')
                    {!! substr($about['content_en'],0,600).'...' !!}
                @else
                    {!! substr($about['content_ru'],0,600).'...' !!}
                @endif
            </div>
        </div>
    </div>
    {{--    <section id="portfolio" class="no-top no-bottom" data-bgcolor="#252525" aria-label="section-portfolio">--}}
    {{--        <div class="container">--}}

    {{--            <div class="spacer-single"></div>--}}

    {{--            <div class="row">--}}
    {{--                <div class="col-md-12 text-center">--}}


    {{--                    <h3 class="one_topik">--}}
    {{--                        <span>{{ __('setting.portfolio') }}</span>--}}
    {{--                    </h3>--}}

    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <!-- portfolio filter close -->--}}


    {{--            <style>--}}
    {{--                .showyourself {--}}
    {{--                    max-height: 920px !important;--}}
    {{--                    overflow: hidden !important--}}
    {{--                }--}}
    {{--            </style>--}}
    {{--            <div id="gallery" class="index">--}}
    {{--                @foreach($portfolios as $portfolio)--}}
    {{--                    <div class="col-md-4 col-sm-6 col-xs-12 item mb30 residential otaq">--}}
    {{--                        <div class="picframe" style="background-size: cover;">--}}
    {{--                            <a class="" href="#">--}}
    {{--                        <span class="overlay">--}}
    {{--                            <span class="pf_text">--}}

    {{--                            </span>--}}
    {{--                        </span>--}}
    {{--                            </a>--}}
    {{--                            <img src="{{ url('assets/images/projects/'.$portfolio->images[0]['image']) }}"--}}
    {{--                                 alt="portfolio" class="img-responsive">--}}
    {{--                        </div>--}}

    {{--                        <span class="project-name">{{ $portfolio['title'] }}</span>--}}
    {{--                    </div>--}}
    {{--                @endforeach--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="gallery_link">--}}
    {{--            <a href="/portfolio/">{{ __('setting.show_all_works') }}</a>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <section id="section-fun-facts" class="side-bg no-padding text-light">
        <div class="container">
            <div class="row">
                <div class="inner-padding">
                    <div>
                        <h4 class="one_topik" style="color:#000;"><span>{{ __('setting.partners') }}</span></h4>
                        <div class="spacer-single"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="row" style="margin-left: 10px;text-align: center;">
                            @foreach($partners as $partner)
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <a href="{{ $partner['link'] }}" target="_blank">
                                        <img style="width: 171px" class="img-responsive"
                                             src="{{ url('assets/images/partners/'.$partner['img']) }}"
                                             alt="partner"/>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
