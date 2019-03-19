@extends('admin.template')

@section('icerik')

    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Yazı Düzenle</h5>
                </div>
                <div class="widget-content nopadding">
                    {!! Form::model($urun,['route'=>['urunler.update',$urun->id],'method'=>'PUT','class'=>'form-horizontal','multiple'=>true]) !!}
                    <div class="control-group">
                        <label class="control-label">Başlık :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="baslik" value="{{$urun->baslik}}"/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Kısa Açıklama :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="aciklama" value="{{$urun->aciklama}}"/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Fiyat :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="fiyat" value="{{$urun->fiyat}}"/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Metin :</label>
                        <div class="controls">
                            <textarea class="textarea_editor span11" name="metin" rows="6">{{$urun->metin}}</textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Detay :</label>
                        <div class="controls">
                            <textarea class="span11" name="detay" rows="6">{{$urun->detay}}</textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Kategori :</label>
                        <div class="controls">
                            <select name="ozellik[]" multiple>
                                <?php $eklenen = collect([null]); ?>
                                @foreach($ozellikler as $ozellik)
                                    @foreach($urun->ozellik as $secili)
                                        @if($secili->id==$ozellik->id)
                                            <option value="{{$ozellik->id}}" selected>{{$ozellik->baslik}}</option>
                                            <?php $eklenen->push($ozellik->id);?>
                                        @endif
                                    @endforeach
                                    @if($eklenen->search($ozellik->id))
                                    @else
                                        <option value="{{$ozellik->id}}">{{$ozellik->baslik}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Kategori :</label>
                        <div class="controls">
                            <select name="marka[]" multiple>
                                <?php $eklenen = collect([null]); ?>
                                @foreach($markalar as $marka)
                                    @foreach($urun->marka as $secili)
                                        @if($secili->id==$marka->id)
                                        <option value="{{$marka->id}}" selected>{{$marka->adi}}</option>
                                            <?php $eklenen->push($marka->id);?>
                                        @endif
                                    @endforeach
                                    @if($eklenen->search($marka->id))
                                        @else
                                            <option value="{{$marka->id}}">{{$marka->adi}}</option>
                                        @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Etiket :</label>
                        <div class="controls">
                            <select name="etiket[]" multiple>
                                <?php $eklenen = collect([null]); ?>
                                @foreach($etiketler as $etiket)
                                    @foreach($urun->etiket as $secili)
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


                    <div class="widget-content">  <a href="#myModal2" data-toggle="modal" class="btn btn-info">Resim Seç</a>
                        <div id="myModal2" class="modal hide">
                            <div class="modal-header">
                                <button data-dismiss="modal" class="close" type="button">×</button>
                                <h3>Resim Seç</h3>
                            </div>
                            <div class="modal-body">
                                <div class="control-group">
                                    <div class="controls">
                                        <select multiple="multiple" name="dosya[]" class="image-picker show-html res span12">
                                            <?php $eklenenres = collect([null]); ?>
                                            @foreach($resimler as $resim)
                                                @foreach($urun->dosya as $sclrsm)
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
