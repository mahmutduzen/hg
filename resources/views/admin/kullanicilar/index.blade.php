@extends('admin.template')

@section('icerik')
    <div class="row-fluid">
        <div class="span12">
            <div style="float: right;"><a href="{{route('kullanici.ekle')}}" class="btn btn-success">Yeni Etiket</a></div>
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
                            <th>Kullanıcı Adı</th>
                            <th>Mail Adresi</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($kullanicilar as $kullanici)
                            <tr class="gradeX">
                                <td>{{$kullanici->id}}</td>
                                <td>{{$kullanici->name}}</td>
                                <td>{{$kullanici->email}}</td>
                                <td>@if($kullanici->onay==1)
                                        Onaylı
                                @else
                                        Onaysız
                                @endif</td>
                                <td class="center"><a href="{{route('kullanici.edit',$kullanici->id)}}" class="btn btn-success btn-mini">Düzenle</a></td>

                                {!! Form::model($kullanici,['route' => ['kullanici.destroy',$kullanici->id],'method'=>'DELETE']) !!}

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
