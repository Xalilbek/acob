@extends('admin.admin_app')

@section('content')
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
                @foreach ($errors->all() as $error)
                    <div style="color: tomato;">{{ $error }}</div>
                @endforeach
            </div>
            <div class="content-body">
                <form action="{{ route('admin.save.about') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <img style="width: 100%;" id="project_image"
                                     src="{{$about['image']? asset('assets/images/'.$about['image']) : 'https://via.placeholder.com/150x80'}}"
                                     alt="project image">
                                <input id="project_image_input" class="form-control border-primary" type="file"
                                       accept="images/*" name="image" placeholder="Şəkil">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Başlıq (az)</label>
                        <input class="form-control border-primary" type="text"
                               placeholder="Haqqında səhifəsində adı" id="title_az" name="title_az" value="{{ $about['title_az'] }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Başlıq (ru)</label>
                        <input class="form-control border-primary" type="text"
                               placeholder="Haqqında səhifəsində adı" id="title_ru" name="title_ru" value="{{ $about['title_ru'] }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Başlıq (en)</label>
                        <input class="form-control border-primary" type="text"
                               placeholder="Haqqında səhifəsində adı" id="title_en" name="title_en" value="{{ $about['title_en'] }}">
                    </div>
                    <div class="form-group">
                        <label for="content_az">Haqqında (az)</label>
                        <textarea id="content_az" class="form-control border-primary"
                                  name="content_az" placeholder="Haqqında">
                                    {{ $about['content_az'] }}
                                </textarea>
                    </div>
                    <div class="form-group">
                        <label for="content_en">Haqqında (en)</label>
                        <textarea id="content_en" class="form-control border-primary"
                                  name="content_en" placeholder="Haqqında">
                                    {{ $about['content_en'] }}
                                </textarea>
                    </div>
                    <div class="form-group">
                        <label for="content_ru">Haqqında (ru)</label>
                        <textarea id="content_ru" class="form-control border-primary"
                                  name="content_ru" placeholder="Haqqında">
                                    {{ $about['content_ru'] }}
                                </textarea>
                    </div>
                    <div class="form-group">
                        <label for="slogan">Slogan (az)</label>
                        <input class="form-control border-primary" type="text"
                               placeholder="Slogan" id="slogan_az" name="slogan_az" value="{{ $about['slogan_az'] }}">
                    </div>
                    <div class="form-group">
                        <label for="slogan">Slogan (en)</label>
                        <input class="form-control border-primary" type="text"
                               placeholder="Slogan" id="slogan_en" name="slogan_en" value="{{ $about['slogan_en'] }}">
                    </div>
                    <div class="form-group">
                        <label for="slogan">Slogan (ru)</label>
                        <input class="form-control border-primary" type="text"
                               placeholder="Slogan" id="slogan_ru" name="slogan_ru" value="{{ $about['slogan_ru'] }}">
                    </div>
                    <div class="form-group">
                        <label for="twitter_url">Whatsapp nömrəsi</label>
                        <input class="form-control border-primary" type="text"
                               placeholder="Whatsapp nömrəsi" id="twitter_url" name="twitter_url"
                               value="{{ $about['twitter_url'] }}">
                    </div>
                    <div class="form-group">
                        <label for="fb_url">Facebook URL</label>
                        <input class="form-control border-primary" type="text"
                               placeholder="Messager URL" id="fb_url" name="fb_url" value="{{ $about['fb_url'] }}">
                    </div>
                    <div class="form-group">
                        <label for="instagram_url">Instagram URL</label>
                        <input class="form-control border-primary" type="text"
                               placeholder="Instagram URL" id="instagram_url" name="instagram_url"
                               value="{{ $about['instagram_url'] }}">
                    </div>
                    <div class="form-group">
                        <label for="youtube_url">Youtube URL</label>
                        <input class="form-control border-primary" type="text"
                               placeholder="Youtube URL" id="youtube_url" name="youtube_url"
                               value="{{ $about['youtube_url'] }}">
                    </div>
                    <div class="form-group">
                        <label for="pinterest_url">Pinterest URL</label>
                        <input class="form-control border-primary" type="text"
                               placeholder="pinterest URL" id="pinterest_url" name="pinterest_url"
                               value="{{ $about['pinterest_url'] }}">
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
@section('css')
    <style>
        .ck-editor__editable {
            min-height: 500px;
        }
        .ck-file-dialog-button {
            display: none;
        }
    </style>
@endsection

@section('js')
    <script src="{{ asset('assets/js/core/ckeditor.js') }}"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#project_image').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#project_image_input").change(function () {
            readURL(this);
        });

        ClassicEditor
            .create(document.querySelector('#content_az'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#content_en'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#content_ru'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
