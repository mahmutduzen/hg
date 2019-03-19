@extends('anadizin.template')

@section('icerik')
    <!-- Ürün Sayfası -->
    <!-- BEGIN SHOP -->
    <!-- BEGIN HEADER -->
    <!-- BEGIN PAGE TITLE -->
    <section id="page-title" class="page-title-dark page-title-center">
        <div class="container">
            <div class="page-title-wrapper">
                <div class="page-title-txt">
                    <h1>Search Result</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- END HEADER -->
    <div id="shop" class="shop-list">
        <!-- BEGIN TOP SORTING OPTIONS -->
        <div class="sort-options">
            <div class="row">
                <div class="col-xs-6">
                    <div class="select-filters">
                        <form method="get" action="#" class="form-sort-price">
                            <select class="select-picker select-filter" title="Order by Popularity">
                                <option>Last added</option>
                                <option>Price higher - lower</option>
                                <option>Price lower - higher</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END TOP SORTING OPTIONS -->
        <div class="row">
            <!-- BEGIN PRODUCTS LIST -->
            <div class="products-list col-md-12">
                <div class="row">
                        @foreach($sonuc as $urunler)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="product">
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <div class="row">
                                                    <div class="col-md-6 product-quickview">

                                                    </div>
                                                    <div class="col-md-6 product-wishlist" style="margin-bottom: 25px">
                                                        <a href="{{route('favori.ekle',$urunler->id)}}"><i class="fa fa-heart-o"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info" style="margin-top: 25px;">
                                            <p class="product-name"><a href="/produkt/{{$urunler->id}}/{{str_slug($urunler->baslik)}}">{{$urunler->baslik}}</a></p>
                                            <p class="product-price">€@if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->onay == 1)
                                            {{$urunler->fiyat}}
                                        @endif</p>
                                        </div>
                                        <div class="product-info">
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            @if($urunler->stok == 1)
                                            <a href="{{route('sepet.ekle',$urunler->id)}}" class="add-to-cart" data-toggle="tooltip" data-placement="bottom" data-html="true" title="<p>Add to Cart</p>">Add to cart</a>
                                            @else
                                                Out of stock
                                            @endif
                                        </div>
                                    </div>
                                </div>
                        @endforeach

                </div>
            </div>
            <!-- END PRODUCTS LIST -->
        </div>
    </div>
    <!-- END SHOP -->

    @include('anadizin/footer')

@endsection
@section('css')
    <!-- BEGIN PAGE STYLE -->
    <link rel="stylesheet" href="/assets/js/libs/magnific-popup/dist/magnific-popup.css"/>
    <link rel="stylesheet" href="/assets/js/libs/flexslider/flexslider.css"/>
    <link rel="stylesheet" href="/assets/js/libs/select2/dist/css/select2.min.css"/>
    <link rel="stylesheet" href="/assets/js/libs/toastr/toastr.min.css"/>
    <link rel="stylesheet" href="/assets/js/libs/owl.carousel/dist/assets/owl.carousel.css" />
    <link rel="stylesheet" href="/assets/js/libs/owl.carousel/dist/assets/owl.theme.default.min.css"/>
    <link rel="stylesheet" href="/assets/css/blog.css"/>
    <link rel="stylesheet" href="/assets/css/form.css"/>
    <link rel="stylesheet" href="/assets/css/ecommerce.css"/>
    <link rel="stylesheet" href="/assets/css/sliders.css"/>
    <!-- END PAGE STYLE -->
    <!-- BEGIN PAGE STYLE -->
    <link rel="stylesheet" href="/assets/js/plugins/revolution-slider/revolution/css/settings.css"/>
    <link rel="stylesheet" href="/assets/js/plugins/revolution-slider/revolution/css/navigation.css"/>
    <link rel="stylesheet" href="/assets/js/libs/video.js/dist/video-js/video-js.min.css"/>
    <link rel="stylesheet" href="/assets/js/libs/videojs-sublime-skin/dist/videojs-sublime-skin.min.css"/>
    <link rel="stylesheet" href="/assets/css/hover-effects.css"/>
    <link rel="stylesheet" href="/assets/css/masonry.css"/>
    <link rel="stylesheet" href="assets/css/blog.css"/>
    <!-- END PAGE STYLE -->
@endsection
@section('js')
    <!-- BEGIN PAGE SCRIPT -->
    <script src="/assets/js/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="/assets/js/libs/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="/assets/js/libs/flexslider/jquery.flexslider-min.js"></script>
    <script src="/assets/js/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="/assets/js/libs/jquery.fitvids/jquery.fitvids.js"></script>
    <script src="/assets/js/libs/toastr/toastr.min.js"></script>
    <script src="/assets/js/libs/raty/lib/jquery.raty.js"></script>
    <script src="/assets/js/ecommerce.js"></script>
    <script src="/assets/js/sliders.js"></script>
    <!-- END PAGE SCRIPT -->
    <!-- BEGIN PAGE SCRIPT -->
    <script src="/assets/js/libs/bootstrap-validator/dist/validator.min.js"></script>
    <script src="http://maps.google.com/maps/api/js"></script>
    <script src="/assets/js/libs/gmaps/gmaps.min.js"></script>
    <script src="/assets/js/map.js"></script>
    <script src="/assets/js/widgets.js"></script>
    <!-- END PAGE SCRIPT -->
    <!-- BEGIN PAGE SCRIPT -->
    <script src="/assets/js/plugins/revolution-slider/revolution/js/jquery.themepunch.tools.min.js?rev=5.0"></script>
    <script src="/assets/js/plugins/revolution-slider/revolution/js/jquery.themepunch.revolution.min.js?rev=5.0"></script>
    <script src="/assets/js/libs/jquery.fitvids/jquery.fitvids.js"></script>
    <script src="/assets/js/libs/video.js/dist/video-js/video.js"></script>
    <script src="/assets/js/libs/isotope/dist/isotope.pkgd.min.js"></script>
    <script src="/assets/js/libs/isotope-packery/packery-mode.pkgd.min.js"></script>
    <script src="/assets/js/masonry.js"></script>

    <script src="assets/js/libs/bootpag/lib/jquery.bootpag.min.js"></script>
    <script src="assets/js/blog.js"></script>
@endsection
