@php use App\Setting;$setting = Setting::find(1); @endphp
<div id="footer-mobile" style="display: none;">
    <div class="row">
        <div class="col-sm-6">
            <a href="mailto:{{ $setting['email'] }}"><i class="fa fa-envelope"></i> {{ $setting['email'] }}</a>
        </div>
        @if($setting['home_phone'])
            <div class="col-sm-6">
                <a href="tel:{{ $setting['home_phone'] }}"><i class="fa fa-phone"></i> {{ $setting['home_phone'] }}</a>
            </div>
        @endif
        @if($setting['mobile_phone'])
            <div class="col-sm-6">
                <a href="tel:{{ $setting['mobile_phone'] }}"><i
                        class="fa fa-mobile-phone"></i> {{ $setting['mobile_phone'] }}</a>
            </div>
        @endif
        <div class="col-sm-6">
            <time><i class="fa fa-clock-o"></i> {{ $setting['work_times'] }}</time>
        </div>
{{--        <div class="col-sm-6" style="margin-left: -8px;">--}}
{{--            <a href="{{ $setting['fb_url'] }}" style="text-decoration: none;">--}}
{{--                <img style="margin-left: 5px;cursor:pointer;" src="{{ asset('front/images/facebook.png') }}"--}}
{{--                     alt="">--}}
{{--            </a>--}}
{{--            <a href="{{ $setting['twitter_url'] }}" style="text-decoration: none;">--}}
{{--                <img style="margin-left: 5px;cursor:pointer;" src="{{ asset('front/images/instagram.png') }}"--}}
{{--                     alt="">--}}
{{--            </a>--}}
{{--        </div>--}}
    </div>
</div>
<script src="{{ asset('front/js/074a65c20de6104e63e3c7cf8794cfad6253044088.js?v=4') }}"></script>
<script src="{{ asset('front/js/3b448271794d487983e09548244e15ca3126522044.js?v=4') }}"></script>
<script src="{{ asset('front/js/352de0a16f6fc9f187a283e92b1d017e7816305110.js?v=4') }}"></script>
<script src="{{ asset('front/js/93376ea89a2d62dacd0c1ec67f5f22027816305110.js?v=5') }}"></script>
<script src="{{ asset('front/js/flickity.pkgd.min.js?v=2') }}"></script>
<script src="{{ asset('front/js/imagesloaded.pkgd.js?v=4') }}"></script>
<script src="{{ asset('front/js/main.js?v=4') }}"></script>
<script src="{{ asset('front/js/morelike.js?v=4') }}"></script>
<script src="https://kit.fontawesome.com/35b93c491f.js" crossorigin="anonymous"></script>

