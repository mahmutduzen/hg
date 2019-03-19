@extends('anadizin.template')

@section('icerik')
    <!-- BEGIN PAGE TITLE -->
    <section id="page-title" class="page-title-dark page-title-center">
        <div class="container">
            <div class="page-title-wrapper">
                <div class="page-title-txt">
                    <h1>Register</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- END PAGE TITLE -->
        <!-- BEGIN REGISTER -->
        <div class="section container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-xs-10 col-lg-offset-3 col-md-offset-2 col-xs-offset-1">
                    <div class="m-b-100">
                        <form method="POST" action="{{ route('register') }}" class="form-register">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6 required">
                                    <div class="form-group">
                                        <label>Firstname</label>
                                        <div class="prepend-icon">
                                            <input type="text" name="name" class="form-control input-lg" required>
                                            <i class="nc-icon-outline users_single-03"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Lastname</label>
                                        <div class="prepend-icon">
                                            <input type="text" name="surname" class="form-control input-lg" required>
                                            <i class="nc-icon-outline users_single-03"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label>Email</label>
                                <div class="prepend-icon">
                                    <input type="email" name="email" class="form-control input-lg" required>
                                    <i class="nc-icon-outline ui-1_email-83"></i>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label>Phone Number</label>
                                <div class="prepend-icon">
                                    <input type="text" pattern="[0-9]" name="phone" class="form-control input-lg" required>
                                    <i class="nc-icon-outline ui-1_email-83"></i>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Para Birimi</label>
                                        <select class="form-control" data-container-class="input-lg" data-search="true" name="parabirimi" required>
                                            <option value="2">TL</option>
                                            <option value="1">EURO</option>
                                            <option value="3">DOLAR</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of birth</label>
                                        <div class="prepend-icon">
                                            <input type="text" name="dogum_tarihi" class="form-control datepicker input-lg" data-view="2" placeholder="choose a date" required>
                                            <i class="nc-icon-outline ui-1_calendar-57"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 required">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="prepend-icon">
                                            <input type="password" name="password" class="form-control input-lg" required>
                                            <i class="nc-icon-outline ui-1_lock"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 required">
                                    <div class="form-group">
                                        <label>Repeat Password</label>
                                        <div class="prepend-icon">
                                            <input type="password" name="password_confirmation" class="form-control input-lg" required>
                                            <i class="nc-icon-outline ui-1_lock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="terms" required>
                                <label for="terms">I agree with <a href="seite/26/terms">terms</a> and conditions</label>
                            </div>
                            <div class="m-t-20">
                                <button type="submit" id="submit-form" class="btn btn-lg btn-important btn-primary btn-block">Create my account</button>
                            </div>
                        </form>
                        <p class="m-t-20">Already have an account? <a href="{{route('login')}}"><strong>Login</strong></a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END REGISTER -->


@endsection
@section('css')
    <link rel="stylesheet" href="/assets/js/libs/select2/dist/css/select2.min.css"/>
    <link rel="stylesheet" href="/assets/css/form.css"/>
@endsection
@section('js')
    <!-- BEGIN PAGE SCRIPT -->
    <script src="/assets/js/libs/select2/dist/js/select2.full.min.js"></script>
    <!-- END PAGE SCRIPT -->
@endsection
