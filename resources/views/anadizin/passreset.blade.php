@extends('anadizin.template')

@section('icerik')
    <!-- BEGIN PAGE TITLE -->
    <section id="page-title" class="page-title-dark page-title-center">
        <div class="container">
            <div class="page-title-wrapper">
                <div class="page-title-txt">
                    <h1>Get Password</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- END PAGE TITLE -->

    <div class="section container">
        <div class="row p-b-80">
            <div class="col-lg-4 col-md-6 m-b-50 col-lg-offset-4 col-md-offset-3">
                <div class="m-b-50">
                    <form method="POST" action="{{route('sifre.degistir')}}">
                        @csrf
                        <div class="form-group">
                            <label>Your email</label>
                            <div class="prepend-icon">
                                <input type="email" class="form-control input-lg" name="email">
                                <i class="nc-icon-outline ui-1_email-83"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="prepend-icon">
                                <input type="password" class="form-control input-lg" name="password">
                                <i class="nc-icon-outline ui-1_email-83"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password Confirm</label>
                            <div class="prepend-icon">
                                <input type="password" class="form-control input-lg" name="password_confirmation">
                                <i class="nc-icon-outline ui-1_email-83"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-lg btn-important btn-primary btn-block">Send New password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('css')
    <!-- BEGIN PAGE STYLE -->
    <link rel="stylesheet" href="/assets/css/form.css"/>
    <link rel="stylesheet" href="/assets/css/pages.css"/>
    <!-- END PAGE STYLE -->
@endsection
@section('js')
    <script src="/assets/js/libs/jquery/dist/jquery.min.js"></script>
    <script src="/assets/js/libs/jquery-ui/jquery-ui.min.js"></script>
    <script src="/assets/js/libs/gsap/src/minified/TweenMax.min.js"></script>
    <script src="/assets/js/libs/gsap/src/minified/plugins/ScrollToPlugin.min.js"></script>
    <script src="/assets/js/libs/tether/dist/js/tether.min.js"></script>
    <script src="/assets/js/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/assets/js/libs/superfish/dist/js/superfish.min.js"></script>
    <script src="/assets/js/libs/appear/jquery.appear.js"></script>
    <script src="/assets/js/libs/skrollr/dist/skrollr.min.js"></script>
    <script src="/assets/js/libs/easyticker-jquery/jquery.easy-ticker.min.js"></script>
    <script src="/assets/js/navigation.js"></script>
    <script src="/assets/js/search.js"></script>
    <script src="/assets/js/builder.js"></script>
    <script src="/assets/js/main.js"></script>
@endsection