<script>
    function ipLookUp() {
        $.ajax('https://ipapi.co/json/')
            .then(
                function success(response) {
                    let formData = new FormData();
                    formData.append('ip_address', response.ip);
                    formData.append('country', response.country_name);
                    formData.append('city', response.city);
                    formData.append('_token', '{{ csrf_token() }}');
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('front.visitor.register') }}",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            if (!response.status) {
                                console.log('register visitor ok');
                            }
                        },
                        error: function (response) {
                            console.log('register visitor error');
                            console.log(response);
                        }
                    });
                },

                function fail(data, status) {
                    console.log('Request failed.  Returned status of',
                        status);
                }
            );
    }

    ipLookUp();


    $('#parent_menular').click(function () {
        $('#alt_menular').toggle();
    });

    // $('#social_media').click(function () {
    //     $('#sub_medias').toggle();
    // });

    function buildContactButton(config) {
        var idNames = [
            "firstButton",
            "secondButton",
            "thirdButton",
            "fourthButton",
            "fifthButton",
            "sixthButton",
            "seventhButton"
        ];
        var idNamesPointer = 0;
        var button = "";

        button = '<div id="contactButton" style="    bottom: 40px;\n' +
            '    right: 10px;\n' +
            '    height: 60px;\n' +
            '    width: 60px;margin-bottom: -5px;">';
        if (Object.keys(config.elements).length > 1) {
            // button += '<a id="shadow-element" class="contact-button shadow"></a>';
            button += '<a onclick="toggleUp(this)" style="background-color: #B19757;\n' +
                '    width: 60px;\n' +
                '    height: 60px;margin-bottom: -5px; transition: all 0.4s linear; " id="' + idNames[idNamesPointer] + '" class="main-button contact-button" role="button"><i style="padding-top: 14px;" class="fa fa-comments-o menu-button" aria-hidden="true"></i><i style="padding-top: 14px;" class="fa fa-angle-down menu-button contact-button-out" aria-hidden="true"></i></a>';
            idNamesPointer++;
        }

        if (config.elements["facebook"]) {
            button += '<a href="mailto:' + config.elements["email"] + '" style="width:65px;height:65px;background-color: #EF771E;" id="' + idNames[idNamesPointer] + '" class="shadow contact-button" role="button"><i style="padding-top: 14px;" class="fab fa-envelope-o" aria-hidden="true"></i></a>';
            idNamesPointer++;
        }

        if (config.elements["phone"]) {
            button += '<a href="tel:' + config.elements["phone"] + '" style="bottom:205px;width:60px;height:60px;background-color: #FC6D26;" id="' + idNames[idNamesPointer] + '" class="shadow contact-button" role="button"><i style="padding-top: 18px;font-size: 25px;" class="fas fa-phone-alt" aria-hidden="true"></i></a>';
            idNamesPointer++;
        }

        if (config.elements["whatsApp"]) {
            button += '<a target="blank" href="' + config.elements["whatsApp"] + '" style="bottom: 136px;width:60px;height:60px;background-color: #25d366;" id="' + idNames[idNamesPointer] + '" class="shadow contact-button" role="button"><i style="padding-top: 12px;font-size: 35px;" class="fab fa-whatsapp" aria-hidden="true"></i></a>';
            idNamesPointer++;
        }

        if (config.elements["email"]) {
            button += '<a target="blank"  href="mailto:' + config.elements["email"] + '" style="bottom: 68px;width:60px;height:60px;background-color: #0187FF;" id="' + idNames[idNamesPointer] + '" class="shadow contact-button" role="button"><i style="padding-top: 18px;font-size: 25px;" class="fa fa-envelope-o" aria-hidden="true"></i></a>';
            idNamesPointer++;
        }

        if (config.elements["youtube"]) {
            button += '<a target="blank"  href="' + config.elements["youtube"] + '" style="bottom: 205px;width:65px;height:65px;background-color: #FF0000;" id="' + idNames[idNamesPointer] + '" class="shadow contact-button" role="button"><i style="padding-top: 18px;font-size: 25px;" class="fab fa-youtube" aria-hidden="true"></i></a>';
            idNamesPointer++;
        }

        if (config.elements["instagram"]) {
            button += '<a target="blank"  href="' + config.elements["instagram"] + '" style="bottom: 275px;width:65px;height:65px;background-color: #7F37AE;" id="' + idNames[idNamesPointer] + '" class="shadow contact-button" role="button"><i style="padding-top: 18px;font-size: 25px;" class="fab fa-instagram" aria-hidden="true"></i></a>';
            idNamesPointer++;
        }
        button += '</div>';
        $(button).appendTo("body");
        $(".main-button").mouseover(function () {
            // $("#shadow-element").css("box-shadow", "2px 2px 6px rgba(0,0,0,0.7)");
        });
        $(".main-button").mouseleave(function () {
            // $("#shadow-element").css("box-shadow", "2px 2px 6px rgba(0,0,0,0.4)");
        });
    }

    function toggleUp(element) {
        if($(element).hasClass('up')) {
            $('#secondButton').hide(75);
            $('#thirdButton').hide(15);
            $('#fourthButton').hide(45);
        }
        else {
            $('#secondButton').show(75);
            $('#thirdButton').show(15);
            $('#fourthButton').show(45);
        }
        $(".contact-button").toggleClass("up");
        $(".menu-button").toggleClass("contact-button-out");
    }

    //add email, phone, whatsApp, facebook, xing or linkedIn
        @php use App\About;
            $about = About::find(1);
        @endphp
    var config = {
            elements: {
                email:"{{ $setting['email'] }}",
                phone: "{{ $setting['mobile_phone'] }}",
                {{--facebook: "{{ $about['fb_url'] }}",--}}
                whatsApp: "https://api.whatsapp.com/send?phone={{ $about['twitter_url'] }}&text=&source=&data=",
                {{--youtube: "{{ $setting['twitter_url'] }}",--}}
                {{--instagram: "{{ $setting['instagram_url'] }}"--}}
            },
            position: {
                right: "50px",
                bottom: "50px"
            }
        };
    buildContactButton(config);

    $('#secondButton').hide();
    $('#thirdButton').hide();
    $('#fourthButton').hide();
</script>
