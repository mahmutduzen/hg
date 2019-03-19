@extends('anadizin.template')

@section('icerik')
    @include('anadizin/slider')

   <!-- <Button class="btn btn-lg btn-primary m-t-30 go-next" style="opacity:0.6" >Randevu Al</Button>-->
    
    <!-- BEGIN PRODUCTS EXTENDED -->
      <div class="container-fluid">
        <div class="row extended-product extended-third">
          <div class="col-lg-4 col-md-6 extended-product-img animated" data-animation="fadeIn" data-animation-delay="200">
            <div class="extended-product-img-wrapper img-cover" data-bg-img="ecommerce/bag.jpg"></div>
          </div>
          <div class="col-lg-4 col-md-6 extended-product-desc animated" data-animation="fadeIn" data-animation-delay="400">
            <div class="extended-product-desc-wrapper">
              <div class="product-single brown lighten-5">
                <div class="t-center">
                    <p style="margin-top:200px;">Şimdi Randevu Al</p>
                    <a  style="margin-bottom:95px;" href="#" class="add-to-cart btn btn-dark btn-rounded btn-bordered btn-lg icon-left-effect"><span>Randevu Al</span></a>
                  </div>
                <hr style="margin-bottom:95px;">
                <div class="t-center">
                  <p>Koleksiyonu Keşfet</p>
                  <a href="#" style="margin-bottom:200px;" class="add-to-cart btn btn-dark btn-rounded btn-bordered btn-lg icon-left-effect"><span>Koleksiyonu Keşfet</span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 extended-product-img hidden-md-down animated" data-animation="fadeIn" data-animation-delay="600">
            <div class="extended-product-img-wrapper img-cover" data-bg-img="ecommerce/bag-4-2.jpg"></div>
          </div>
        </div>
      </div>
      <!-- END PRODUCTS EXTENDED -->

    <!-- BEGIN NEW PRODUCTS -->
    <section class="m-t-60 m-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title title-center">
                        <h3>New Arrivals</h3>
                        <p class="subtitle">Discover our latest collection</p>
                    </div>
                    <div class="owl-carousel owl-theme product-carousel" data-items-desktop="4" data-items-tablet="3" data-plugin-options='{"margin":20,"startPosition":1}'>
                        @if($urunler)
                            @foreach($urunler as $urun)
                                <div class="item">
                                    <div class="product">
                                        <div class="product-img">
                                            <ul class="product-wrapper">
                                                <?php $x =0; ?>
                                                @foreach($urun->dosya as $resim)

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
                                                        <a href="{{route('favori.ekle',$urun->id)}}"><i class="fa fa-heart-o"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <p class="product-name"><a href="/produkt/{{$urun->id}}/{{str_slug($urun->baslik)}}">{{$urun->baslik}}</a></p>
                                            <p class="product-price">€@if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->onay == 1)
                                                    {{$urun->fiyat}}
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
                                            @if($urun->stok == 1)
                                                <a href="{{route('sepet.ekle',$urun->id)}}" class="add-to-cart" data-toggle="tooltip" data-placement="bottom" data-html="true" title="<p>Add to Cart</p>">Add to cart</a>
                                            @else
                                                Out of stock
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END NEW PRODUCTS -->

     <!-- BEGIN NEWS -->
     <section id="news" class="section grey lighten-4">
        <div class="container-large">
          <div class="title title-center m-b-10">
            <i class="nc-icon-outline design_book-open c-primary"></i>
            <h3>Hayalimdeki Gelinlik Gelinleri</h3>
          </div>
          <div class="row m-b-30">
            <div class="col-lg-8 col-lg-offset-2">
              <p class="t-center">Our members benefit from a free gym programme and review every month, free studio classes and price reductions on our personal training sessions. As a member you can also access our pool and tennis courts for free and have priority for booking
                any of the pre-book activities.</p>
            </div>
          </div>
          <div class="row posts" data-force-height="true">
            <div class="col-xl-3 col-md-6">
              <div class="post animated" data-animation="fadeIn" data-animation-delay="200">
                <div class="post-medias">
                  <div class="flexslider" data-plugin-options='{"animation":"slide","controlNav":false,"directionNav":true,"slideshowSpeed":3500}'>
                    <ul class="slides">
                      <li>
                        <a href="blog-single-header-slider">
                          <img src="assets/img/yoga/news-1.jpg" alt="news 1">
                        </a>
                      </li>
                      <li>
                        <a href="blog-single-header-slider">
                          <img src="assets/img/yoga/news-2.jpg" alt="news 2">
                        </a>
                      </li>
                      <li>
                        <a href="blog-single-header-slider">
                          <img src="assets/img/yoga/news-3.jpg" alt="news 3">
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="post-info">
                  <h2 class="post-title"><a href="blog-single-header-slider">12 challenging exercices</a></h2>
                  <ul class="post-meta">
                    <li>
                      by <a href="#">Admin</a>
                    </li>
                    <li>
                      on <a href="#">January 15, 2016</a>
                    </li>
                  </ul>
                  <div class="post-excerpt">
                    <p>Fieri, inquam, Triari, nullo pacto potest, ut non dicas, quid non probes eius, a quo dissentias quae ille diceret pic.</p>
                  </div>
                  <a href="" class="more">Read More </a>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="post animated" data-animation="fadeIn" data-animation-delay="400">
                <div class="post-medias">
                  <a href="blog-single-header-slider">
                    <img src="assets/img/yoga/news-4.jpg" alt="news 4">
                  </a>
                </div>
                <div class="post-info">
                  <h2 class="post-title"><a href="blog-single-header-slider">8 weeks to tactical yoga</a></h2>
                  <ul class="post-meta">
                    <li>
                      by <a href="#">Admin</a>
                    </li>
                    <li>
                      on <a href="#">January 15, 2016</a>
                    </li>
                  </ul>
                  <div class="post-excerpt">
                    <p>Fieri, inquam, Triari, nullo pacto potest, ut non dicas, quid non probes eius, a quo dissentias quae ille diceret pic.</p>
                  </div>
                  <a href="" class="more">Read More </a>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="post animated" data-animation="fadeIn" data-animation-delay="600">
                <div class="post-medias">
                  <div class="flexslider" data-plugin-options='{"animation":"slide","controlNav":false,"directionNav":true,"slideshowSpeed":4000}'>
                    <ul class="slides">
                      <li>
                        <a href="blog-single-header-slider">
                          <img src="assets/img/yoga/news-5.jpg" alt="news 5">
                        </a>
                      </li>
                      <li>
                        <a href="blog-single-header-slider">
                          <img src="assets/img/yoga/news-6.jpg" alt="news 6">
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="post-info">
                  <h2 class="post-title"><a href="blog-single-header-slider">Best and worst cardio machines</a></h2>
                  <ul class="post-meta">
                    <li>
                      by <a href="#">Admin</a>
                    </li>
                    <li>
                      on <a href="#">January 15, 2016</a>
                    </li>
                  </ul>
                  <div class="post-excerpt">
                    <p>Fieri, inquam, Triari, nullo pacto potest, ut non dicas, quid non probes eius, a quo dissentias quae ille diceret pic.</p>
                  </div>
                  <a href="" class="more">Read More </a>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="post animated" data-animation="fadeIn" data-animation-delay="800">
                <div class="post-medias">
                  <a href="blog-single-header-slider">
                    <img src="assets/img/yoga/news-7.jpg" alt="news 7">
                  </a>
                </div>
                <div class="post-info">
                  <h2 class="post-title"><a href="blog-single-header-slider">8 weeks to tactical yoga</a></h2>
                  <ul class="post-meta">
                    <li>
                      by <a href="#">Admin</a>
                    </li>
                    <li>
                      on <a href="#">January 15, 2016</a>
                    </li>
                  </ul>
                  <div class="post-excerpt">
                    <p>Fieri, inquam, Triari, nullo pacto potest, ut non dicas, quid non probes eius, a quo dissentias quae ille diceret pic.</p>
                  </div>
                  <a href="" class="more">Read More </a>
                </div>
              </div>
            </div>
          </div>
          <p class="t-center m-t-30">
            <a href="#" class="btn btn-white btn-lg">Tümünü Gör</a>
          </p>
        </div>
      </section>
      <!-- END NEWS -->
      <!-- BEGIN TEAM -->
      <section class="section">
        <div class="container">
          <div class="title title-center">
            <i class="nc-icon-outline users_multiple-11 c-primary"></i>
            <h3>Our team of experts</h3>
            <p class="subtitle">We are passionate people making the best for you.</p>
          </div>
          <div class="owl-carousel owl-theme" data-items-desktop="3" data-items-tablet="2" data-plugin-options='{"smartSpeed":1000,"autoplayTimeout":5000,"autoplay":true,"items":3,"margin":40}'>
            <div class="item">
              <div class="team">
                <div class="team-img">
                  <figure class="he-3">
                    <img class="img-front" src="assets/img/ecommerce/6.jpg" alt="6">
                    <img class="img-back" src="assets/img/ecommerce/6-bis.jpg" alt="6 bis">
                    <div class="hover-icons">
                      <div class="hover-icons-wrapper">
                        
                        <a href="#">
                          <i class="fa fa-facebook"></i>
                        </a>
                        
                      </div>
                    </div>
                  </figure>
                </div>
                <div class="team-info">
                  <div class="team-name">
                    Facebook
                  </div>
                  <div class="team-job">
                    Hayalimdeki Gelinlik Facebook Sayfası
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="team">
                <div class="team-img">
                  <figure class="he-3">
                    <img class="img-front" src="assets/img/ecommerce/5.jpg" alt="5">
                    <img class="img-back" src="assets/img/ecommerce/5-bis.jpg" alt="5 bis">
                    <div class="hover-icons">
                      <div class="hover-icons-wrapper">
                        <a href="#">
                          <i class="fa fa-twitter"></i>
                        </a>
                      </div>
                    </div>
                  </figure>
                </div>
                <div class="team-info">
                  <div class="team-name">
                    Twitter
                  </div>
                  <div class="team-job">
                    Hayalimdeki Gelinlik Twitter Sayfası
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="team">
                <div class="team-img">
                  <figure class="he-3">
                    <img class="img-front" src="assets/img/ecommerce/6.jpg" alt="6">
                    <img class="img-back" src="assets/img/ecommerce/6-bis.jpg" alt="6 bis">
                    <div class="hover-icons">
                      <div class="hover-icons-wrapper">
                        <a href="#">
                          <i class="fa fa-instagram"></i>
                        </a>
                      </div>
                    </div>
                  </figure>
                </div>
                <div class="team-info">
                  <div class="team-name">
                    İnstagram
                  </div>
                  <div class="team-job">
                    Hayalimdeki Gelinlik İnstagram Sayfası
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- END TEAM -->

    <!-- BEGIN NEWSLETTER -->
    <section class="section section-newsletter t-center amber lighten-2">
        <div class="container">
          <div class="row m-b-20">
            <div class="title title-center m-b-10">
              <h3>E-Bülten Aboneliği</h3>
            </div>
            <form class="form-inline">
              <div class="form-group">
                <input type="email" class="form-control white input-lg" placeholder="E-mail Adresinizi Giriniz">
              </div>
              <button type="submit" class="btn btn-lg btn-dark">Kaydol</button>
            </form>
          </div>
        </div>
      </section>
      <!-- END NEWSLETTER -->

    </div>
    <!-- END MAIN CONTENT -->

   
