@extends('anadizin.template')

@section('icerik')
    <!-- BEGIN PAGE TITLE -->
    <section id="page-title" class="page-title-dark page-title-center">
        <div class="container">
            <div class="page-title-wrapper">
                <div class="page-title-txt">
                    <h1>Wishlist</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- END PAGE TITLE -->
    <div class="section wishlist">
        <div class="container p-b-60">
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-cart">
                            <tbody>
                            @if($favori)
                            @if($favori->favoriurun)
                                @foreach($favori->favoriurun as $favoriurun)
                                    @if($favoriurun->urun)
                                        <?php $urun = $favoriurun->urun; ?>
                                        <tr class="cart-item">
                                            <td class="product-remove">
                                                <form action="{{route('favoriurun.sil')}}" method="post">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="urun_id" value="{{$urun->id}}">
                                                    <button><i class="nc-icon-outline ui-1_circle-remove"></i></button>
                                                </form>
                                            </td>
                                            <td class="product-thumbnail">
                                                <a href="/produkt/{{$urun->id}}/{{str_slug($urun->baslik)}}">
                                                    <img src="/{{$urun->dosya[0]->yol}}" alt="{{$urun->dosya[0]->baslik}}">
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <a href="/produkt/{{$urun->id}}/{{str_slug($urun->baslik)}}">{{$urun->baslik}}</a>
                                            </td>
                                            <td class="product-price">€<span>@if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->onay == 1)
                                            {{$urun->fiyat}}
                                        @endif</span></td>
                                            <td class="product-stock">
                                                <span>
                                                    @if($urun->stok==1)
                                                    in stock
                                                          @else
                                                        Out of stock
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="product-add-cart">
                                                @if($urun->stok==1)
                                                <a href="{{route('sepet.ekle',$urun->id)}}" class="add-to-cart btn btn-primary btn-square btn-lg icon-left-effect"><i class="nc-icon-outline shopping_cart"></i><span>Add to Cart</span></a>
                                                @else
                                                    Out of stock
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('anadizin.footer')
@endsection
@section('css')
    <!-- BEGIN PAGE STYLE -->
    <link rel="stylesheet" href="/assets/js/libs/toastr/toastr.min.css"/>
    <link rel="stylesheet" href="/assets/js/libs/owl.carousel/dist/assets/owl.carousel.css" />
    <link rel="stylesheet" href="/assets/js/libs/owl.carousel/dist/assets/owl.theme.default.min.css"/>
    <link rel="stylesheet" href="/assets/css/ecommerce.css"/>
    <!-- END PAGE STYLE -->
@endsection
@section('js')
    <!-- BEGIN PAGE SCRIPT -->
    <script src="/assets/js/libs/toastr/toastr.min.js"></script>
    <script src="/assets/js/libs/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="/assets/js/libs/jquery.fitvids/jquery.fitvids.js"></script>
    <script src="/assets/js/ecommerce.js"></script>
    <script src="/assets/js/sliders.js"></script>
    <!-- END PAGE SCRIPT -->
@endsection
