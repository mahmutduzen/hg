@extends('anadizin.template')

@section('icerik')
    <?php
    /*    // 1. Autoload the SDK Package. This will include all the files and classes to your autoloader
        // Used for composer based installation
        require __DIR__  . '/vendor/autoload.php';
        use PayPal\Api\Payment;
        // Use below for direct download installation
        // require __DIR__  . '/PayPal-PHP-SDK/autoload.php';
    //

    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'Ad9M_xqdjQo7KHxk-ZqcF5q-Cx81yYY7MRnetvo-vipKVQNLGeArTqnOEJFY9Y4Y3Yzz_A6VlzROC2Xp',     // ClientID
            'EGOopHb0VwAd-RML8j0eoCwLzUGQrh22jr2j_5UD1_B7ACrRu0-APreEYcImeRbAJ5aq5Z5MXO64zCtX'      // ClientSecret
        )
    );*/
     ?>

    <!-- BEGIN PAGE TITLE -->
    <section id="page-title" class="page-title-dark page-title-center">
        <div class="container">
            <div class="page-title-wrapper">
                <div class="page-title-txt">
                    <h1>Checkout</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- END PAGE TITLE -->
    <!-- BEGIN CHECKOUT -->
    <section class="section section-checkout">
        <div class="container p-b-60">
            <div class="row">
                <div class="col-lg-6 col-md-6">



                        <form class="checkout-form" action="{{route('adres.ekle')}}" method="POST">
                            {{csrf_field()}}
                            <h4 class="t-important m-t-30 m-b-30">Billing Address</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group required">
                                        <label for="adi">Name</label>
                                        <input type="text" id="adi" name="adi" class="form-control input-lg" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="company">Phone 1</label>
                                        <input type="number" id="company" name="telefonbir" class="form-control input-lg" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="company">Phone 2</label>
                                        <input type="number" id="company" name="telefoniki" class="form-control input-lg">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select class="form-control" data-container-class="input-lg" name="ulke" data-placeholder="Select your country">
                                            <option value="1">Germany</option>
                                            <option value="2">Turkey</option>
                                            <option value="3">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group required">
                                        <label for="address">Detail</label>
                                        <input type="text" id="address" name="detay" class="form-control input-lg" placeholder="Detail address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group required">
                                        <label for="city">Town / City</label>
                                        <input type="text" id="city" name="sehir" class="form-control input-lg" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group required">
                                        <label for="county">County</label>
                                        <input type="text" id="county" name="ilce" class="form-control input-lg" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group required">
                                        <label for="postcode">Postcode</label>
                                        <input type="text" id="postcode" pattern="[0-9]" name="postakodu" class="form-control input-lg" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-lg btn-block btn-primary btn-order m-b-10">Add</button>
                                </div>
                            </div>
                        </form>
                </div>
                <div class="col-lg-5 col-md-6 col-lg-offset-1">
                    <div class="cart-wrapper checkout">
                        <form action="{!! URL::to('paypal') !!}" method="POST" id="payment-form">
                            {{csrf_field()}}
                        <h4 class="t-important">Your Order</h4>
                        <table class="table table-cart">
                            <tbody>
                            <?php $total = 0; ?>
                            @if($sepet)
                                @foreach($sepet->sepeturun as $spturun)
                                    @foreach($spturun->urun as $urun)
                                        <?php $total+= $urun->fiyat; ?>
                                        <tr class="cart-item">
                                            <td>{{$urun->baslik}}</td>
                                            <td>€@if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->onay == 1)
                                            {{$urun->fiyat}}
                                        @endif</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endif
                            <tr class="cart-total">
                                <td>Total</td>
                                <td class="cart-total-val">€<span>{{$total}}</span></td>
                            </tr>
                            </tbody>
                        </table>
                        @if($adres)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label style="color: #fff;">Adress</label>
                                        <select class="form-control" data-container-class="input-lg" name="adres_id" data-placeholder="Select adress">
                                            @foreach($adres as $adrs)
                                                <option value="{{$adrs->id}}">{{$adrs->adi}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="note-ship" style="color: #fff;">Order Note</label>
                                            <textarea id="note-ship" class="form-control" rows="10" name="not" placeholder="Note about your order, special info for delivery..."></textarea>
                                        </div>
                                    </div>
                                </div>
                        @endif
                        <div id="payment-methods">
                            <ul>
                                <li>
                                    @if($message = \Illuminate\Support\Facades\Session::get('success'))
                                        <div id="mesaj2">
                                        {{$message}}
                                        </div>
                                    @endif
                                    <?php \Illuminate\Support\Facades\Session::forget('success'); ?>
                                        @if($message = \Illuminate\Support\Facades\Session::get('error'))
                                            {{$message}}
                                        @endif
                                        <?php \Illuminate\Support\Facades\Session::forget('error'); ?>
                                </li>
                            </ul>
                        </div>
                            @if($total == 0)
                                <button class="btn btn-lg btn-block btn-primary btn-order m-b-10" disabled>Pay With Paypal</button>
                                @else
                                <button class="btn btn-lg btn-block btn-primary btn-order m-b-10">Pay With Paypal</button>
                                @endif
                        </form>
                        <form action="{!! URL::to('rechnung') !!}" method="POST" id="payment-form">
                            {{csrf_field()}}
                            <h4 class="t-important">Rechnung Order</h4>
                            @if($adres)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="color: #fff;">Adress</label>
                                            <select class="form-control" data-container-class="input-lg" name="adres_id" data-placeholder="Select adress">
                                                @foreach($adres as $adrs)
                                                    <option value="{{$adrs->id}}">{{$adrs->adi}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="note-ship" style="color: #fff;">Order Note</label>
                                            <textarea id="note-ship" class="form-control" rows="10" name="not" placeholder="Note about your order, special info for delivery..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div id="payment-methods">
                                <ul>
                                    <li>
                                        @if($message = \Illuminate\Support\Facades\Session::get('rechnung'))
                                            <div id="mesaj2">
                                                {{$message}}
                                            </div>
                                        @endif
                                        <?php \Illuminate\Support\Facades\Session::forget('rechnung'); ?>
                                        @if($message = \Illuminate\Support\Facades\Session::get('error'))
                                            {{$message}}
                                        @endif
                                        <?php \Illuminate\Support\Facades\Session::forget('error'); ?>
                                    </li>
                                </ul>
                            </div>
                            @if($total == 0)
                                <button class="btn btn-lg btn-block btn-primary btn-order m-b-10" disabled>Pay With Rechnung</button>
                            @else
                                <button class="btn btn-lg btn-block btn-primary btn-order m-b-10">Pay With Rechnung</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('css')
    <!-- BEGIN PAGE STYLE -->
    <link rel="stylesheet" href="assets/js/libs/select2/dist/css/select2.min.css"/>
    <link rel="stylesheet" href="assets/js/libs/owl.carousel/dist/assets/owl.carousel.css" />
    <link rel="stylesheet" href="assets/js/libs/owl.carousel/dist/assets/owl.theme.default.min.css"/>
    <link rel="stylesheet" href="assets/css/form.css"/>
    <link rel="stylesheet" href="assets/css/ecommerce.css"/>
    <!-- END PAGE STYLE -->
@endsection
@section('js')
    <!-- BEGIN PAGE SCRIPT -->
    <script src="assets/js/libs/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="assets/js/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/js/libs/jquery.fitvids/jquery.fitvids.js"></script>
    <script src="assets/js/ecommerce.js"></script>
    <script src="assets/js/sliders.js"></script>
    <!-- END PAGE SCRIPT -->
@endsection
