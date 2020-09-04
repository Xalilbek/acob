@extends('admin.admin_app')

@section('content')
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
                <a href="{{ route('admin.write.question',0) }}" type="submit" class="btn btn-primary" style="float: right;margin-bottom: 20px;">
                    <i class="icon-plus"></i> Yeni sual
                </a>
            </div>
            <div class="content-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Başlıq</th>
                            <th>Kontent</th>
                            <th>Dil</th>
                            <th>Düzəliş</th>
                            <th>Sil</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($questions as $key => $question)
                            <tr id="{{ $question['id'] }}">
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $question['title'] }}</td>
                                <td style="word-break:break-all;">{!! substr($question['content'],0,500) !!}</td>
                                <td>{{ App\Lang::find($question->lang_id)->name }}</td>
                                <td><a href="{{ route('admin.write.question',$question['id']) }}">
                                        <i class="icon-pencil"></i>
                                    </a>
                                </td>
                                <td><a href="{{ route('admin.delete.question',$question['id']) }}">
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
