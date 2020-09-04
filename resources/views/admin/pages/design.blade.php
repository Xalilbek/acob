@extends('admin.admin_app')

@section('content')
    <div class="app-content content container-fluid">
        <div class="content-wrapper">

            <div class="content-body">
                <form id="project_form" action="#" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $id }}">
                    <h4 class="form-section"><i class="icon-mail6"></i>
                        {{ $id > 0 ? "Dizayn düzəliş et" : "Yeni dizayn yarat"}}
                    </h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Başlıq</label>
                                <input class="form-control border-primary" type="text"
                                       name="title" placeholder="Başlıq" value="{{ $design['title'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="sortable">
                        @if(isset($design->images))
                            @foreach($design->images as $image)
                                <div class="col-md-3" id="{{$image->id}}">
                                    <img src="{{ asset('assets/images/projects/'.$image->image) }}" alt="" style="width: 100%;height: 100%;">
                                    <a href="{{ route('admin.design.image.delete',$image->id) }}" class="btn btn-danger btn-block">Sil</a>
                                </div>
                            @endforeach
                        @endif
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="project_images">Dizayn Şəkilləri</label>
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
        const items = $('#sortable').sortable({
            items: "div"
        })
        $('.saveBtn').on('click', function (e) {
            e.stopPropagation();
            e.preventDefault();

            $('#load').show();
            let ids = [];
            for (let i = 0; i < items.children().length; i++) {
                ids.push(items.children().eq(i).attr('id'))
            }
            $.post('/admin/design_image/order',{ids , _token: '{{ csrf_token() }}'})

            let form = $('#project_form'),
                formData = new FormData(form.get(0));

            formData.append('_token', '{{ csrf_token() }}');

            Array.prototype.forEach.call(dzProjectImages.files, function (file) {
                formData.append('design_images[]', file);
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('admin.save.design') }}",
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
                        window.location.href = '{{ url('admin/design') }}'
                    }
                    $('#load').hide();
                },
                error: function (response) {
                    $('#load').hide();
                }
            });

        });

    </script>
@endsection
