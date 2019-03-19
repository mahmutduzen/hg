@extends('admin.template')

@section('icerik')
    <div class="row-fluid">
        <div class="span12">
            <div style="float: right;"><a href="{{route('menuler.create')}}" class="btn btn-success">Yeni Menü</a></div>
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
                            <th>Üst Menü</th>
                            <th>Sayfa</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($menuler as $menu)
                            <tr class="gradeX">
                                <td>{{$menu->id}}</td>
                                <td>
                                    <?php $number = 0; ?>
                                    @foreach($menuler as $mn)
                                        @if($menu->ust_id == $mn->id)
                                            {{$mn->sayfa->baslik}}
                                                <?php $number++; ?>
                                            @else
                                        @endif
                                    @endforeach
                                    @if($number==0)
                                        {{'Üst Menü Yok'}}
                                        @endif
                                </td>
                                <td>
                                    {{$menu->sayfa->baslik}}
                                </td>
                                <td class="center"><a href="{{route('menuler.edit',$menu->id)}}" class="btn btn-success btn-mini">Düzenle</a></td>

                                {!! Form::model($menu,['route' => ['menuler.destroy',$menu->id],'method'=>'DELETE']) !!}

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
