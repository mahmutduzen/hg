@extends('admin.template')

@section('icerik')
    <div class="row-fluid">
        <div class="span12">
            <div style="float: right;"><a href="{{route('yazilar.create')}}" class="btn btn-success">Yeni Yazı</a></div>
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
                            <th>Yazar</th>
                            <th>Okunma</th>
                            <th>Video</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($yazilar as $yazi)
                            <tr class="gradeX">
                                <td>{{$yazi->id}}</td>
                                <td>{{$yazi->baslik}}</td>
                                <td>{{mb_substr($yazi->metin,0,250).'...'}}</td>
                                <td>
                                    @foreach($yazi->kategori as $ktgr)
                                        {{$ktgr->adi.','}}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($yazi->etiket as $etkt)
                                        {{$etkt->adi.','}}
                                    @endforeach
                                </td>
                                <td>{{$yazi->users->name}}</td>
                                <td>{{$yazi->okunma}}</td>
                                <td>{{$yazi->video}}</td>
                                <td class="center"><a href="{{route('yazilar.edit',$yazi->id)}}" class="btn btn-success btn-mini">Düzenle</a></td>

                                {!! Form::model($yazi,['route' => ['yazilar.destroy',$yazi->id],'method'=>'DELETE']) !!}

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
