@extends('admin.template')

@section('icerik')

    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Site Ayarları</h5>
                </div>
                <div class="widget-content nopadding">
                    <form method="POST" class="form-horizontal" action="{{ route('kullanici.kayit') }}">
                        @csrf
                        <div class="control-group">
                            <label for="name" class="control-label">{{ __('Name') }}</label>

                            <div class="controls">
                                <input id="name" type="text" class="span11{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

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
                                <input id="email" type="email" class="span11{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="password" class="control-label">{{ __('Password') }}</label>

                            <div class="controls">
                                <input id="password" type="password" class="span11{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="password-confirm" class="control-label">{{ __('Confirm Password') }}</label>

                            <div class="controls">
                                <input id="password-confirm" type="password" class="span11" name="password_confirmation" required>
                            </div>
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
