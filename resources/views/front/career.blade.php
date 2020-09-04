@extends('front.front')

@section('content')
    <section id="subheader" data-speed="8" data-type="background"
             style="background-position: 10% 0px;background-image:url('{{ asset('front/images/career-bg.jpg') }}')">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $vacancy['title'] }}</h1>

                    <ul class="crumb">
                        <li><a href="/">{{ __('setting.menu.home') }}</a></li>
                        <li class="sep">/</li>
                        <li><a href="/career/">{{ __('setting.menu.career') }}</a></li>
                        <li class="sep">/</li>
                        <li>{{ $vacancy['slug'] }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="karyera">
        <div class="container karyera_tehsil">
            <table>
            </table>
            <button type="button" class="btn btn-default" style="color: #f7f4f8;
    background-color: #b29756;
    border-color: #b29756;"
                    data-toggle="modal" data-target="#myModal">{{ __('setting.apply') }}</button>
        </div>
        <div class="container vakansiya">
            <hr>
            <div class="vakan_block">
                <h3>{{ __('setting.teleb') }}:</h3>
                {!! $vacancy['teleb'] !!}
            </div>
            <div class="vakan_block">
                <h3>{{ __('setting.teklif') }}</h3>
                {!! $vacancy['teklif'] !!}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <form action="{{ route('front.send.cv') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!-- Modal content-->
                <input type="hidden" name="title" value="{{ $vacancy['title'] }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="color:#0a121d;">{{ __('setting.apply') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" style="color:#8e949c">Ad</label>
                                    <input id="name" class="form-control border-primary" type="text"
                                           name="name" placeholder="Ad" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="surname" style="color:#8e949c">Soyad</label>
                                    <input id="surname" class="form-control border-primary" type="text"
                                           name="surname" placeholder="Soyad" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title" style="color:#8e949c">CV</label>
                                    <input class="form-control border-primary" type="file"
                                           name="cv" placeholder="CV" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">{{ __('setting.send') }}</button>
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">{{ __('setting.close') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
