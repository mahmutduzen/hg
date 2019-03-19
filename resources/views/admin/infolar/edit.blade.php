@extends('admin.template')

@section('icerik')

    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Etiket Düzenle</h5>
                </div>
                <div class="widget-content nopadding">
                    {!! Form::model($info,['route'=>['infolar.update',$info->id],'method'=>'PUT','class'=>'form-horizontal']) !!}


                    <div class="control-group">
                        <label class="control-label">Ürün :</label>
                        <div class="controls">
                            <select name="urun_id">
                                @foreach($urunler as $urun)
                                    @if($urun->id == $info->urun_id)
                                    <option value="{{$urun->id}}" selected>{{$urun->baslik}}</option>
                                        @else
                                        <option value="{{$urun->id}}">{{$urun->baslik}}</option>
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