@include('anadizin/footer')

@endsection
@section('css')
    <!-- BEGIN PAGE STYLE -->
    <link rel="stylesheet" href="assets/js/libs/toastr/toastr.min.css"/>
    <link rel="stylesheet" href="assets/js/libs/owl.carousel/dist/assets/owl.carousel.css" />
    <link rel="stylesheet" href="assets/js/libs/owl.carousel/dist/assets/owl.theme.default.min.css"/>
    <link rel="stylesheet" href="assets/js/libs/bxslider-4/dist/jquery.bxslider.min.css"/>
    <link rel="stylesheet" href="assets/js/plugins/revolution-slider/revolution/css/settings.css"/>
    <link rel="stylesheet" href="assets/js/plugins/revolution-slider/revolution/css/navigation.css"/>
    <link rel="stylesheet" href="assets/js/plugins/slick-modal/sm-minified.css"/>
    <link rel="stylesheet" href="assets/css/masonry.css"/>
    <link rel="stylesheet" href="assets/css/hover-effects.css"/>
    <link rel="stylesheet" href="assets/css/ecommerce.css"/>
    <link rel="stylesheet" href="assets/css/sliders.css"/>
    <!-- END PAGE STYLE -->
  <link rel="stylesheet" href="assets/css/blog.css"/>
  <link rel="stylesheet" href="assets/js/libs/flexslider/flexslider.css"/>
  <link rel="stylesheet" href="assets/css/form.css"/>
  <link rel="stylesheet" href="assets/css/portfolio.css"/>
  <link rel="stylesheet" href="assets/css/text-animation.css"/>
  <link rel="stylesheet" href="assets/js/libs/video.js/dist/video-js/video-js.min.css"/>
  <link rel="stylesheet" href="assets/js/libs/videojs-sublime-skin/dist/videojs-sublime-skin.min.css"/>
  <link rel="stylesheet" href="assets/js/libs/select2/dist/css/select2.min.css"/>
  <link rel="stylesheet" href="assets/css/team.css"/>
  <link rel="stylesheet" href="assets/js/libs/fullcalendar/dist/fullcalendar.min.css"/>
  <link rel="stylesheet" href="assets/css/pricing-tables.css"/>

