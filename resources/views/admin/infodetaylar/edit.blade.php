@extends('admin.template')

@section('icerik')

    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Etiket Düzenle</h5>
                </div>
                <div class="widget-content nopadding">
                    {!! Form::model($infoDetay,['route'=>['infodetaylar.update',$infoDetay->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
                    <div class="control-group">
                        <label class="control-label">Başlık :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="baslik" value="{{$infoDetay->baslik}}" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Özellik :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="ozellik" value="{{$infoDetay->ozellik}}" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Ürün :</label>
                        <div class="controls">
                            <select name="info_id">
                                @foreach($infolar as $info)
                                    @if($info->id == $infoDetay->info_id)
                                    <option value="{{$info->id}}" selected>{{$info->urun[0]->baslik}}</option>
                                        @else
                                        <option value="{{$info->id}}">{{$info->urun[0]->baslik}}</option>
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
