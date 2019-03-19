@extends('admin.template')

@section('icerik')

    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Site Ayarları</h5>
                </div>
                <div class="widget-content nopadding">
                    {!! Form::open(['route'=>'infolar.store','method'=>'POST','class'=>'form-horizontal']) !!}

                    <div class="control-group">
                        <label class="control-label">Ürün :</label>
                        <div class="controls">
                            <select name="urun_id">
                                @foreach($urunler as $urun)
                                    <option value="{{$urun->id}}">{{$urun->baslik}}</option>
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
