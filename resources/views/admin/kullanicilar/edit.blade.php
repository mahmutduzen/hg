@extends('admin.template')

@section('icerik')

    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Kullanıcı Düzenle</h5>
                </div>
                <div class="widget-content nopadding">
                    <form method="POST" class="form-horizontal" action="{{ route('kullanici.update',$kullanici->id) }}">
                        @csrf
                        <div class="control-group">
                            <label for="name" class="control-label">{{ __('Name') }}</label>

                            <div class="controls">
                                <input id="name" type="text" class="span11{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $kullanici->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="email" class="control-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="controls">
                                <input id="email" type="email" class="span11{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $kullanici->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="yetki" class="control-label text-md-right">{{ __('Yetki') }}</label>

                            <div class="controls">
                                <input id="yetki" type="text" class="span11{{ $errors->has('yetki') ? ' is-invalid' : '' }}" name="yetki" value="{{ $kullanici->yetki }}" required>

                                @if ($errors->has('yetki'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('yetki') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="onay" class="control-label text-md-right">{{ __('Onay') }}</label>

                            <div class="controls">
                                <input id="onay" type="text" class="span11{{ $errors->has('onay') ? ' is-invalid' : '' }}" name="onay" value="{{ $kullanici->onay }}" required>

                                @if ($errors->has('onay'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('onay') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="yok" class="control-label text-md-center">{{ __('Onaylı hesaplar 1 onaysız hesaplar 0 dır.') }}</label>
                        </div>


                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('css')

@endsection
@section('js')

@endsection
