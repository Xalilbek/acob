@extends('admin.admin_app')

@section('content')
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <form action="{{ route('admin.save.question') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ !isset($question) ? 0 : $question['id']}}">
                    <h4 class="form-section"><i
                            class="icon-mail6"></i>{{ !isset($question) ? 'Düzəliş et' : 'Yeni məqalə' }}</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Başlıq</label>
                                <input class="form-control border-primary" type="text"
                                       placeholder="Başlıq" id="title" name="title"
                                       value="{{ $question['title'] }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="lang">Dil</label>
                                <select class="form-control border-primary" name="lang" id="lang">
                                    @foreach($langs as $lang)
                                        <option value="{{ $lang['id'] }}">{{ $lang['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="question_editor">Məqalə</label>
                                <input id="question_editor" class="form-control border-primary"
                                       name="content" placeholder="Məqalə" value="{{ $question['content'] }}">
                            </div>
                        </div>
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
        // ClassicEditor
        //     .create(document.querySelector('#question_editor'))
        //     .then(editor => {
        //         console.log(editor);
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     });
    </script>
@endsection
