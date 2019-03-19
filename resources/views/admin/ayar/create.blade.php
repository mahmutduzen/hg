@extends('admin.template')

@section('icerik')

    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Site Ayarları</h5>
                </div>
                <div class="widget-content nopadding">
                    {!! Form::model($ayarlar,['route'=>['ayarlar.update',1],'method'=>'PUT','class'=>'form-horizontal']) !!}
                        <div class="control-group">
                            <label class="control-label">Title :</label>
                            <div class="controls">
                                <input type="text" class="span11" name="title" value="{{$ayarlar->title}}" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Desc :</label>
                            <div class="controls">
                                <input type="text" class="span11" name="desc" value="{{$ayarlar->desc}}" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Keyword :</label>
                            <div class="controls">
                                <input type="text" class="span11" name="keyw" value="{{$ayarlar->keyw}}" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">mail :</label>
                            <div class="controls">
                                <input type="text" class="span11" name="mail" value="{{$ayarlar->mail}}" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">logo :</label>
                            <div class="controls">
                                <input type="text" class="span11" name="logo" value="{{$ayarlar->logo}}" />
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label">Sosyal Medya</label>
                            <div class="controls">
                                <textarea class="span11" name="sosyal">{{$ayarlar->sosyal}}</textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Bilgiler</label>
                            <div class="controls">
                                <textarea class="span11" name="bilgiler">{{$ayarlar->bilgiler}}</textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Footer</label>
                            <div class="controls">
                                <textarea class="span11" name="footer">{{$ayarlar->footer}}</textarea>
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
