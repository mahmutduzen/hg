@extends('anadizin.template')

@section('icerik')
    <!-- BEGIN PAGE TITLE -->
    <section id="page-title" class="page-title-dark page-title-center">
        <div class="container">
            <div class="page-title-wrapper">
                <div class="page-title-txt">
                    <h1>Your Cart</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- END PAGE TITLE -->
    <section class="section">
        <div class="container p-b-120">
            <div class="row">
                <div class="col-hg-6">
                    <div class="table-responsive">
                        <table class="table table-cart">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th></th>
                                <th>Price</th>
                                <th>Total</th>
                                <th class="product-remove"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $total = 0; ?>
                            @if($sepet)
                                    @foreach($sepet->sepeturun as $spturun)
                                        @foreach($spturun->urun as $urun)
                                            <?php $total+= $urun->fiyat; ?>
                                            <tr class="cart-item">
                                                <td class="product-thumbnail">
                                                    <a href="/produkt/{{$urun->id}}/{{str_slug($urun->baslik)}}">
                                                        <img src="/{{$urun->dosya[0]->yol}}" alt="{{$urun->dosya[0]->baslik}}">
                                                    </a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="/produkt/{{$urun->id}}/{{str_slug($urun->baslik)}}">{{$urun->baslik}}</a>
                                                </td>
                                                <td class="product-total">$<span>@if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->onay == 1)
                                            {{$urun->fiyat}}
                                        @endif</span></td>
                                                <td class="product-remove">
                                                    <form action="{{route('sepeturun.sil')}}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="urun_id" value="{{$urun->id}}">
                                                        <button><i class="nc-icon-outline ui-1_circle-remove"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-hg-5 col-hg-offset-1">
                    <div class="cart-wrapper">
                        <h3>Cart Total</h3>
                        <table class="table table-cart">
                            <tbody>
                            <tr class="cart-subtotal">
                                <td>Total Tl</td>
                                <td class="cart-subtotal-val"><span>{{$total*$doviz->kurSatis("EUR").' TL'}}</span></td>
                            </tr>
                            <tr class="cart-subtotal">
                                <td>Total $</td>
                                <td class="cart-subtotal-val"><span>$ {{$total*$doviz->kurSatis("EUR")/$doviz->kurSatis("USD")}}</span></td>
                            </tr>
                            <tr class="cart-subtotal">
                                <td>Total €</td>
                                <td class="cart-subtotal-val"><span>€ {{$total}}</span></td>
                            </tr>
                            </tbody>
                        </table>
                        <a href="{{url('/')}}" class="btn btn-lg btn-white btn-bordered btn-cart m-b-10">Update Cart</a>
                        <a href="{{route('sepet.check')}}" class="btn btn-lg btn-primary btn-checkout m-b-10">Proceed to Checkout</a>
                    </div>
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
