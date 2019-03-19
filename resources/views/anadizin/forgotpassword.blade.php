@extends('anadizin.template')

@section('icerik')
    <!-- BEGIN PAGE TITLE -->
    <section id="page-title" class="page-title-dark page-title-center">
        <div class="container">
            <div class="page-title-wrapper">
                <div class="page-title-txt">
                    <h1>Forgot Password</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- END PAGE TITLE -->

    <div class="section container">
        <div class="row p-b-80">
            <div class="col-lg-4 col-md-6 m-b-50 col-lg-offset-4 col-md-offset-3">
                <div class="m-b-50">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label>Your email</label>
                            <div class="prepend-icon">
                                <input type="email" class="form-control input-lg" name="email">
                                <i class="nc-icon-outline ui-1_email-83"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-lg btn-important btn-primary btn-block">Send New password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('anadizin.footer')
@endsection
@section('css')

@endsection
@section('js')

@endsection
