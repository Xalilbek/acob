@extends('admin.admin_app')

@section('content')
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
                <a href="{{ route('admin.design',0) }}" type="submit" class="btn btn-primary" style="float: right;margin-bottom: 20px;">
                    <i class="icon-plus"></i> Yeni dizayn
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
                            <th>Düzəliş</th>
                            <th>Sil</th>
                        </tr>
                        </thead>
                        <tbody id="sortable">
                        @foreach($designs as $key => $project)
                            <tr id="{{ $project['id'] }}">
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $project['title'] }}</td>
                                <td><a href="{{ route('admin.design',$project['id']) }}">
                                        <i class="icon-pencil"></i>
                                    </a>
                                </td>
                                <td><a href="{{ route('admin.design.delete',$project['id']) }}">
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
            $.post('/admin/design/order',{ids , _token: '{{ csrf_token() }}'})
            .then(()=>{
                $('#load').hide();
            })
        })
    </script>
@endsection