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
                        {{ $id > 0 ? "Hazır proyektə düzəliş et" : "Hazır proyekt yarat"}}
                    </h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <img style="width: 100%;" id="project_image"
                                     src="{{$id > 0 ? asset('assets/images/projects/'.$project['image']) : 'https://via.placeholder.com/150x80'}}"
                                     alt="project image">
                                <input id="project_image_input" class="form-control border-primary" type="file"
                                       accept="images/*" name="image" placeholder="Şəkil">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Başlıq</label>
                                <input class="form-control border-primary" type="text"
                                       name="title" placeholder="Başlıq" value="{{ $project['title'] }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="prepared_type">Tipi</label>
                                <select class="form-control border-primary" name="prepared_type" id="prepared_type">
                                    <option value="0">Mənzil</option>
                                    <option value="1">Bağ evi</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{--                        <div class="col-md-12">--}}
                        {{--                            <div class="form-group">--}}
                        {{--                                <label for="lang">Dil</label>--}}
                        {{--                                <select class="form-control border-primary" name="lang" id="lang">--}}
                        {{--                                    @foreach($langs as $lang)--}}
                        {{--                                        <option value="{{ $lang['id'] }}">{{ $lang['name'] }}</option>--}}
                        {{--                                    @endforeach--}}
                        {{--                                </select>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="col-md-12">
                            <hr>
                            <h1>Məlumat</h1>
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="total_area">Ümumi sahəsi</label>
                                <input class="form-control border-primary" type="number"
                                       name="total_area" placeholder="Ümumi sahəsi"
                                       value="{{ $project['total_area'] }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="used_area">İstifadə olunan sahə</label>
                                <input class="form-control border-primary" type="number"
                                       name="used_area" placeholder="İstifadə olunan sahə"
                                       value="{{ $project['used_area'] }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="room_count">Otaq sayı</label>
                                <input class="form-control border-primary" type="number"
                                       name="room_count" placeholder="Otaq sayı" value="{{ $project['room_count'] }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cash">Nəğd qiymət</label>
                                <input class="form-control border-primary" type="number"
                                       name="cash" placeholder="Nəğd qiymət" value="{{ $project['cash'] }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Qiymət</label>
                                <input class="form-control border-primary" type="number"
                                       name="price" placeholder="Qiymət" value="{{ $project['price'] }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="payment_time">Hissə-hissə ödəniş müddəti</label>
                                <input class="form-control border-primary" type="number"
                                       name="payment_time" placeholder="Hissə-hissə ödəniş müddəti"
                                       value="{{ $project['payment_time'] }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_payment">İlkin ödəniş</label>
                                <input class="form-control border-primary" type="number"
                                       name="first_payment" placeholder="İlkin ödəniş"
                                       value="{{ $project['first_payment'] }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="monthly_payment">Aylıq ödəniş</label>
                                <input class="form-control border-primary" type="number"
                                       name="monthly_payment" placeholder="Aylıq ödəniş"
                                       value="{{ $project['monthly_payment'] }}">
                            </div>
                        </div>
                        <div id="sortable">
                        @if(isset($project->projectImages))
                            @foreach($project->projectImages as $image)
                                <div class="col-md-3" id="{{$image->id}}">
                                    <img src="{{ asset('assets/images/projects/'.$image->image) }}" alt="" style="width: 100%;height: 100%;">
                                    <a href="{{ route('admin.project.image.delete',$image->id) }}" class="btn btn-danger btn-block">Sil</a>
                                </div>
                            @endforeach
                        @endif
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="project_images">Project Şəkilləri</label>
                                <div class="dropzone" id="project_images">

                                </div>
                            </div>
                        </div>
{{--                        <div class="col-md-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="project_sketches">Project Eskizləri</label>--}}
{{--                                <div class="dropzone" id="project_sketches">--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
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

        // let dzProjectSketches = new Dropzone("#project_sketches", {
        //     url: "/upload",
        //     maxFilesize: 500, // MB
        //     maxFiles: 20,
        //     addRemoveLinks: true,
        //     dictDefaultMessage: 'Yükləmək istədiyiniz faylları buraya sürükləyin',
        //     dictRemoveFile: 'Faylı silin',
        //     acceptedFiles: ".jpeg,.jpg,.png,.gif",
        //     autoProcessQueue: false
        // });


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
            $.post('/admin/project_image/order',{ids , _token: '{{ csrf_token() }}'})

            let form = $('#project_form'),
                formData = new FormData(form.get(0));

            formData.append('_token', '{{ csrf_token() }}');

            Array.prototype.forEach.call(dzProjectImages.files, function (file) {
                formData.append('project_images[]', file);
            });

            // Array.prototype.forEach.call(dzProjectSketches.files, function (file) {
            //     formData.append('project_sketches[]', file);
            // });

            $.ajax({
                type: 'POST',
                url: "{{ route('admin.save.prepared.project') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (!response.status) {
                        $("#errorlist").show();
                        $("#errors").html(response.errors.title);
                    } else {
                        window.location.href = '{{ url('admin/prepared-projects') }}'
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
