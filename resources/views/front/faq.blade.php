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
            text-transform: uppercase;">{{ __('setting.menu.tss') }}</span>
                    <ul class="crumb">
                        <li><a href="/">{{ __('setting.menu.home') }}</a></li>
                        <li class="sep">/</li>
                        <li>{{ __('setting.menu.tss') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="section-faq">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="expand-group">
                        @foreach($questions as $question)
                            <div class="expand">

                                <h4>{{$question['title']}}<i class="fas fa-angle-down"></i></h4>

                                <div class="hidden-content">{{ $question['content'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
