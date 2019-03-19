@extends('anadizin.template')

@section('icerik')
    <!-- BEGIN PAGE TITLE -->
    <section id="page-title" class="page-title-dark page-title-center">
        <div class="container">
            <div class="page-title-wrapper">
                <div class="page-title-txt">
                    <h1>Order History</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- END PAGE TITLE -->

    <section class="section">
        <div class="container p-b-120">
            <div class="row">
                <div class="col-hg-12">
                    <div class="table-responsive">
                        <table class="table table-cart">
                            <thead>
                            <tr>
                                <th>Note</th>
                                <th>Total</th>
                                <th>Photo</th>
                                <th>Product</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $total = 0; ?>
                            @if($user)
                                @foreach($user->sepet as $sepet)
                                    @if($sepet->durum == 0)
                                        @foreach($sepet->sepeturun as $spturun)
                                            @foreach($spturun->urun as $urun)
                                                <?php $total += $urun->fiyat; ?>
                                        <tr class="cart-item">
                                            <td class="product-price"><span>{{$sepet->not}}</span></td>
                                            <td class="product-price"><span>{{$sepet->toplamucret}}</span></td>
                                            <td class="product-thumbnail">
                                                <a href="/produkt/{{$urun->id}}/{{str_slug($urun->baslik)}}">
                                                    <img src="/{{$urun->dosya[0]->yol}}" alt="{{$urun->dosya[0]->baslik}}">
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <a href="/produkt/{{$urun->id}}/{{str_slug($urun->baslik)}}">{{$urun->baslik}}</a>
                                            </td>
                                            <td class="product-price">€<span>{{$urun->fiyat}}</span></td>
                                        </tr>
                                            @endforeach
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                            </tbody>
                        </table>
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
