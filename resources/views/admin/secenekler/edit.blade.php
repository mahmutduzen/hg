@extends('admin.template')

@section('icerik')

    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Etiket Düzenle</h5>
                </div>
                <div class="widget-content nopadding">
                    {!! Form::model($secenek,['route'=>['secenekler.update',$secenek->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
                    <div class="control-group">
                        <label class="control-label">Adı :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="adi" value="{{$secenek->adi}}"/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Özellik :</label>
                        <div class="controls">
                            <select name="ozellik_id">
                                @foreach($ozellikler as $ozellik)
                                    @if($ozellik->id == $secenek->ozellik_id)
                                    <option value="{{$ozellik->id}}" selected>{{$ozellik->baslik}}</option>
                                        @else
                                        <option value="{{$ozellik->id}}">{{$ozellik->baslik}}</option>
                                    @endif
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
