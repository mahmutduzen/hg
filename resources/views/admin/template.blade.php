<!DOCTYPE html>
<html lang="en">
<head>
    <title>Matrix Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/admin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="/admin/css/fullcalendar.css" />
    <link rel="stylesheet" href="/admin/css/matrix-style.css" />
    <link rel="stylesheet" href="/admin/css/matrix-media.css" />
    <link href="/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="/admin/css/jquery.gritter.css" />
    <link rel="stylesheet" href="/admin/imagepicker/image-picker.css" />
    <link rel="stylesheet" href="/admin/css/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    @yield('css')
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
    <h1><a href="{{route("yonetim.index")}}">Hayalimdeki Gelinlik Yönetim Paneli</a></h1>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Merhaba {{Auth::user()->name}}</span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="{{route('kullanici.edit',Auth::user()->id)}}"><i class="icon-user"></i> Profil</a></li>
                <li class="divider"></li>
                <li><a href="{{route('yonetim.cikis')}}"><i class="icon-key"></i> Çıkış</a></li>
            </ul>
        </li>
    </ul>
</div>
<!--close-top-Header-menu-->

<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li class="active"><a href="{{route("yonetim.index")}}"><i class="icon icon-home"></i> <span>Anasayfa</span></a> </li>
        <li><a href="{{route("ayarlar.index")}}"><i class="icon icon-home"></i> <span>Ayarlar</span></a> </li>
        <li><a href="{{route("etiketler.index")}}"><i class="icon icon-home"></i> <span>Etiketler</span></a> </li>
        <li><a href="{{route("kullanicilar.index")}}"><i class="icon icon-home"></i> <span>Kullanıcılar</span></a> </li>
        <li><a href="{{route("dosyalar.index")}}"><i class="icon icon-home"></i> <span>Dosyalar</span></a> </li>
        <li><a href="{{route("sayfalar.index")}}"><i class="icon icon-home"></i> <span>Sayfalar</span></a> </li>
        <li><a href="{{route("tipler.index")}}"><i class="icon icon-home"></i> <span>Tipler</span></a> </li>
        <li><a href="{{route("sitiller.index")}}"><i class="icon icon-home"></i> <span>Sitiller</span></a> </li>
        <li><a href="{{route("kategoriler.index")}}"><i class="icon icon-home"></i> <span>Kategoriler</span></a> </li>
        <li><a href="{{route("menuler.index")}}"><i class="icon icon-home"></i> <span>Menüler</span></a> </li>
        <li><a href="{{route("sliderler.index")}}"><i class="icon icon-home"></i> <span>Sliderler</span></a> </li>
        <li><a href="{{route("yazilar.index")}}"><i class="icon icon-home"></i> <span>Yazılar</span></a> </li>
        <li><a href="{{route("markalar.index")}}"><i class="icon icon-home"></i> <span>Markalar</span></a> </li>
        <li><a href="{{route("resKategoriler.index")}}"><i class="icon icon-home"></i> <span>Resim Kategorileri</span></a> </li>
        <li><a href="{{route("fotograflar.index")}}"><i class="icon icon-home"></i> <span>Fotoğraflar</span></a> </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Ödemeler</span> </a>
            <ul>
                <li><a href="{{route("odemeler.index")}}">Paypal</a></li>
                <li><a href="{{route("odemeler.rechnung")}}">Rechnung</a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Özellikler</span> </a>
            <ul>
                <li><a href="{{route("ozellikler.index")}}">Özellikler</a></li>
                <li><a href="{{route("secenekler.index")}}">Seçenekler</a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Bilgiler</span> </a>
            <ul>
                <li><a href="{{route("infolar.index")}}">Bilgiler</a></li>
                <li><a href="{{route("infodetaylar.index")}}">Detaylar</a></li>
            </ul>
        </li>
        <li><a href="{{route("urunler.index")}}"><i class="icon icon-home"></i> <span>Ürünler</span></a> </li>
        <li><a href="{{route("terms.index")}}"><i class="icon icon-home"></i> <span>Sözleşme</span></a> </li>
        <li><a href="{{route("iletisimler.index")}}"><i class="icon icon-home"></i> <span>İletişim Mesajları</span></a> </li>
        <li><a href="{{route("randevular.index")}}"><i class="icon icon-home"></i> <span>Randevular</span></a> </li>
    </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{route("yonetim.index")}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        @yield('icerik')
    </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
    <div id="footer" class="span12"> 2018 &copy; Keyss.de Admin. </div>
</div>

<!--end-Footer-part-->

<script src="/admin/js/excanvas.min.js"></script>
<script src="/admin/js/jquery.min.js"></script>
<script src="/admin/imagepicker/image-picker.js"></script>
<script src="/admin/imagepicker/image-picker.min.js"></script>
<script src="/admin/js/jquery.ui.custom.js"></script>
<script src="/admin/js/bootstrap.min.js"></script>
<script src="/admin/js/jquery.flot.min.js"></script>
<script src="/admin/js/jquery.flot.resize.min.js"></script>
<script src="/admin/js/jquery.peity.min.js"></script>
<script src="/admin/js/fullcalendar.min.js"></script>
<script src="/admin/js/matrix.js"></script>
<script src="/admin/js/matrix.dashboard.js"></script>
<script src="/admin/js/jquery.gritter.min.js"></script>
<script src="/admin/js/matrix.interface.js"></script>
<script src="/admin/js/matrix.chat.js"></script>
<script src="/admin/js/jquery.validate.js"></script>
<script src="/admin/js/matrix.form_validation.js"></script>
<script src="/admin/js/jquery.wizard.js"></script>
<script src="/admin/js/jquery.uniform.js"></script>
<script src="/admin/js/select2.min.js"></script>
<script src="/admin/js/matrix.popover.js"></script>
<script src="/admin/js/jquery.dataTables.min.js"></script>
<script src="/admin/js/matrix.tables.js"></script>
<script src="/admin/js/bootstrap-wysihtml5.js"></script>
<script src="/admin/js/wysihtml5-0.3.0.js"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
@include('sweetalert::alert')
@yield('js')
</body>
</html>
