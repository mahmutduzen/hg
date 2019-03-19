@extends('admin.template')

@section('icerik')

    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Tip Ekle</h5>
                </div>
                <div class="widget-content nopadding">
                    {!! Form::open(['route'=>'fotograflar.store','method'=>'POST','class'=>'form-horizontal']) !!}
                    <div class="control-group">
                        <label class="control-label">Başlık :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="baslik" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Açıklama :</label>
                        <div class="controls">
                            <textarea class="span11" name="aciklama" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Metin :</label>
                        <div class="controls">
                            <textarea class="span11" name="Metin" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="widget-content">  <a href="#myModal2" data-toggle="modal" class="btn btn-info">Resim Seç</a>
                        <div id="myModal2" class="modal hide">
                            <div class="modal-header">
                                <button data-dismiss="modal" class="close" type="button">×</button>
                                <h3>Alert modal</h3>
                            </div>
                            <div class="modal-body">
                                <div class="control-group">
                                    <div class="controls">
                                        <select name="dosya_id" class="image-picker show-html res span12">
                                            @foreach($resimler as $resim)
                                                <option data-img-src="/{{$resim->yol}}" value="{{$resim->id}}">{{$resim->baslik}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer"> <a data-dismiss="modal" class="btn btn-primary" href="#">Confirm</a> </div>
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
    <link rel="stylesheet" href="/admin/css/bootstrap-wysihtml5.css" />
@endsection
@section('js')
    <script src="/admin/js/bootstrap-wysihtml5.js"></script>
    <script src="/admin/js/wysihtml5-0.3.0.js"></script>
    <script>
        $('.textarea_editor').wysihtml5();
        $("select.res").imagepicker();
        $("select.res").data('picker');
    </script>

@endsection
