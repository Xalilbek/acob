@extends('admin.admin_app')

@section('content')
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div style="text-align: center;" class="content-header row">
                @foreach ($errors->all() as $error)
                    <div style="color: tomato;">{{ $error }}</div>
                @endforeach
            </div>
            <div class="content-body">
                <form id="project_form" action="{{ route('admin.save.partner') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $id }}">
                    <h4 class="form-section"><i class="icon-mail6"></i>
                        {{ $id > 0 ? "Partniyor düzəliş et" : "Yeni partniyor yarat"}}
                    </h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <img style="width: 100%;" id="project_image"
                                     src="{{$id > 0 ? asset('assets/images/partners/'.$partner['img']) : 'https://via.placeholder.com/150x80'}}"
                                     alt="project image">
                                <input id="project_image_input" class="form-control border-primary" type="file"
                                       accept="images/*" name="image" placeholder="Şəkil">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="url">Partnyor sayti</label>
                                <input class="form-control border-primary" type="text"
                                       name="link" placeholder="Partnyor sayti" value="{{ $partner['link'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-actions left">
                        <button type="submit" class="btn btn-primary saveBtn">
                            <i class="icon-check2"></i> Yadda saxla
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
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
    </script>
@endsection
