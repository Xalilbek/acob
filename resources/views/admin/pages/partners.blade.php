@extends('admin.admin_app')

@section('content')
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
                <a href="{{ route('admin.write.partner',0) }}" type="submit" class="btn btn-primary" style="float: right;margin-bottom: 20px;">
                    <i class="icon-plus"></i> Yeni partner
                </a>
            </div>
            <div class="content-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Link</th>
                            <th>Şəkil</th>
                            <th>Düzəliş</th>
                            <th>Sil</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($partners as $key => $project)
                            <tr id="{{ $project['id'] }}">
                                <th scope="row">{{ ++$key }}</th>
                                <td><a href="{{ $project['link'] }}"></a>{{ $project['link'] }}</td>
                                <td><img src="{{ url('assets/images/partners/'.$project['img']) }}" alt="" width="50"></td>
                                <td><a href="{{ route('admin.write.partner',$project['id']) }}">
                                        <i class="icon-pencil"></i>
                                    </a>
                                </td>
                                <td><a href="{{ route('admin.delete.partner',$project['id']) }}">
                                        <i class="icon-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
