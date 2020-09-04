@extends('front.front')
@section('content')
    <section id="subheader" data-speed="8" data-type="background"
             style="background-position: 50% 0px;background-image:url('{{ asset('front/images/underground-construction-bg.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $type === 0 ? __('setting.menu.menziller') : __('setting.menu.bagevler')}}</h1>
                    <ul class="crumb">
                        <li><a href="/">{{ __('setting.menu.home') }}</a></li>
                        <li class="sep">/</li>
                        <li>{{ __('setting.menu.prepared_projects') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <form action="" method="GET">
        <div class="main_filtr">
            <div class="container filtr_block">
                <div class="sub_filtr">
                    <span>{{ __('setting.for_area') }}</span>
                    <div class="subf">
                        <input type="text" placeholder="Min m2" value="{{ request('area_min') }}" name="area_min">
                        <input type="text" placeholder="Max m2" value="{{ request('area_max') }}" name="area_max" style="margin-left: 10px;">
                    </div>
                </div>
                <div class="sub_filtr">
                    <span>{{ __('setting.for_price') }}</span>
                    <div class="subf">
                        <input type="text" placeholder="Min" value="{{ request('price_min') }}" name="price_min">
                        <input type="text" placeholder="Max" value="{{ request('price_max') }}" name="price_max" style="margin-left: 10px;">
                    </div>
                </div>
                <div class="sub_filtr">
                    <select id="mounth" name="room">
                        <option value="0">{{ __('setting.for_room_count') }}</option>
                        <option value="1" rel="icon-temperature">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                </div>
                <div class="sub_filtr">
                    <div class="subf">
                        <input type="submit" value="{{ __('setting.search') }}" name="axtar" style="width: 100%;">
                    </div>
                </div>
                <script>
                    var img_html = "{{ asset('front/images/arrow_d1.svg') }}";
                </script>
            </div>
        </div>
    </form>

    <section id="portfolio" class="no-top no-bottom">
        <div class="container">
            <hr>
            <div style="width:100%;" class="siralama">
                <div class="select">
                    <div class="select-styled">
                        {{ __('setting.order') }}
                    </div>
                    <ul class="select-options">
                        <li rel="hide">{{ __('setting.order') }}</li>
                        <li rel="1"><a href="{{ route('front.projects',['area_order' => 'desc']) }}">{{ __('setting.area_desc') }}</a></li>
                        <li rel="2"><a href="{{ route('front.projects',['area_order' => 'asc']) }}">{{ __('setting.area_asc') }}</a></li>
                        <li rel="3"><a href="{{ route('front.projects',['price_order' => 'desc']) }}">{{ __('setting.price_desc') }}</a></li>
                        <li rel="4"><a href="{{ route('front.projects',['price_order' => 'asc']) }}">{{ __('setting.price_asc') }}</a></li>
                    </ul>
                    <img class="select_image" src="{{ asset('front/images/arrow_d1.svg') }}">
                </div>
            </div>
            <div class="spacer-single"></div>
            <div id="gallery" class="long_gallery gallery full-gallery de-gallery pf_4_cols wow fadeInUp no_carousel"
                 data-wow-delay=".3s" style="margin-top:50px;">
                @foreach($projects as $project)
                    <div class="col-md-4 col-sm-6 col-xs-12 item mb30 residential">
                        <div class="picframe">
                            <a class="" href="{{ route('front.project',$project['slug']) }}">
                            <span class="overlay">
                                <span class="pf_text">
                                    {{ $project['title'] }}
                                </span>
                            </span>
                            </a>
                            <img class="img-responsive" src="{{ url("/assets/images/projects/".$project['image']) }}"
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
    <div style="text-align: center;background-color:#13233B;">
        {{$projects->links('vendor.pagination.bootstrap-4')}}
    </div>
@endsection
