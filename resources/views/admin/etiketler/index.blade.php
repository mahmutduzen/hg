@extends('admin.template')

@section('icerik')
    <div class="row-fluid">
        <div class="span12">
            <div style="float: right;"><a href="{{route('etiketler.create')}}" class="btn btn-success">Yeni Etiket</a></div>
            <div class="clearfix"></div>
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Data table</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Adı</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($etiketler as $etiket)
                                <tr class="gradeX">
                                    <td>{{$etiket->id}}</td>
                                    <td>{{$etiket->adi}}</td>
                                    <td class="center"><a href="{{route('etiketler.edit',$etiket->id)}}" class="btn btn-success btn-mini">Düzenle</a></td>

                                    {!! Form::model($etiket,['route' => ['etiketler.destroy',$etiket->id],'method'=>'DELETE']) !!}

                                    <td class="center"><button type="submit" class="btn btn-danger btn-mini">Sil</button></td>
                                    {!! Form::close() !!}

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('css')
    <link rel="stylesheet" href="/admin/css/uniform.css" />
    <link rel="stylesheet" href="/admin/css/select2.css" />
@endsection
@section('js')
    <script src="/admin/js/excanvas.min.js"></script>
    <script src="/admin/js/jquery.min.js"></script>
    <script src="/admin/js/jquery.ui.custom.js"></script>
    <script src="/admin/js/bootstrap.min.js"></script>

    <script src="/admin/js/jquery.dataTables.min.js"></script>
    <script src="/admin/js/matrix.js"></script>
    <script src="/admin/js/matrix.tables.js"></script>
@endsection