@endsection
@section('js')
    <!-- BEGIN PAGE SCRIPT -->


    <script src="assets/js/libs/toastr/toastr.min.js"></script>
    <script src="assets/js/plugins/revolution-slider/revolution/js/jquery.themepunch.tools.min.js?rev=5.0"></script>
    <script src="assets/js/plugins/revolution-slider/revolution/js/jquery.themepunch.revolution.min.js?rev=5.0"></script>
    <script src="assets/js/libs/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="assets/js/libs/bxslider-4/dist/jquery.bxslider.min.js"></script>
    <script src="assets/js/libs/raty/lib/jquery.raty.js"></script>
    <script src="assets/js/libs/jquery.fitvids/jquery.fitvids.js"></script>
    <script src="assets/js/libs/isotope/dist/isotope.pkgd.min.js"></script>
    <script src="assets/js/libs/isotope-packery/packery-mode.pkgd.min.js"></script>
    <script src="assets/js/plugins/slick-modal/jquery.slick-modals.min.js"></script>
    <script src="assets/js/masonry.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/sliders.js"></script>
    <script src="assets/js/ecommerce.js"></script>
    <!-- END PAGE SCRIPT -->
  <script src="assets/js/libs/select2/dist/js/select2.full.min.js"></script> 
  <script src="assets/js/libs/bootstrap-validator/dist/validator.min.js"></script> 
  <script src="assets/js/libs/video.js/dist/video-js/video.js"></script>
  <script src="assets/js/libs/flexslider/jquery.flexslider-min.js"></script>
  <script src="assets/js/libs/moment/moment.js"></script>
  <script src="assets/js/libs/fullcalendar/dist/fullcalendar.min.js"></script>
  <script src="assets/js/map.js"></script>
  <script src="assets/js/sliders.js"></script>
  <script src="assets/js/modernizr-2.8.3-respond-1.4.2.min.js"></script>
@endsection
