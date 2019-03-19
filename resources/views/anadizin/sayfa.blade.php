@extends('anadizin.template')

@section('icerik')
        @if($sayfa->sitil->id==3)
            <!--Normal sayfa-->
            <!--Hakkımızda sayfası-->
            <!-- BEGIN PAGE TITLE -->
            <section id="page-title" class="page-title-dark page-title-center">
                <div class="container">
                    <div class="page-title-wrapper">
                        <div class="page-title-txt">
                            <h1>{{$sayfa->baslik}}</h1>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PAGE TITLE -->
            <section class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p>Tempore quo primis auspiciis in mundanum fulgorem surgeret victura dum erunt homines Roma, ut augeretur sublimibus incrementis, foedere pacis aeternae Virtus convenit atque Fortuna plerumque dissidentes, quarum si altera defuisset, ad perfectam
                                non venerat summitatem.</p><br>
                            <p>Siquis enim militarium vel honoratorum aut nobilis inter suos rumore tenus esset insimulatus fovisse partes hostiles, iniecto onere catenarum in modum beluae trahebatur et inimico urgente vel nullo, quasi sufficiente hoc solo, quod nominatus
                                esset aut delatus aut postulatus, capite vel multatione bonorum aut insulari solitudine damnabatur.</p>
                        </div>
                    </div>
                </div>
            </section>
            @include('anadizin/footer')
        @elseif($sayfa->sitil->id==4)
            <!--Blog sayfası-->
            <!-- BEGIN PAGE TITLE -->
            <section id="page-title" class="page-title-dark page-title-center">
                <div class="container">
                    <div class="page-title-wrapper">
                        <div class="page-title-txt">
                            <h1>{{$sayfa->baslik}}</h1>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PAGE TITLE -->
            <section class="section-blog">
                <div id="blog-main" class="container-large">
                    <div class="blog-wrapper">
                        <div class="posts masonry masonry-layout masonry-grid grid grid-2">
                            <?php $eklenenyazi = collect([null]); ?>
                            @foreach($sayfa->kategori as $kategoriler)
                                @foreach($kategoriler->yazi as $yazilar)
                                    @if (!$eklenenyazi->search($yazilar->id))
                                        <?php $eklenenyazi->push($yazilar->id); ?>
                                        @if($yazilar->video == Null)
                                            @if($yazilar->dosya->count()>1)
                                            <div class="item branding travel photography">
                                                <div class="item-wrapper">
                                                    <div class="post">
                                                        <div class="post-medias">
                                                            <div class="flexslider" data-plugin-options='{"animation":"slide","controlNav":false,"directionNav":true,"slideshowSpeed":3500}'>
                                                                <ul class="slides">
                                                                    @foreach($yazilar->dosya as $dosya)
                                                                    <li>
                                                                        <a href="/schreiben/{{$yazilar->id}}/{{str_slug($yazilar->baslik)}}">
                                                                            <img src="/{{$dosya->yol}}" alt="{{$dosya->baslik}}">
                                                                        </a>
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="post-info">
                                                            <h2 class="post-title"><a href="/schreiben/{{$yazilar->id}}/{{str_slug($yazilar->baslik)}}">{{$yazilar->baslik}}</a></h2>
                                                            <ul class="post-meta">
                                                                <li>
                                                                    by <a href="#">{{$yazilar->users->name}}</a>
                                                                </li>
                                                            </ul>
                                                            <div class="post-excerpt">
                                                                <?php echo nl2br(substr($yazilar->metin,0,150)); ?>
                                                            </div>
                                                            <a href="/schreiben/{{$yazilar->id}}/{{str_slug($yazilar->baslik)}}" class="more">Read More </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                @else
                                                <div class="item design photography">
                                                    <div class="item-wrapper">
                                                        <div class="post">
                                                            <div class="post-medias">
                                                                <figure class="he-2 no-caption">
                                                                    @foreach($yazilar->dosya as $dosya)
                                                                        <img src="/{{$dosya->yol}}" alt="{{$dosya->baslik}}">
                                                                    @endforeach
                                                                    <div class="hover-icons">
                                                                        <div class="hover-icons-wrapper">
                                                                            <p>
                                                                                @foreach($yazilar->kategori as $ktgr)
                                                                                    {{$ktgr->adi}}
                                                                                @endforeach
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </figure>
                                                            </div>
                                                            <div class="post-info">
                                                                <h2 class="post-title"><a href="/schreiben/{{$yazilar->id}}/{{str_slug($yazilar->baslik)}}">{{$yazilar->baslik}}</a></h2>
                                                                <ul class="post-meta">
                                                                    <li>
                                                                        by <a href="#">{{$yazilar->users->name}}</a>
                                                                    </li>
                                                                </ul>
                                                                <div class="post-excerpt">
                                                                    <?php echo nl2br(substr($yazilar->metin,0,150)); ?>
                                                                </div>
                                                                <a href="/schreiben/{{$yazilar->id}}/{{str_slug($yazilar->baslik)}}" class="more">Read More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            @else

                                                <div class="item branding travel">
                                                    <div class="item-wrapper">
                                                        <div class="post">
                                                            <div class="post-medias">
                                                                <div class="video-embed">
                                                                    <iframe src="{{$yazilar->video}}" width="400" height="225" allowfullscreen></iframe>
                                                                </div>
                                                            </div>
                                                            <div class="post-info">
                                                                <h2 class="post-title"><a href="/schreiben/{{$yazilar->id}}/{{str_slug($yazilar->baslik)}}">{{$yazilar->baslik}}</a></h2>
                                                                <ul class="post-meta">
                                                                    <li>
                                                                        by <a href="#">{{$yazilar->users->name}}</a>
                                                                    </li>
                                                                </ul>
                                                                <div class="post-excerpt">
                                                                    <?php echo nl2br(substr($yazilar->metin,0,50)); ?>
                                                                </div>
                                                                <a href="/schreiben/{{$yazilar->id}}/{{str_slug($yazilar->baslik)}}" class="more">Read More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                    @endif
                                    @endforeach
                            @endforeach


                        </div>
                    </div>
                </div>
            </section>
            <!-- END BLOG -->
            @include('anadizin/footer')
        @elseif($sayfa->sitil->id==5)
            <!-- Ürün Sayfası -->
            <!-- BEGIN SHOP -->
            <!-- BEGIN HEADER -->
            <!-- BEGIN HEADER -->
            <!-- BEGIN PAGE TITLE -->
            <section id="page-title" class="page-title-dark page-title-center">
                <div class="container">
                    <div class="page-title-wrapper">
                        <div class="page-title-txt">
                            <h1>{{$sayfa->baslik}}</h1>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PAGE TITLE -->
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
                            <?php $eklenenyazi = collect([null]); ?>
                            @foreach($sayfa->marka as $markalar)
                                <?php $urunler1 = $markalar->urun()->paginate(12); ?>
                                @foreach($urunler1 as $urunler)
                                    @if (!$eklenenyazi->search($urunler->id))
                                        <?php $eklenenyazi->push($urunler->id); ?>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="product">
                                    <div class="product-img">
                                        <ul class="product-wrapper">
                                            <?php $x =0; ?>
                                            @foreach($urunler->dosya as $resim)
                                                @if($x == 0)
                                                    <?php $x++; ?>
                                                    <li class="selected">
                                                        <img src="/{{$resim->yol}}" alt="Preview image">
                                                    </li>
                                                    @else
                                                        <li>
                                                            <img src="/{{$resim->yol}}" alt="Preview image">
                                                        </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <div class="row">
                                                <div class="col-md-6 product-quickview">

                                                </div>
                                                <div class="col-md-6 product-wishlist">
                                                    <a href="{{route('favori.ekle',$urunler->id)}}"><i class="fa fa-heart-o"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-info">
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
                                    @endif
                                 @endforeach
                            @endforeach
                            <div class="clearfix"></div>
                            {{ $urunler1->links() }}
                        </div>
                    </div>
                    <!-- END PRODUCTS LIST -->
                </div>
            </div>
            <!-- END SHOP -->

            @include('anadizin/footer')
        @elseif($sayfa->sitil->id==6)
            <!--iletişim sayfası-->
            <!-- BEGIN PAGE TITLE -->
            <section id="page-title" class="page-title-dark page-title-center">
                <div class="container">
                    <div class="page-title-wrapper">
                        <div class="page-title-txt">
                            <h1>{{$sayfa->baslik}}</h1>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PAGE TITLE -->

            <!-- BEGIN CONTACT SECTION -->
            <section class="section">
                <div class="container p-b-60">
                    <div class="row">
                        <div class="col-sm-7">
                            <form role="form" action="{{route('iletisim.kaydet')}}" method="POST" id="contactForm" data-toggle="validator">
                                {{ @csrf_field() }}
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="prepend-icon">
                                                    <input type="text" id="name" name="name" class="form-control input-lg" placeholder="Your name" required>
                                                    <i class="nc-icon-outline users_single-03"></i>
                                                </div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="prepend-icon">
                                                    <input type="email" id="email" name="email" class="form-control input-lg" placeholder="Email" required>
                                                    <i class="nc-icon-outline ui-1_email-85"></i>
                                                </div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="subject" name="subject" class="form-control input-lg" type="text" required="required" placeholder="Subject" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" id="service" name="service" data-container-class="input-lg" data-placeholder="Choose a Service" required>
                                            <option>&nbsp;</option>
                                            <option value="Marketing">Marketing</option>
                                            <option value="Technic">Technic</option>
                                            <option value="Press">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea id="message" name="message" class="form-control" rows="10" name="contact-message" placeholder="Message" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <button type="submit" id="form-submit" class="btn btn-primary btn-lg icon-left-effect"><i class="nc-icon-outline ui-1_email-85"></i><span>Send message</span></button>
                                <div id="msgSubmit" class="hidden"></div>
                            </form>
                        </div>
                        <div class="col-sm-4 col-md-offset-1">
                            <h3 class="t-important m-t-0">Our Office</h3>
                            <p>  Schießtäle 18 <br> 71083 Herrenberg<br> Deutschland</p>
                            <p><strong>Phone</strong>: +49 1525 5409763</p>
                            <p><strong>Email</strong>: info@keyss.de</p>
                            <div class="icon-rounded icon-hover icon-line m-t-20">
                                <a href="#" class="icon-google-plus" data-toggle="tooltip" title="" data-original-title="Google">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                                <a href="#" class="icon-facebook" data-toggle="tooltip" title="" data-original-title="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#" class="icon-youtube" data-toggle="tooltip" title="" data-original-title="Youtube">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END CONTACT SECTION -->

            <!-- BEGIN MAP FULLWIDTH -->
            <div class="fullwidth grey lighten-4">
                <div class="map" id="map-fullwidth" data-map-height="400" data-map-style="blue" data-plugin-options='{"zoom":20,"address":"Schießtäle 18, 71083 Herrenberg, Almanya","panControl":false,"mapTypeControl":false}'></div>
            </div>
            <!-- END MAP FULLWIDTH -->

            @include('anadizin/footer')
        @elseif($sayfa->sitil->id==7)
            <!--Hakkımızda sayfası-->
            <!-- BEGIN PAGE TITLE -->
            <section id="page-title" class="page-title-dark page-title-center">
                <div class="container">
                    <div class="page-title-wrapper">
                        <div class="page-title-txt">
                            <h1>{{$sayfa->baslik}}</h1>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PAGE TITLE -->
            <section class="section">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <?php echo nl2br($sayfa->metin); ?>
                        </div>
                    </div>
                </div>
            </section>
            @include('anadizin/footer')
        @elseif($sayfa->sitil->id==8)
            <!-- ürün kategori sayfası-->
            <!-- BEGIN PAGE TITLE -->
            <section id="page-title" class="page-title-dark page-title-center">
                <div class="container">
                    <div class="page-title-wrapper">
                        <div class="page-title-txt">
                            <h1>{{$sayfa->baslik}}</h1>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PAGE TITLE -->
            <!-- BEGIN CATEGORIES SLIDER -->
            <section class="m-t-30">
                <div class="container-fluid fullwidth">
                    <div class="owl-carousel owl-theme product-carousel" data-items-desktop="4" data-items-tablet="3" data-plugin-options='{"items":4,"margin":30}'>

                        @if($markalar)
                            @foreach($markalar as $marka)
                                <div class="item">
                                    <div class="item-wrapper">
                                        @if($marka->sayfa)
                                            @foreach($marka->sayfa as $syfmrk)
                                                @if($syfmrk->id && $syfmrk->baslik)
                                                <a href="/seite/{{$syfmrk->id}}/{{str_slug($syfmrk->baslik)}}">
                                                @endif
                                            @endforeach
                                        @else
                                            <a href="#">
                                        @endif
                                            <figure class="he-center">
                                                <img src="/{{$marka->dosya->yol}}" alt="ecommerce"/>
                                                <div class="section-overlay" style="opacity:0.2;"></div>
                                                <figcaption>
                                                    <h2 class="t-important t-center"><span>{{$marka->adi}}</span></h2>
                                                    <p class="category-desc">{{$marka->urun->count()}} products</p>
                                                </figcaption>
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif


                    </div>
                </div>
            </section>
            <!-- END CATEGORIES SLIDER -->

            @include('anadizin.footer')
        @elseif($sayfa->sitil->id ==9)
            <!--Normal sayfa-->
            <!--Hakkımızda sayfası-->
            <!-- BEGIN PAGE TITLE -->
            <section id="page-title" class="page-title-dark page-title-center">
                <div class="container">
                    <div class="page-title-wrapper">
                        <div class="page-title-txt">
                            <h1>{{$sayfa->baslik}}</h1>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PAGE TITLE -->
            <section class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            {{nl2br($terms->metin)}}
                        </div>
                    </div>
                </div>
            </section>
            @include('anadizin/footer')
        @endif


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
    <link rel="stylesheet" href="assets/js/libs/bxslider-4/dist/jquery.bxslider.min.css"/>
    <link rel="stylesheet" href="assets/js/plugins/slick-modal/sm-minified.css"/>

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




    <!-- BEGIN PAGE SCRIPT -->
    <script src="assets/js/libs/bxslider-4/dist/jquery.bxslider.min.js"></script>
    <script src="assets/js/plugins/slick-modal/jquery.slick-modals.min.js"></script>
    <!-- END PAGE SCRIPT -->

@endsection
