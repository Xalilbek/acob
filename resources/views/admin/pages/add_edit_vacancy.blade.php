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
                <form action="{{ route('admin.save.vacancy') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $id }}">
                    <div class="form-group">
                        <label for="title">Vakansiya adi</label>
                        <input class="form-control border-primary" type="text"
                               placeholder="Vakansiya adi" id="title" name="title" value="{{ $vacancy['title'] }}">
                    </div>
                    <div class="form-group">
                        <label for="teleb">Tələblər</label>
                        <textarea id="teleb" class="form-control border-primary"
                                  name="teleb" placeholder="Tələblər">
                            {!! $vacancy['teleb'] !!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="teklif">Təkliflər</label>
                        <textarea id="teklif" class="form-control border-primary"
                                  name="teklif" placeholder="Təkliflər">
                                    {!! $vacancy['teklif'] !!}
                                </textarea>
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
        ClassicEditor
            .create(document.querySelector('#teleb'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#teklif'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
