@extends('admin.template')

@section('icerik')

    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Menü Düzenle</h5>
                </div>
                <div class="widget-content nopadding">
                    {!! Form::model($menu,['route'=>['menuler.update',$menu->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
                    <div class="control-group">
                        <label class="control-label">Sıra :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="sira" value="{{$menu->sira}}"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Sayfa :</label>
                        <div class="controls">
                            <select name="sayfa_id">
                                    @foreach($menuler as $mnlr)
                                        @if($menu->sayfa_id==$mnlr->id)
                                            <option value="{{$mnlr->id}}" selected>{{$mnlr->adi}}</option>
                                        @else
                                            <option value="{{$mnlr->id}}">{{$mnlr->adi}}</option>
                                        @endif
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Üst Menü :</label>
                        <div class="controls">
                            <select name="ust_id">
                                @if($menu->ust_id!=0)
                                    <option value="0">Yok</option>
                                    @foreach($menuler as $mnlr)
                                        @if($menu->ust_id==$mnlr->id)
                                            <option value="{{$mnlr->id}}" selected>{{$mnlr->adi}}</option>
                                        @else
                                            <option value="{{$mnlr->id}}">{{$mnlr->adi}}</option>
                                        @endif
                                    @endforeach
                                @else
                                    <option value="0" selected>Yok</option>
                                    @foreach($menuler as $mnlrr)
                                        <option value="{{$mnlrr->id}}">{{$mnlrr->adi}}</option>
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
