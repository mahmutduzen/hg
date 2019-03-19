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
                        <p>Name : {{$iletisim->name}}</p>
                        <p>Email : {{$iletisim->email}}</p>
                        <p>Subject : {{$iletisim->subject}}</p>
                        <p>Service : {{$iletisim->service}}</p>
                        <p>Message : {{$iletisim->message}}</p>
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
