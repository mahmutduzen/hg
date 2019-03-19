@extends('admin.template')

@section('icerik')
    <div class="row-fluid">
        <div class="span12">
            <div style="float: right;"><a href="{{route('urunler.create')}}" class="btn btn-success">Yeni Ürün</a></div>
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
                            <th>Açıklama</th>
                            <th>Metin</th>
                            <th>Fiyat</th>
                            <th>Detay</th>
                            <th>Marka</th>
                            <th>Etiket</th>
                            <th>Özellik</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($urunler as $urun)
                            <tr class="gradeX">
                                <td>{{$urun->id}}</td>
                                <td>{{$urun->baslik}}</td>
                                <td>{{$urun->aciklama}}</td>
                                <td>{{mb_substr($urun->metin,0,250).'...'}}</td>
                                <td>{{$urun->fiyat}}</td>
                                <td>{{mb_substr($urun->detay,0,250).'...'}}</td>
                                <td>
                                    @foreach($urun->marka as $mrk)
                                        {{$mrk->adi.','}}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($urun->etiket as $etkt)
                                        {{$etkt->adi.','}}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($urun->ozellik as $ozllk)
                                        {{$ozllk->baslik.','}}
                                    @endforeach
                                </td>
                                <td class="center"><a href="{{route('urunler.edit',$urun->id)}}" class="btn btn-success btn-mini">Düzenle</a></td>

                                {!! Form::model($urun,['route' => ['urunler.destroy',$urun->id],'method'=>'DELETE']) !!}

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
