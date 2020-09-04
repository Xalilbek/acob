@extends('front.front')
@section('content')
    <style>
        .image_container {
            width: 100%;
            height: 300px;
            background-size: 100%;
            background-repeat: no-repeat;
        }

        .pagination > .active > span {
            padding: 15px 20px !important;
            margin-top: 3px !important;
        }

        .pagination > .disabled > span {
            padding: 15px 20px !important;
            margin: 3px !important;
            background: none;
            border: 1px solid #404040
        }

        .pagination > .disabled > span:hover {
            background: none;
            border: 1px solid #404040
        }
    </style>
    <section id="subheader" data-speed="8" data-type="background"
             style="background-position: 50% 0px;background-image:url('')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $project['title'] }} {{ __('setting.project') }}</h1>
                    <ul class="crumb">
                        <li><a href="/">{{ __('setting.menu.home') }}</a></li>
                        <li class="sep">/</li>
                        <li><a href="/projects/">{{ __('setting.menu.projects') }}</a></li>
                        <li class="sep">/</li>
                        <li>{{ $project['title'] }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


{{--    <script>--}}
{{--        var pro_obj = {--}}
{{--            id:{{ $project['id'] }},--}}
{{--            title: '{{ $project['title'] }}',--}}
{{--            url: '/projects/{{ $project['slug'] }}/',--}}
{{--            image: '{{ url('assets/images/projects/'.$project['image']) }}',--}}
{{--            category: '{{ $project['total_area'] }} m2',--}}
{{--            cash:{{ $project['price'] }}};--}}
{{--    </script>--}}


    <section id="section-about-us-2" class="side-bg no-padding">
        <div class="container">
            <div class="row">
                <div class="inner-padding project_first">
                    <div class="col-md-6 col-sm-12" data-animation="fadeInRight" data-delay="200">
                        <div class="image" data-delay="0">
                            <img src="{{ url('assets/images/projects/'.$project['image']) }}"
                                 alt="{{ $project['title'] }} {{ __('setting.project') }}">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12" data-animation="fadeInRight" data-delay="200">
                        <div class="infos"></div>
                        <h3 class="new_font">{{ __('setting.info') }}</h3>
                        <table class="table table-bordered" style="margin-top:30px;">
                            <tr>
                                <th>{{ __('setting.area') }}</th>
                                <td>{{ $project['total_area'] }} m<sup>2</sup></td>
                            </tr
                            <tr>
                                <th>{{ __('setting.used_area') }}</th>
                                <td>{{ $project['used_area'] }} m<sup>2</sup></td>
                            </tr>
                            <tr>
                                <th>{{ __('setting.room_count') }}</th>
                                <td>{{ $project['room_count'] }} </td>
                            </tr>
                            <tr>
                                <th>{{ __('setting.cash') }}</th>
                                <td>{{ $project['cash'] }} AZN</td>
                            </tr>
                            <tr>
                                <th>{{ __('setting.price') }}</th>
                                <td>{{ $project['price'] }} AZN</td>
                            </tr>
                            <tr>
                                <th>{{ __('setting.payment_time') }}</th>
                                <td>{{ $project['payment_time'] }} ay</td>
                            </tr>
                            <tr>
                                <th>{{ __('setting.first_payment') }}</th>
                                <td>{{ $project['first_payment'] }} AZN</td>
                            </tr>
                            <tr>
                                <th>{{ __('setting.payment_monthly') }}</th>
                                <td>{{ $project['monthly_payment'] }} AZN</td>
                            </tr>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>

    <section id="elavesekiller">
        <div class="container">
            <h3 style="font-size: 32px;

            margin: 0;

            text-align: center;

            letter-spacing: 2px;

            text-transform: uppercase;

            font-weight: 300;display:block;margin:0 auto;">{{ __('setting.other_images') }}</h3>
            <div class="spacer-single"></div>
            <div id="gallery" class="long_portfolio gallery full-gallery de-gallery pf_4_cols wow fadeInUp"
                 data-wow-delay=".3s">
                <!-- gallery item -->
                @foreach($project->projectImages as $image)
                    <div class="col-md-4 col-sm-6 col-xs-12 item mb30 residential">
                        <div class="picframe">
                            <a class="image-popup-gallery" href="{{ url('assets/images/projects/'.$image['image']) }}">
                        <span class="overlay">
                            <span class="pf_text">
                                <span class="project-name">{{ $project['title'] }}</span>
                            </span>
                        </span>
                            </a>
                            <img src="{{ url('assets/images/projects/'.$image['image']) }}" class="img-responsive"
                                 alt="{{ $project['title'] }} {{ __('setting.project') }}"
                                 style="width: auto !important;height: auto !important;"
                            >
                        </div>
                    </div>
            @endforeach
            <!-- close gallery item -->
            </div>
            {{--            <h3 style="font-size: 32px;--}}

            {{--                        margin: 0;--}}

            {{--                        text-align: center;--}}

            {{--                        letter-spacing: 2px;--}}

            {{--                        text-transform: uppercase;--}}

            {{--                        font-weight: 300;display:block;margin:0 auto;">{{ __('setting.project') }}</h3>--}}
            <div class="spacer-single"></div>

            @if (count($project->projectDescriptions) > 0)
                <section id="tesnifat">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <h3 class="single_padding">{{ __('setting.classification') }}</h3>
                            <table class="table table-bordered" style="margin-bottom: 0;">
                                <tbody>
                                @foreach($project->projectDescriptions as $key => $desc)
                                    <tr>
                                        <td>{{ $desc['name'] }}</td>
                                        <td>{{ $desc['value'] }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            @endif
            {{--            <div id="gallery_2" class="designo gallery full-gallery de-gallery pf_4_cols wow fadeInUp"--}}
            {{--                 data-wow-delay=".3s">--}}
            {{--                <!-- gallery item -->--}}
            {{--                @foreach($project->projectSketches as $image)--}}
            {{--                    <div class="col-md-4 col-sm-6 col-xs-12 item mb30 residential">--}}
            {{--                        <div class="picframe">--}}
            {{--                            <a class="image-popup-gallery"--}}
            {{--                               href="{{ url('assets/images/projects/'.$image['image']) }}">--}}
            {{--                                <span class="overlay"></span>--}}
            {{--                            </a>--}}
            {{--                            <img src="{{ url('assets/images/projects/'.$image['image']) }}" class="img-responsive"--}}
            {{--                                 alt="{{ $project['title'] }} {{ __('setting.project') }}">--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                @endforeach--}}
            {{--            <!-- close gallery item -->--}}
            {{--            </div>--}}
        </div>

    </section>

    <section id="portfolio" class="no-top no-bottom">
        <div class="container">
            <h3 style="font-size: 32px;
                    text-align: center;
                    letter-spacing: 2px;
                    text-transform: uppercase;
                    font-weight: 300;display:block;">{{ __('setting.other_projects') }}</h3>
            <div class="spacer-single"></div>
            <div id="gallery"
                 class="long_gallery gallery full-gallery de-gallery pf_4_cols wow fadeInUp no_carousel animated"
                 data-wow-delay=".3s"
                 style="margin-top: 50px; visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp; position: relative; height: auto; opacity: 500;"
                 bis_skin_checked="1">
                @foreach($projects as $project)
                    <div class="col-md-4 col-sm-6 col-xs-12 item mb30 residential">
                        <div class="picframe" style="background-color: rgb(19, 35, 59);width: 365px;height: 214px;">
                            <a class="" href="{{ route('front.project',$project['slug']) }}">
                            <span class="overlay">
                                <span class="pf_text">
                                    {{ $project['title'] }}
                                </span>
                            </span>
                            </a>
                            <img class="img-responsive"
                                 src="{{ url("/assets/images/projects/".$project['image']) }}"
                                 alt="EV TİKİNTİ LAYİHƏSİ">
                        </div>
                        <span class="project-name">{{ $project['title'] }}</span>
                        <span class="">{{ $project['total_area'] }} m<sup>2</sup></span> /
                        <span class="">{{ $project['room_count'] }} otaq</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
