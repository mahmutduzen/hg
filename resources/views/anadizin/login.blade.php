@extends('anadizin.template')

@section('icerik')
    <!-- BEGIN PAGE TITLE -->
    <section id="page-title" class="page-title-dark page-title-center">
        <div class="container">
            <div class="page-title-wrapper">
                <div class="page-title-txt">
                    <h1>Login</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- END PAGE TITLE -->

        <!-- BEGIN LOGIN -->
        <section class="section container p-b-100">
            <div class="row">
                <div class="col-md-6">
                    <div class="border p-30 m-b-30">
                        <h3 class="m-t-0">Connect to your Account</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email"></label>{{ __('E-Mail Address') }}</label>

                                    <input id="email" type="email" class="input-lg form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="input-lg form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary btn-important m-b-0">{{ __('Login') }}</button>
                        </form>
                        <a href="password-recover" class="pull-right">Forgot password?</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="grey lighten-4 p-30 m-b-30">
                        <h3 class="m-t-0">Create an Account</h3>
                        <p><strong>Don't have an account yet?</strong></p>
                        <p>You can create your acount quickly to save your wishlist, your address and other usefull info.</p>
                        <div class="m-t-40">
                            <a href="register" class="btn btn-lg btn-dark btn-important m-b-0">Create my account</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END LOGIN -->

        <section class="section-call-to-action action-lg grey lighten-4">
            <div class="action-wrapper">
                <div class="container">
                    <div class="action-text">
                        <h3 class="action-title">Want more? Choose premium plan</h3>
                        <p class="action-subtitle">Get high quality services &amp; awesome offer</p>
                    </div>
                    <div class="action-btn">
                        <a href="#" class="btn btn-lg btn-dark btn-bordered btn-square icon-left-effect"><i class="nc-icon-outline ui-1_email-85"></i><span>See pricing</span></a>
                    </div>
                </div>
            </div>
        </section>




@endsection
@section('css')
    <link rel="stylesheet" href="/assets/css/form.css"/>
    <link rel="stylesheet" href="/assets/css/pages.css"/>
@endsection
@section('js')
    <!-- BEGIN PAGE SCRIPT -->
    <script src="/assets/js/widgets.js"></script>
    <!-- END PAGE SCRIPT -->
@endsection
