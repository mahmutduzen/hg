@extends('admin.template')

@section('icerik')

    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Yazı Düzenle</h5>
                </div>
                <div class="widget-content nopadding">
                    {!! Form::model($yazi,['route'=>['yazilar.update',$yazi->id],'method'=>'PUT','class'=>'form-horizontal','multiple'=>true]) !!}
                    <div class="control-group">
                        <label class="control-label">Başlık :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="baslik" value="{{$yazi->baslik}}"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Metin :</label>
                        <div class="controls">
                            <textarea class="textarea_editor span11" name="metin" rows="6">{{$yazi->metin}}</textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Tip :</label>
                        <div class="controls">
                            <select name="users_id">
                                @foreach($userler as $user)
                                    @if($yazi->users->id==$user->id)
                                        <option value="{{$user->id}}" selected>{{$user->name}}</option>
                                        @else
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endif

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Kategori :</label>
                        <div class="controls">
                            <select name="kategori[]" multiple>
                                <?php $eklenen = collect([null]); ?>
                                @foreach($kategoriler as $kategori)
                                    @foreach($yazi->kategori as $secili)
                                        @if($secili->id==$kategori->id)
                                        <option value="{{$kategori->id}}" selected>{{$kategori->adi}}</option>
                                            <?php $eklenen->push($kategori->id);?>
                                        @endif
                                    @endforeach
                                    @if($eklenen->search($kategori->id))
                                        @else
                                            <option value="{{$kategori->id}}">{{$kategori->adi}}</option>
                                        @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Kategori :</label>
                        <div class="controls">
                            <select name="etiket[]" multiple>
                                <?php $eklenen = collect([null]); ?>
                                @foreach($etiketler as $etiket)
                                    @foreach($yazi->etiket as $secili)
                                        @if($secili->id==$etiket->id)
                                            <option value="{{$etiket->id}}" selected>{{$etiket->adi}}</option>
                                            <?php $eklenen->push($etiket->id);?>
                                        @endif
                                    @endforeach
                                    @if($eklenen->search($etiket->id))
                                    @else
                                        <option value="{{$etiket->id}}">{{$etiket->adi}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Video :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="video" value="{{$yazi->video}}"/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Okunma :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="okunma" value="{{$yazi->okunma}}"/>
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
                                        <select multiple="multiple" name="dosya[]" class="image-picker show-html res span12">
                                            <?php $eklenenres = collect([null]); ?>
                                            @foreach($resimler as $resim)
                                                @foreach($yazi->dosya as $sclrsm)
                                                    @if($sclrsm->id == $resim->id)
                                                        <option data-img-src="/{{$resim->yol}}" value="{{$resim->id}}" selected>{{$resim->baslik}}</option>
                                                            <?php $eklenenres->push($resim->id);?>
                                                    @endif
                                                @endforeach
                                                @if($eklenenres->search($resim->id))
                                                @else
                                                        <option data-img-src="/{{$resim->yol}}" value="{{$resim->id}}">{{$resim->baslik}}</option>
                                                @endif
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