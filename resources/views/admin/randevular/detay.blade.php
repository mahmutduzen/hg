@extends('admin.template')

@section('icerik')



    <div class="row-fluid">
        <div class="span12">

            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-hand-right"></i> </span>
                    <h5>Ödeme Detayı</h5>
                </div>
                <div class="widget-content">
                    @if($iletisim)
                        <p>Adı Soyadı : {{$iletisim->adisoyadi}}</p>
                        <p>Email : {{$iletisim->email}}</p>
                        <p>Telefon : {{$iletisim->telefon}}</p>
                        <p>Randevu istediği tarih : {{$iletisim->tarih}}</p>
                        <p>Mesaj : {{$iletisim->mesaj}}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')

@endsection
@section('js')

@endsection
