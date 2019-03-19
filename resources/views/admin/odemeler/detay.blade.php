@extends('admin.template')

@section('icerik')



    <div class="row-fluid">
        <div class="span12">

            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-hand-right"></i> </span>
                    <h5>Ödeme Detayı</h5>
                </div>
                <div class="widget-content">
                    <p>Ödeme Şekli :
                        @if($odeme->odemesekli == 1)
                            Paypal
                        @else
                            Rechnung
                        @endif
                    </p>
                    <p>Sepet id : {{$odeme->sepet->id}}</p>
                    <p>Adres id : {{$odeme->adres->id}}</p>
                    <p>Adres Adı : {{$odeme->adres->adi}}</p>
                    <p>Adres Telefon : {{$odeme->adres->telefonbir}}</p>
                    <p>Adres Telefon 2 : {{$odeme->adres->telefoniki}}</p>
                    <p>Adres Detay : {{$odeme->adres->ulke.' '. $odeme->adres->sehir. ' '. $odeme->adres->ilce. ' '. $odeme->adres->detay . ' ' . $odeme->adres->postakodu}}</p>
                    <p>Toplam Ücret : {{$odeme->toplamucret}}</p>
                    <p>Ürünler : </p>
                    <ul>
                        @if($odeme->sepet->sepeturun)
                            @foreach($odeme->sepet->sepeturun as $spturun)
                                @if($spturun->urun)
                                    @foreach($spturun->urun as $urun)
                                        <li>{{'id:' . $urun->id .' / Başlık: '.  $urun->baslik . ' / Fiyat:' . $urun->fiyat }}</li>
                                    @endforeach
                                @endif
                            @endforeach
                        @endif

                    </ul>
                    <p>Not : {{$odeme->sepet->not}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')

@endsection
@section('js')

@endsection
