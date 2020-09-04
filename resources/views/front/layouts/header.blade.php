@php
    use App\About;use App\Setting;
    $about = About::find(1);
    $set = Setting::find(1);
@endphp
<style>
    .social_media {
        display: none;
    }

    @media only screen and (max-width: 600px) {

        .social_media {
            display: block !important;
        }

        .inner-body {
            width: 100% !important;
        }

        .footer {
            width: 100% !important;
        }
    }
</style>
<header class="" style="
background-color: #13233B;
margin-bottom: 12px;
/*background-image: url('../images/ruler.png');*/
/*background-repeat: repeat-x;*/
">
    <div class="header_first">
        <div>
            <div class="left_head">
                <div class="mail">
                    <a href="mailto:{{ $set['email'] }}">{{ $set['email'] }}</a>
                </div>
                @if($set['home_phone'])
                    <div class="mobile" style="margin-left: 20px;">
                        <a href="tel:{{ $set['home_phone'] }}">{{ $set['home_phone'] }}</a>
                    </div>
                @endif
                @if($set['mobile_phone'])
                    <div class="phone" style="margin-left: 20px;">
                        <a href="tel:{{ $set['mobile_phone'] }}">{{ $set['mobile_phone'] }}</a>
                    </div>
                @endif
                <div class="hours">
                    <time>{{ $set['work_times'] }}</time>
                </div>
                <div style="margin-left: 30px;">
                    <a target="_blank" href="{{ $about['fb_url'] }}" style="text-decoration: none;">
                        <img style="margin-left: 5px;cursor:pointer;" src="{{ asset('front/images/facebook.png') }}"
                             alt="">
                    </a>
                    <a target="_blank" href="{{ $about['instagram_url'] }}" style="text-decoration: none;">
                        <img style="margin-left: 5px;cursor:pointer;" src="{{ asset('front/images/instagram.png') }}"
                             alt="">
                    </a>
                    <a target="_blank" href="{{ $about['youtube_url'] }}" style="text-decoration: none;">
                        <img style="margin-left: 6px;cursor:pointer;" src="{{ asset('front/images/youtube.png') }}"
                             alt="">
                    </a>
                    <a target="_blank" href="{{ $about['pinterest_url'] }}" style="text-decoration: none;">
                        <img style="margin-left: 6px;cursor:pointer;width: 24px;" src="{{ asset('front/images/pinterest_img.png') }}"
                             alt="">
                    </a>
                    {{--                    <a target="_blank" href="https://api.whatsapp.com/send?phone=+994552293602&text=&source=&data="--}}
                    {{--                       style="text-decoration: none;">--}}
                    {{--                        <img style="margin-left: 6px;cursor:pointer;" src="{{ asset('front/images/whatsapp.png') }}"--}}
                    {{--                             alt="">--}}
                    {{--                    </a>--}}
                </div>
            </div>
            <div class="lang">
                @if (app()->getLocale() === "az")
                    <a href="{{ route('change_lang','en') }}">
                        <img style="width: 30px;height: 20px;" src="{{ asset('front/images/flag-en.png') }}"
                             alt="en flag">
                    </a><a
                        href="{{ route('change_lang','ru') }}">
                        <img style="width: 30px;height: 20px;" src="{{ asset('front/images/flag-ru.png') }}"
                             alt="ru flag">
                    </a>
                @elseif(app()->getLocale() === "ru")
                    <a href="{{ route('change_lang','az') }}">
                        <img style="width: 30px;height: 20px;" src="{{ asset('front/images/flag-az.png') }}"
                             alt="az flag">
                    </a><a
                        href="{{ route('change_lang','en') }}">
                        <img style="width: 30px;height: 20px;" src="{{ asset('front/images/flag-en.png') }}"
                             alt="en flag">
                    </a>
                @else
                    <a href="{{ route('change_lang','az') }}">
                        <img style="width: 30px;height: 20px;" src="{{ asset('front/images/flag-az.png') }}"
                             alt="az flag">
                    </a><a
                        href="{{ route('change_lang','ru') }}">
                        <img style="width: 30px;height: 20px;" src="{{ asset('front/images/flag-ru.png') }}"
                             alt="ru flag">
                    </a>
                @endif
            </div>
        </div>
    </div>
    {{--    <div class="header_first_mobile" style="display: none;">--}}
    {{--        <div style="display: flex;">--}}
    {{--            <div class="left_head" style="display: block;">--}}
    {{--                <div class="mail">--}}
    {{--                    <a href="mailto:{{ $setting['email'] }}">{{ $setting['email'] }}</a>--}}
    {{--                </div>--}}
    {{--                <div class="mobile">--}}
    {{--                    <a href="tel:{{ $setting['home_phone'] }}">{{ $setting['home_phone'] }}</a>--}}
    {{--                </div>--}}
    {{--                <div class="phone">--}}
    {{--                    <a href="tel:{{ $setting['mobile_phone'] }}">{{ $setting['mobile_phone'] }}</a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div>--}}
    {{--                <div class="hours">--}}
    {{--                    <time style="--}}
    {{--        font-size: 13px;--}}
    {{--        font-weight: 600;--}}
    {{--        text-decoration: none;--}}
    {{--        color: rgba(255, 255, 255, 0.65);">{{ $setting['work_times'] }}</time>--}}
    {{--                </div>--}}
    {{--                <div style="margin-left: -10px;display: flex;">--}}
    {{--                    <a href="{{ $setting['fb_url'] }}" style="text-decoration: none;">--}}
    {{--                        <img style="margin-left: 5px;cursor:pointer;" src="{{ asset('front/images/facebook.png') }}"--}}
    {{--                             alt="">--}}
    {{--                    </a>--}}
    {{--                    <a href="{{ $setting['twitter_url'] }}" style="text-decoration: none;">--}}
    {{--                        <img style="margin-left: 5px;cursor:pointer;" src="{{ asset('front/images/instagram.png') }}"--}}
    {{--                             alt="">--}}
    {{--                    </a>--}}
    {{--                    --}}{{--                        <a href="{{ $setting['twitter_url'] }}" style="text-decoration: none;">--}}
    {{--                    --}}{{--                            <img style="margin-left: 6px;cursor:pointer;" src="{{ asset('front/images/youtube.png') }}"--}}
    {{--                    --}}{{--                                 alt="">--}}
    {{--                    --}}{{--                        </a>--}}
    {{--                    --}}{{--                        <a target="_blank" href="https://api.whatsapp.com/send?phone=+994552293602&text=&source=&data="--}}
    {{--                    --}}{{--                           style="text-decoration: none;">--}}
    {{--                    --}}{{--                            <img style="margin-left: 6px;cursor:pointer;" src="{{ asset('front/images/whatsapp.png') }}"--}}
    {{--                    --}}{{--                                 alt="">--}}
    {{--                    --}}{{--                        </a>--}}
    {{--                </div>--}}
    {{--                --}}{{--                    <div class="lang">--}}
    {{--                --}}{{--                        @if (app()->getLocale() === "az")--}}
    {{--                --}}{{--                            <a href="{{ route('change_lang','en') }}">EN</a><a href="{{ route('change_lang','ru') }}">RU</a>--}}
    {{--                --}}{{--                        @elseif(app()->getLocale() === "ru")--}}
    {{--                --}}{{--                            <a href="{{ route('change_lang','az') }}">AZ</a><a href="{{ route('change_lang','en') }}">EN</a>--}}
    {{--                --}}{{--                        @else--}}
    {{--                --}}{{--                            <a href="{{ route('change_lang','az') }}">AZ</a><a href="{{ route('change_lang','ru') }}">RU</a>--}}
    {{--                --}}{{--                        @endif--}}
    {{--                --}}{{--                    </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="container">
        <div class="row menu_for">
            <div class="col-md-12">
                <!-- logo begin -->
                <div id="logo">
                    <a href="/" class="navbar-brand nav-link"
                       style="    font-size: 25px;
    font-weight: bold;
    color: #b09658;
    border: 1px solid #b09658;
    padding: 7px 28px 28px;
    z-index: 9;
    margin-top: 16px;
    margin-left: 4px;">
                        ACOB
                    </a>
                    {{--                    <a href="/">--}}
                    {{--                        <img class="logo" src="{{ asset('assets/images/'.$setting['logo']) }}" alt="nlogo"--}}
                    {{--                             style="width: 120px;height: 70px;">--}}
                    {{--                    </a>--}}
                </div>
                <div id="mobile-lang" style="display:none;">
                    @if (app()->getLocale() === "az")
                        <a href="{{ route('change_lang','en') }}">
                            <img style="width: 30px;height: 20px;" src="{{ asset('front/images/flag-en.png') }}"
                                 alt="en flag">
                        </a><a
                            href="{{ route('change_lang','ru') }}">
                            <img style="width: 30px;height: 20px;" src="{{ asset('front/images/flag-ru.png') }}"
                                 alt="ru flag">
                        </a>
                    @elseif(app()->getLocale() === "ru")
                        <a href="{{ route('change_lang','az') }}">
                            <img style="width: 30px;height: 20px;" src="{{ asset('front/images/flag-az.png') }}"
                                 alt="az flag">
                        </a><a
                            href="{{ route('change_lang','en') }}">
                            <img style="width: 30px;height: 20px;" src="{{ asset('front/images/flag-en.png') }}"
                                 alt="en flag">
                        </a>
                    @else
                        <a href="{{ route('change_lang','az') }}">
                            <img style="width: 30px;height: 20px;" src="{{ asset('front/images/flag-az.png') }}"
                                 alt="az flag">
                        </a><a
                            href="{{ route('change_lang','ru') }}">
                            <img style="width: 30px;height: 20px;" src="{{ asset('front/images/flag-ru.png') }}"
                                 alt="ru flag">
                        </a>
                    @endif
                </div>
                <span id="menu-btn" style="z-index: 9">
                    <i style="font-size: 28px;" class="fa fa-bars"></i>
                </span>
                <nav style="float:left;">
                    <ul id="mainmenu">
                        {{--                        <li>--}}
                        {{--                            <a href="/">{{ __('setting.menu.home') }}</a>--}}
                        {{--                        </li>--}}
                        {{--                        <li id="lang_for_mobile">--}}
                        {{--                            <div class="lang" style="display: flex;">--}}
                        {{--                                @if (app()->getLocale() === "az")--}}
                        {{--                                    <a href="{{ route('change_lang','en') }}">EN</a><a--}}
                        {{--                                        href="{{ route('change_lang','ru') }}">RU</a>--}}
                        {{--                                @elseif(app()->getLocale() === "ru")--}}
                        {{--                                    <a href="{{ route('change_lang','az') }}">AZ</a><a--}}
                        {{--                                        href="{{ route('change_lang','en') }}">EN</a>--}}
                        {{--                                @else--}}
                        {{--                                    <a href="{{ route('change_lang','az') }}">AZ</a><a--}}
                        {{--                                        href="{{ route('change_lang','ru') }}">RU</a>--}}
                        {{--                                @endif--}}
                        {{--                            </div>--}}
                        {{--                        </li>--}}
                        <li>
                            <a href="/about/">{{ __('setting.menu.about') }}</a>
                        </li>
                        <li>
                            <a href="/projects/">{{ __('setting.menu.projects') }}</a>
                        </li>
                        <li>
                            <a style="cursor: pointer;"
                               id="parent_menular">{{ __('setting.menu.prepared_projects') }}</a>
                            <ul id="alt_menular" style="display: none;">
                                <li><a href="/prepared-projects/apartments">{{ __('setting.menu.menziller') }}</a></li>
                                <li><a href="/prepared-projects/backyard-houses">{{ __('setting.menu.bagevler') }}</a>
                                </li>
                            </ul>
                        </li>
                        {{--                        <li>--}}
                        {{--                            <a href="/portfolios/">{{ __('setting.menu.works') }}</a>--}}
                        {{--                        </li>--}}
                        <li>
                            <a href="/designs/">{{ __('setting.menu.design') }}</a>
                        </li>
                        {{--                        <li>--}}
                        {{--                            <a href="/faq/">{{ __('setting.menu.tss') }}</a>--}}
                        {{--                        </li>--}}
                        <li>
                            <a href="/career/">{{ __('setting.menu.career') }}</a>
                        </li>
                        <li>
                            <a href="/contacts/">{{ __('setting.menu.contact') }}</a>
                        </li>
                        <li>
                            <div class="social_media">
                                <div class="row">
                                    <div class="col-xs-7">
                                        <a id="social_media" style="cursor: pointer;
    text-align: left;
    font-size: 15px;
   margin-left: 10px;">{{ trans('setting.menu.social_media') }}</a>
                                    </div>
                                    <div class="col-xs-5" style="display: flex;">
                                        <a target="_blank" href="{{ $about['fb_url'] }}"
                                           style="margin-right: -25px;text-decoration: none;">
                                            <img style="margin-left: 5px;cursor:pointer;"
                                                 src="{{ asset('front/images/facebook.png') }}"
                                                 alt="">
                                        </a>
                                        <a target="_blank" href="{{ $about['instagram_url'] }}"
                                           style="margin-right: -25px;text-decoration: none;">
                                            <img style="margin-left: 5px;cursor:pointer;"
                                                 src="{{ asset('front/images/instagram.png') }}"
                                                 alt="">
                                        </a>
                                        <a target="_blank" href="{{ $about['youtube_url'] }}"
                                           style="text-decoration: none;">
                                            <img style="margin-left: 6px;cursor:pointer;"
                                                 src="{{ asset('front/images/youtube.png') }}"
                                                 alt="">
                                        </a>
                                        <a target="_blank" href="{{ $about['pinterest_url'] }}" style="text-decoration: none;margin-left: -24px;">
                                            <img style="margin-left: 6px;cursor:pointer;width: 24px;" src="{{ asset('front/images/pinterest_img.png') }}"
                                                 alt="">
                                        </a>
                                    </div>
                                    {{--                                <div id="sub_medias" style="margin-bottom: 10px;">--}}
                                    {{--                                    <a href="{{ $setting['fb_url'] }}"--}}
                                    {{--                                       style="width:10% !important; text-decoration: none;">--}}
                                    {{--                                        <img style="margin-left: 5px;cursor:pointer;"--}}
                                    {{--                                             src="{{ asset('front/images/facebook.png') }}"--}}
                                    {{--                                             alt="">--}}
                                    {{--                                    </a>--}}
                                    {{--                                    <a href="{{ $setting['twitter_url'] }}"--}}
                                    {{--                                       style="width:10% !important; text-decoration: none;">--}}
                                    {{--                                        <img style="margin-left: 5px;cursor:pointer;"--}}
                                    {{--                                             src="{{ asset('front/images/instagram.png') }}"--}}
                                    {{--                                             alt="">--}}
                                    {{--                                    </a>--}}
                                    {{--                                    <a href="{{ $setting['twitter_url'] }}"--}}
                                    {{--                                       style="width:10% !important; text-decoration: none;">--}}
                                    {{--                                        <img style="margin-left: 6px;cursor:pointer;"--}}
                                    {{--                                             src="{{ asset('front/images/youtube.png') }}"--}}
                                    {{--                                             alt="">--}}
                                    {{--                                    </a>--}}
                                    {{--                                <a target="_blank"--}}
                                    {{--                                   href="https://api.whatsapp.com/send?phone=+994552293602&text=&source=&data="--}}
                                    {{--                                   style="width:10% !important; text-decoration: none;">--}}
                                    {{--                                    <img style="margin-left: 6px;cursor:pointer;"--}}
                                    {{--                                         src="{{ asset('front/images/whatsapp.png') }}"--}}
                                    {{--                                         alt="">--}}
                                    {{--                                </a>--}}
                                    {{--                                </div>--}}

                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
