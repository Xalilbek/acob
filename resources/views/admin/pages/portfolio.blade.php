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
                <form id="project_form" action="#" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $id }}">
                    <h4 class="form-section"><i class="icon-mail6"></i>
                        {{ $id > 0 ? "Portfolio düzəliş et" : "Yeni portfolio yarat"}}
                    </h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Başlıq</label>
                                <input class="form-control border-primary" type="text"
                                       name="title" placeholder="Başlıq" value="{{ $portfolio['title'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="project_images">Portfolio Şəkilləri</label>
                                <div class="dropzone" id="project_images">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions left">
                        <button type="button" class="btn btn-primary saveBtn">
                            <i class="icon-check2"></i> Yadda saxla
                        </button>
                    </div>
                    <div class="alert alert-danger" id="errorlist" style="display: none">
                        <strong>Error!</strong> <span id="errors" > loading...</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
    <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
@endsection

@section('js')
    <script>
        Dropzone.autoDiscover = false;

        let dzProjectImages = new Dropzone("#project_images", {
            url: "/upload",
            maxFilesize: 500, // MB
            maxFiles: 20,
            addRemoveLinks: true,
            dictDefaultMessage: 'Yükləmək istədiyiniz faylları buraya sürükləyin',
            dictRemoveFile: 'Faylı silin',
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            autoProcessQueue: false
        });

        $('.saveBtn').on('click', function (e) {
            e.stopPropagation();
            e.preventDefault();

            let form = $('#project_form'),
                formData = new FormData(form.get(0));

            formData.append('_token', '{{ csrf_token() }}');

            Array.prototype.forEach.call(dzProjectImages.files, function (file) {
                formData.append('portfolio_images[]', file);
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('admin.save.portfolio') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (!response.status) {
                        $("#errorlist").show();
                        $("#errors").html(response.errors.title);
                    }
                    else {
                        window.location.href = '{{ url('admin/portfolio') }}'
                    }
                },
                error: function (response) {

                }
            });

        });


    </script>
@endsection
