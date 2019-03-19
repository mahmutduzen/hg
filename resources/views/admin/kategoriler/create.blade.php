@extends('admin.template')

@section('icerik')

    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Kategori Ekle</h5>
                </div>
                <div class="widget-content nopadding">
                    {!! Form::open(['route'=>'kategoriler.store','method'=>'POST','class'=>'form-horizontal']) !!}
                    <div class="control-group">
                        <label class="control-label">Adı :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="adi" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Üst Kategori :</label>
                        <div class="controls">
                            <select name="ust_id">
                                <option value="0">Boş</option>
                                @foreach($kategoriler as $ktgr)
                                    <option value="{{$ktgr->id}}">{{$ktgr->adi}}</option>
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
