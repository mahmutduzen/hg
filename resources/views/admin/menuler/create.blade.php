@extends('admin.template')

@section('icerik')

    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Menü Ekle</h5>
                </div>
                <div class="widget-content nopadding">
                    {!! Form::open(['route'=>'menuler.store','method'=>'POST','class'=>'form-horizontal']) !!}
                    <div class="control-group">
                        <label class="control-label">Sıra :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="sira" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Üst Menü :</label>
                        <div class="controls">
                            <select name="ust_id">
                                <option value="0">Boş</option>
                                @foreach($menuler as $menu)
                                    <option value="{{$menu->id}}">{{$menu->sayfa->baslik}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Sayfa :</label>
                        <div class="controls">
                            <select name="sayfa_id">
                                @foreach($sayfalar as $sayfa)
                                    <option value="{{$sayfa->id}}">{{$sayfa->baslik}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                    {!! Form::close(); !!}
                </div>
            </div>
        </div>
    </div>


@endsection
@section('css')

@endsection
@section('js')

@endsection
