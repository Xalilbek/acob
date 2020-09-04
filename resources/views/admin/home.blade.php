@extends('admin.admin_app')

@section('content')
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <form action="{{ route('admin.save.setting') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h4 class="form-section"><i class="icon-mail6"></i>Sayt başlığı</h4>
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <img id="logo_img"
                             src="{{$setting['logo']? asset('assets/images/'.$setting['logo']) : 'https://via.placeholder.com/600x400'}}"
                             alt="project logo">
                        <input id="logo" class="form-control border-primary" type="file"
                               accept="images/*" name="logo" placeholder="Logo">
                    </div>
                    <div class="form-group">
                        <label for="main_bg">Arxa plan</label>
                        <img id="main_bg_img"
                             src="{{$setting['main_bg']? asset('assets/images/'.$setting['main_bg']) : 'https://via.placeholder.com/600x400'}}"
                             alt="project main bg">
                        <input id="main_bg" class="form-control border-primary" type="file"
                               accept="images/*" name="main_bg" placeholder="Main Background Image">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control border-primary" type="email"
                               placeholder="Email" id="email" name="email" value="{{ $setting['email'] }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Mobil nömrəsi</label>
                        <input class="form-control border-primary" type="text"
                               placeholder="Mobil nömrəsi" id="mobile_phone" name="mobile_phone"
                               value="{{ $setting['mobile_phone'] }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Ev telefonu</label>
                        <input class="form-control border-primary" type="text"
                               placeholder="Ev telefonu" id="home_phone" name="home_phone"
                               value="{{ $setting['home_phone'] }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Ünvan</label>
                        <input class="form-control border-primary" type="text"
                               placeholder="Ünvan" id="location" name="location"
                               value="{{ $setting['location'] }}">
                    </div>

                    <div class="form-group">
                        <label for="phone">İş saatları</label>
                        <input class="form-control border-primary" type="text"
                               placeholder="İş saatları" id="work_times" name="work_times"
                               value="{{ $setting['work_times'] }}">
                    </div>

                    <div class="form-actions left">
                        <button type="submit" class="btn btn-primary">
                            <i class="icon-check2"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function readURL(input,el) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(el).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#logo").change(function () {
            readURL(this,'#logo_img');
        });

        $("#main_bg").change(function () {
            readURL(this,'#main_bg_img');
        });
    </script>
@endsection
