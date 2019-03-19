@extends('anadizin.template')

@section('icerik')
    <section id="page-title" class="page-title-dark page-title-center">
        <div class="container">
            <div class="page-title-wrapper">
                <div class="page-title-txt">
                    <h1>{{$urun->baslik}}</h1>
                </div>
            </div>
        </div>
    </section>

    <div id="shop">
        <div class="product-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div id="product-slider" class="flexslider manual">
                            <ul class="slides">
                                @foreach($urun->dosya as $resim)
                                <li class="easyzoom easyzoom--overlay">
                                    <a href="/{{$resim->yol}}">
                                        <img src="/{{$resim->yol}}" alt="shoes orange 1">
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div id="product-slider-thumbnails" class="flexslider manual">
                            <ul class="slides">
                                @foreach($urun->dosya as $resim)
                                <li>
                                    <a href="#">
                                        <img src="/{{$resim->yol}}" alt="shoes orange 1">
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <div class="product-name">{{$urun->baslik}}</div>
                        <div class="product-quick-desc">{{$urun->aciklama}}</div>
                        <div class="product-top-info clearfix">
                            <div class="product-price">€@if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->onay == 1)
                                            {{$urun->fiyat}}
                                        @endif</div>

                        </div>
                        <?php echo nl2br($urun->metin); ?>
                        <form action="{{route('sepetpost.ekle')}}" method="POST">
                            {{csrf_field()}}
                        <div class="product-buttons">
                            @if($urun->ozellik)
                                @foreach($urun->ozellik as $ozellik)
                            <div class="form-group">
                                <label>{{$ozellik->baslik}}</label>
                                <select class="form-control select-color" data-container-class="input-lg" name="ozellik_id">
                                    @foreach($ozellik->secenek as $secenek)
                                    <option value="{{$secenek->id}}">{{$secenek->adi}}</option>
                                    @endforeach
                                </select>
                            </div>
                                @endforeach

                            @endif
                            @if($urun->stok == 1)
                            <div class="quantity-cart">
                                    <input type="hidden" name="urun_id" value="{{$urun->id}}">
                                    <button class="add-to-cart btn btn-primary btn-square btn-lg icon-left-effect"><i class="nc-icon-outline shopping_cart"></i><span>Add to Cart</span></button>
                            </div>
                                @else
                                    <div class="quantity-cart">
                                        <input type="hidden" name="urun_id" value="{{$urun->id}}">
                                        <button  class="add-to-cart btn btn-primary btn-square btn-lg icon-left-effect" disabled><i class="nc-icon-outline shopping_cart"></i><span>Out of stock</span></button>
                                    </div>
                            @endif
                        </div>
                        </form>
                        <a href="{{route('favori.ekle',$urun->id)}}" class="product-wishlist">
                             <i class="fa fa-heart-o"></i> Add to Wishlist
                        </a>
                        <hr>
                        <p class="quickview-title">Tags</p>
                        <div class="tags">
                            @foreach($urun->etiket as $etiket)
                            <a href="#">{{$etiket->adi}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-info">
                <ul class="product-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#details" data-toggle="tab" role="tab">Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#info" data-toggle="tab" role="tab">Additional Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reviews" data-toggle="tab" role="tab">Reviews ({{$urun->yorum->count()}})</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="details" role="tabpanel">
                        <section class="section half-section grey lighten-4">
                            <div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php
                                        echo nl2br($urun->detay);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="tab-pane fade" id="info" role="tabpanel">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <table class="table">
                                        <tbody>
                                        @if(isset($urun->info->infodetay))
                                        @foreach($urun->info->infodetay as $infod)
                                        <tr>
                                            <td>{{$infod->baslik}}</td>
                                            <td>{{$infod->ozellik}}</td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="reviews-list">
                                                <h4>{{$urun->yorum->count()}} Reviews for variable product</h4>
                                                @foreach($urun->yorum as  $yorum)
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="review-name">{{$yorum->users->name}}<span class="review-date">{{$yorum->tarih}}</span></p>
                                                        <?php echo nl2br($yorum->metin); ?>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="add-review">
                                                @if(Auth::check())
                                                <h4>Add a Review</h4>
                                                <form action="{{route('yorum.yap')}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="form-group row">
                                                        <input type="hidden" name="urun_id" class="form-control input-lg" value="{{$urun->id}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea id="message" class="form-control" rows="5" name="metin" placeholder="Review message"></textarea>
                                                    </div>
                                                    <div class="add-review-button">
                                                        <button class="btn btn-primary btn-lg icon-left-effect"><i class="fa fa-star-o"></i><span>Add Review</span></button>
                                                    </div>
                                                </form>
                                                @else
                                                    <div class="leave-comment">
                                                        Please <a href="{{route('login')}}">login</a> to post a comment
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



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
    <link rel="stylesheet" href="/assets/css/form.css"/>
    <link rel="stylesheet" href="/assets/css/ecommerce.css"/>
    <link rel="stylesheet" href="/assets/css/sliders.css"/>
    <!-- END PAGE STYLE -->
@endsection
@section('js')
    <!-- BEGIN PAGE SCRIPT -->
    <script src="/assets/js/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="/assets/js/libs/easyzoom/dist/easyzoom.js"></script>
    <script src="/assets/js/libs/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="/assets/js/libs/flexslider/jquery.flexslider-min.js"></script>
    <script src="/assets/js/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="/assets/js/libs/jquery.fitvids/jquery.fitvids.js"></script>
    <script src="/assets/js/libs/toastr/toastr.min.js"></script>
    <script src="/assets/js/libs/raty/lib/jquery.raty.js"></script>
    <script src="/assets/js/ecommerce.js"></script>
    <script src="/assets/js/sliders.js"></script>
    <!-- END PAGE SCRIPT -->
@endsection
