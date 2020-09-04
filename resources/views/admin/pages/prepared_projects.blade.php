@extends('admin.admin_app')

@section('content')
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
                <a href="{{ route('admin.prepared.project',0) }}" type="submit" class="btn btn-primary" style="float: right;margin-bottom: 20px;">
                    <i class="icon-plus"></i> Yeni hazır project
                </a>
                <button class="btn btn-info" id="sirala" style="float: right;margin-bottom: 20px; margin-right: 10px">
                    <i class="icon-info"></i> Sırala
                </button>
            </div>
            <div class="content-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Başlıq</th>
                            <th>Ümumi sahə</th>
                            <th>Otaq sayi</th>
                            <th>Şəkil</th>
                            <th>Düzəliş</th>
                            <th>Sil</th>
                        </tr>
                        </thead>
                        <tbody id="sortable">
                        @foreach($projects as $key => $project)
                            <tr id="{{ $project['id'] }}">
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $project['title'] }}</td>
                                <td>{{ $project['total_area'] }}</td>
                                <td>{{ $project['room_count'] }}</td>
                                <td><img src="{{ url('assets/images/projects/'.$project['image']) }}" alt="" width="50"></td>
                                <td><a href="{{ route('admin.prepared.project',$project['id']) }}">
                                        <i class="icon-pencil"></i>
                                    </a>
                                </td>
                                <td><a href="{{ route('admin.project.prepared.delete',$project['id']) }}">
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
@section('js')
    <script>
         const items = $('#sortable').sortable({
            items: "tr"
        })
        $('#sirala').on('click',function(){
            $('#load').show();
            let ids = [];
            for (let i = 0; i < items.children().length; i++) {
                ids.push(items.children().eq(i).attr('id'))
            }
            $.post('/admin/prepared-project/order',{ids , _token: '{{ csrf_token() }}'})
            .then(()=>{
                $('#load').hide();
            })
        })
    </script>
@endsection
