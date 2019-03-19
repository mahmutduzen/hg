@extends('anadizin.template')

@section('icerik')
    <!-- BEGIN PAGE TITLE -->
    <section id="page-title" class="page-title-dark page-title-center">
        <div class="container">
            <div class="page-title-wrapper">
                <div class="page-title-txt">
                    <h1>Transaction Successful</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- END PAGE TITLE -->

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                <p>Go <a href="{{route('profil')}}">profile</a></p>
                <p><a href="{{route('anasayfa')}}">continue shopping</a></p>
                </div>
            </div>
        </div>
    </section>
    @include('anadizin.footer')
@endsection
@section('css')
    <!-- BEGIN PAGE STYLE -->
    <link rel="stylesheet" href="/assets/js/libs/select2/dist/css/select2.min.css"/>
    <link rel="stylesheet" href="/assets/js/libs/owl.carousel/dist/assets/owl.carousel.css" />
    <link rel="stylesheet" href="/assets/js/libs/owl.carousel/dist/assets/owl.theme.default.min.css"/>
    <link rel="stylesheet" href="/assets/css/form.css"/>
    <link rel="stylesheet" href="/assets/css/ecommerce.css"/>
    <link rel="stylesheet" href="/assets/css/pages.css"/>
    <!-- END PAGE STYLE -->
@endsection
@section('js')
    <!-- BEGIN PAGE SCRIPT -->
    <script src="/assets/js/libs/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="/assets/js/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="/assets/js/libs/jquery.fitvids/jquery.fitvids.js"></script>
    <script src="/assets/js/ecommerce.js"></script>
    <script src="/assets/js/sliders.js"></script>
    <!-- END PAGE SCRIPT -->
@endsection
