@extends('admin.template')

@section('icerik')

    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Tip Düzenle</h5>
                </div>
                <div class="widget-content nopadding">
                    {!! Form::model($kategori,['route'=>['kategoriler.update',$kategori->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
                    <div class="control-group">
                        <label class="control-label">Adı :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="adi" value="{{$kategori->adi}}"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Üst Kategori :</label>
                        <div class="controls">
                            <select name="ust_id">
                                @if($kategori->ust_id!=0)
                                    <option value="0">Yok</option>
                                    @foreach($kategoriler as $ktgr)
                                        @if($kategori->ust_id==$ktgr->id)
                                            <option value="{{$ktgr->id}}" selected>{{$ktgr->adi}}</option>
                                        @else
                                            <option value="{{$ktgr->id}}">{{$ktgr->adi}}</option>
                                        @endif
                                    @endforeach
                                @else
                                    <option value="0" selected>Yok</option>
                                    @foreach($kategoriler as $yktgr)
                                        <option value="{{$yktgr->id}}">{{$yktgr->adi}}</option>
                                    @endforeach
                                @endif
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
