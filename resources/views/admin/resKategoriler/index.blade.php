@extends('admin.template')

@section('icerik')
    <div class="row-fluid">
        <div class="span12">
            <div style="float: right;"><a href="{{route('resKategoriler.create')}}" class="btn btn-success">Yeni Marka</a></div>
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
                            <th>Başlık</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($markalar as $marka)
                            <tr class="gradeX">
                                <td>{{$marka->id}}</td>
                                <td>{{$marka->adi}}</td>
                                <td class="center"><a href="{{route('resKategoriler.edit',$marka->id)}}" class="btn btn-success btn-mini">Düzenle</a></td>

                                {!! Form::model($marka,['route' => ['resKategoriler.destroy',$marka->id],'method'=>'DELETE']) !!}

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
