<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""><![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang=""><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang=""><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$ayarlar->title}}</title>
    <meta name="description" content="{{$ayarlar->desc}}">
    <meta name="keywords" content="{{$ayarlar->keyw}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="/assets/img/various/apple-touch-icon.png">
    <link rel="shortcut icon" href="/uploads/galeri/OnzWu47FE7Scnjedxll9.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:300,400,700,800' rel='stylesheet' />
    <link rel="stylesheet" href="/assets/js/libs/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/assets/js/libs/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/assets/css/icons/nucleo.css"/>
    <link rel="stylesheet" href="/assets/js/libs/animate.css/animate.min.css"/>
    @yield('css')
    <link rel="stylesheet" href="/assets/css/buttons.css"/>
    <link rel="stylesheet" href="/assets/css/builder.css"/>
    <link rel="stylesheet" href="/assets/css/colors.css"/>
    <link rel="stylesheet" href="/assets/css/footers.css"/>
    <link rel="stylesheet" href="/assets/css/main.css"/>
    <link rel="stylesheet" href="/assets/css/nav.css"/>
    <link rel="stylesheet" href="/assets/css/preloader.css"/>
    <link rel="stylesheet" href="/assets/css/themes.css"/>
    <link rel="stylesheet" href="/assets/css/ui.css"/>
    <link rel="stylesheet" href="/assets/css/widgets.css"/>

    <script src="/assets/js/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body data-page-type="ecommerce" class="header-transparent header-scroll-dark footer-reveal">

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- BEGIN PRELOADER -->
<div class="loader-wrapper">
    <div class="loader-circle"></div>
</div>
<!-- END PRELOADER -->

<div id="wrapper">

    <!-- BEGIN LATERAL NAVIGATION -->
    <aside id="aside-nav">
        <div id="main-aside-navigation">
            <div class="main-nav-wrapper">
                <div class="close-aside-nav">
                    <i class="nc-icon-outline ui-1_simple-remove"></i>
                </div>
                <div id="aside-logo">
                    <a href="{{route('anasayfa')}}" data-logo-light="/{{$ayarlar->logo}}" data-logo-dark="/uploads/galeri/KhuXpLdk883p8RdzVLAX.png">
                        <img width="170" height="166" src="/uploads/galeri/KhuXpLdk883p8RdzVLAX.png" alt="logo">
                    </a>
                </div>
                <nav id="main-aside-menu">
                    <ul>
                        <li class="submenu">
                            <a href="/">Home</a>
                        </li>
                        @foreach($menuler as $menu)
                        <li class="submenu">
                            <a href="/seite/{{$menu->sayfa->id}}/{{str_slug($menu->sayfa->baslik)}}">{{$menu->sayfa->baslik}}</a>
                            @if($menu->altMenu->count())
                                <ul>
                                    @foreach($menu->altMenu as $altMenu)
                                    <li><a data-header="dark" href="/seite/{{$altMenu->sayfa->id}}/{{str_slug($altMenu->sayfa->baslik)}}" data-skin="dark">{{$altMenu->sayfa->baslik}}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </nav>
                <footer>
                    <a href="#" class="tools-btn" data-toggle-search="fullscreen">
                        <span class="tools-btn-icon"><i class="nc-icon-outline ui-1_zoom"></i></span>

                    </a>
                    <a href="{{route('favori.goster')}}" class="tools-btn">
                        <span class="tools-btn-icon"><i class="nc-icon-outline ui-2_favourite-28"></i></span>
                        <span class="wishlist_items_number"></span>
                    </a>
                    <a href="{{route('sepet.goster')}}" class="tools-btn">
                        <span class="tools-btn-icon"><i class="nc-icon-glyph shopping_bag-16"></i></span>
                        <span class="cart_items_number"></span>
                    </a>
                </footer>
            </div>
        </div>
    </aside>
    <!-- END LATERAL NAVIGATION -->

    <!-- BEGIN MAIN NAVIGATION -->
    <header id="header">
        <div id="topbar">
            <div class="container-fluid">
                <div class="topbar-left">
                    <div class="topbar-text">
                        <div class="topbar-text-item"><i class="nc-icon-glyph ui-2_phone"></i> +49 1525 5409763</div>
                        <div class="topbar-text-item"><a href="mailto:info@keyss.de"><i class="nc-icon-glyph ui-1_email-83"></i> info@keyss.de</a></div>
                    </div>
                </div>
                <div class="topbar-right">
                    <div class="topbar-social icon-hover">
                        @if(\Illuminate\Support\Facades\Auth::user())
                            <a href="{{route('logout')}}" class="icon-twitter" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="nc-icon-outline users_delete-28"></i></a>
                            <a href="{{route('profil')}}" class="icon-flickr" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="nc-icon-outline users_single-02"></i></a>
                            <a href="{{route('gecmis.sepet')}}" class="icon-pinterest" data-toggle="tooltip" data-placement="bottom" title="History"><i class="nc-icon-outline shopping_bag-edit"></i></a>
                        @else
                            <a href="{{route('login')}}" class="icon-google" data-toggle="tooltip" data-placement="bottom" title="Login"><i class="nc-icon-outline users_add-27"></i></a>
                            <a href="{{route('register')}}" class="icon-google" data-toggle="tooltip" data-placement="bottom" title="Register"><i class="nc-icon-outline users_add-29"></i></a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <div id="main-navigation" class="submenu-dark">
            <div class="main-nav-wrapper">
                <div class="container-fluid">
                    <div class="nav-left">
                        <div id="logo">
                            <a href="{{route('anasayfa')}}" data-logo-light="/{{$ayarlar->logo}}" data-logo-dark="/uploads/galeri/KhuXpLdk883p8RdzVLAX.png">
                                <img width="145" height="36" src="/{{$ayarlar->logo}}" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="nav-right">
                        <nav id="main-menu">
                            <ul>
                                <li>
                                    <a href="/">Home</a>
                                </li>
                                @foreach($menuler as $menu)
                                <li class="">
                                    <a href="/seite/{{$menu->sayfa->id}}/{{str_slug($menu->sayfa->baslik)}}">{{$menu->sayfa->baslik}}</a>
                                    @if($menu->altMenu->count())
                                        <ul>
                                            @foreach($menu->altMenu as $altMenu)
                                                <li><a data-header="dark" href="/seite/{{$altMenu->sayfa->id}}/{{str_slug($altMenu->sayfa->baslik)}}" data-skin="light">{{$altMenu->sayfa->baslik}}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </nav>
                        <ul class="nav-tools">
                            <li class="cart-tool">
                                <a href="{{route('sepet.goster')}}" class="tools-btn">
                                    <span class="tools-btn-icon"><i class="nc-icon-glyph shopping_bag-16"></i></span>
                                </a>
                            </li>
                            <li class="wishlist-tool">
                                <a href="{{route('favori.goster')}}" class="tools-btn">
                                    <span class="tools-btn-icon"><i class="nc-icon-outline ui-2_favourite-28"></i></span>
                                    <span class="wishlist_items_number"></span>
                                </a>
                            </li>
                            <li class="search-tool">
                                <a href="#" class="tools-btn" data-toggle-search="fullscreen">
                                    <span class="tools-btn-icon"><i class="nc-icon-outline ui-1_zoom"></i></span>
                                </a>
                            </li>
                            <li class="mobile-menu-btn">
                                <button class="toggle-menu" data-toggle="mobile-menu" data-effect="hover">
                                    <span class="menu-label label-left">Menu</span>
                                    <i class="nc-icon-outline ui-2_menu-35"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END MAIN NAVIGATION -->

    <!-- BEGIN MAIN CONTENT -->
    <div id="main-content">
        @yield('icerik')
    </div>

