@extends('admin.template')

@section('icerik')

    <div class="row-fluid">
        <div class="span12">
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
                            <th>Adres Başlığı</th>
                            <th>Toplam Ücret</th>
                            <th>Detay</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($odemeler as $odeme)
                            <tr class="gradeX">
                                <td>{{$odeme->id}}</td>
                                <td>{{$odeme->sepet->kullanici->name}}</td>
                                <td>{{$odeme->adres->adi}}</td>
                                <td>{{$odeme->toplamucret}}</td>
                                <td class="center"><a href="{{route('odemeler.detay',$odeme->id)}}" class="btn btn-success btn-mini">Detay</a></td>
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
