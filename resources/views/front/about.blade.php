@extends('front.front')

@section('content')
    <section id="subheader" data-speed="8" data-type="background"
             style="background-position: 50% 0px;background-image:url('{{ asset('front/images/underground-construction-bg.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <span style="color: #eceff3;
            margin-top: 80px;
            font-size: 32px;
            letter-spacing: 5px;
            float: left;
            padding-right: 40px;
            margin-right: 40px;
            text-transform: uppercase;">{{ __('setting.menu.about') }}</span>
                    <ul class="crumb">
                        <li><a href="/">{{ __('setting.menu.home') }}</a></li>
                        <li class="sep">/</li>
                        <li>{{ __('setting.menu.about') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section id="section-about-us-2" class="side-bg no-padding">
        <div class="row" style="padding: 20px; margin-right: 0% !important;
    margin-left: 0% !important;">

        <div class="col-md-5 pull-left" style="height: auto;">
            <img src="{{ url('assets/images/'.$about['image']) }}" alt="acob.az about page,tikinti,inshaat"
                 style="width:100%">
        </div>

        <div class="col-md-7" style="text-align: center">
                   <h2>
                            @if (app()->getLocale() === 'az')
                                {!! $about['title_az'] !!}
                            @elseif (app()->getLocale() === 'en')
                                {!! $about['title_en'] !!}
                            @else
                                {!! $about['title_ru'] !!}
                            @endif
                        </h2>

                        @if (app()->getLocale() === 'az')
                            {!! $about['content_az'] !!}
                        @elseif (app()->getLocale() === 'en')
                            {!! $about['content_en'] !!}
                        @else
                            {!! $about['content_ru'] !!}
                        @endif

                        <div class="clearfix"></div>

                    </div>
        </div>

    </section>
    <section id="section-faq">

        <div class="container" bis_skin_checked="1">

            <div class="row" bis_skin_checked="1">

                <div class="col-md-4" bis_skin_checked="1">

                    <div class="padding40" data-bgcolor="#232426" style="    background-color: rgb(19, 35, 59);
    border: 2px solid #b09658;" bis_skin_checked="1">

                        <h3 class="s2"><span class="id-color">{{ trans('setting.tss') }}</span></h3>

                    </div>

                </div>

                <div class="col-md-8" bis_skin_checked="1">
                    <div class="expand-group" bis_skin_checked="1">
                        @foreach($questions as $question)
                            <div class="expand">
                                <h4>{{$question['title']}}<i class="fa fa-angle-down"></i></h4>
                                <div class="hidden-content">{{ $question['content'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
