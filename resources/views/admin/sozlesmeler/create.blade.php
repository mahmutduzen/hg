@extends('admin.template')

@section('icerik')

    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Site Ayarları</h5>
                </div>
                <div class="widget-content nopadding">
                    {!! Form::model($terms,['route'=>['terms.update',1],'method'=>'PUT','class'=>'form-horizontal']) !!}

                        <div class="control-group">
                            <label class="control-label">Metin</label>
                            <div class="controls">
                                <textarea class="span11" name="metin">{{$terms->metin}}</textarea>
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
