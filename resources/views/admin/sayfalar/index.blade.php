@extends('admin.template')

@section('icerik')
    <div class="row-fluid">
        <div class="span12">
            <div style="float: right;"><a href="{{route('sayfalar.create')}}" class="btn btn-success">Yeni Sayfa</a></div>
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
                            <th>Metin</th>
                            <th>Kategori</th>
                            <th>Etiket</th>
                            <th>Tip</th>
                            <th>Sitil</th>
                            <th>Video</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($sayfalar as $sayfa)
                            <tr class="gradeX">
                                <td>{{$sayfa->id}}</td>
                                <td>{{$sayfa->baslik}}</td>
                                <td>{{mb_substr($sayfa->metin,0,250).'...'}}</td>
                                <td>
                                    @foreach($sayfa->kategori as $ktgr)
                                        {{$ktgr->adi.','}}
                                    @endforeach
                                </td>
                                <td>{{'...'}}</td>
                                <td>{{$sayfa->tip->adi}}</td>
                                <td>{{$sayfa->sitil->adi}}</td>
                                <td>{{$sayfa->video}}</td>
                                <td class="center"><a href="{{route('sayfalar.edit',$sayfa->id)}}" class="btn btn-success btn-mini">Düzenle</a></td>

                                {!! Form::model($sayfa,['route' => ['sayfalar.destroy',$sayfa->id],'method'=>'DELETE']) !!}

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