</div>

<!-- BEGIN OFF FULLSCREEN SEARCH -->
<div class="search-overlay overlay-dark">
    <a href="#" class="search-overlay-close"><i class="nc-icon-outline ui-1_simple-remove"></i></a>
    <form action="{{route('arama.yap')}}" method="POST">
        {{csrf_field()}}
        <input type="search" placeholder="Search..." name="kelime">
        <button type="submit"><i class="nc-icon-outline ui-1_zoom-split"></i></button>
    </form>
</div>
<!-- END OFF FULLSCREEN SEARCH -->


<a href="#" class="scrollup">
    <i class="nc-icon-outline arrows-1_minimal-up"></i>
</a>

<script src="/assets/js/libs/jquery/dist/jquery.min.js"></script>
<script src="/assets/js/libs/jquery-ui/jquery-ui.min.js"></script>
<script src="/assets/js/libs/gsap/src/minified/TweenMax.min.js"></script>
<script src="/assets/js/libs/gsap/src/minified/plugins/ScrollToPlugin.min.js"></script>
<script src="/assets/js/libs/tether/dist/js/tether.min.js"></script>
<script src="/assets/js/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/assets/js/libs/superfish/dist/js/superfish.min.js"></script>
<script src="/assets/js/libs/appear/jquery.appear.js"></script>
<script src="/assets/js/libs/skrollr/dist/skrollr.min.js"></script>
<script src="/assets/js/libs/easyticker-jquery/jquery.easy-ticker.min.js"></script>
@yield('js')
<script src="/assets/js/navigation.js"></script>
<script src="/assets/js/search.js"></script>
<script src="/assets/js/builder.js"></script>
<script src="/assets/js/main.js"></script>


</body>
</html>
