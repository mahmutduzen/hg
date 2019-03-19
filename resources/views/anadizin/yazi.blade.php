@extends('anadizin.template')

@section('icerik')
    <div class="post-single">
    @if($yazi->dosya->count()==1)
        <!-- BEGIN HEADER SLIDER FULLHEIGHT -->
            <header class="header-dark height-full">
                <div class="section-overlay" data-0="opacity:0.2;" data-1000="opacity:1;"></div>
                <div class="flexslider" data-plugin-options='{"controlNav": false, "directionNav": false,"slideshowSpeed":5000}'>
                    <ul class="slides">
                        @foreach($yazi->dosya as $resim)
                            <li style="background-image: url(/{{$resim->yol}});"></li>
                        @endforeach
                    </ul>
                </div>
                <div class="container top-element m-t-0">
                    <div class="row top-text" data-0="transform:translateY(0px);opacity:1;" data-700="transform:translateY(280px);opacity:0;">
                        <h1 class="blog-title">{{$yazi->baslik}}</h1>
                        <ul class="blog-meta">
                            <li>
                                by <a href="#">{{$yazi->users->name}}</a>
                            </li>
                            <li>
                                in <a href="#">{{$yazi->kategori[0]->adi}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="scroll-down go-next"><span></span></div>
            </header>
            <!-- END HEADER SLIDER FULLHEIGHT -->
    @elseif($yazi->video!=Null)

        <!-- BEGIN VIDEO SELF HOSTED HEADER -->
            <header class="section section-video section-hg header-dark">
                <div class="video-embed">
                    <iframe id="header-video" src="{{$yazi->video}}" width="400" height="500" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    <div class="video-overlay"></div>
                </div>
                <div class="container top-element">
                    <div class="row top-text">
                        <h1 class="blog-title">{{$yazi->baslik}}</h1>
                        <ul class="blog-meta">
                            <li>
                                by <a href="#">{{$yazi->users->name}}</a>
                            </li>
                            <li>
                                in <a href="#">{{$yazi->kategori[0]->adi}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <!-- END VIDEO SELF HOSTED HEADER -->
    @else
        <!-- BEGIN HEADER SLIDER FULLHEIGHT -->
            <header class="header-dark height-full">
                <div class="section-overlay" data-0="opacity:0.2;" data-1000="opacity:1;"></div>
                <div class="flexslider" data-plugin-options='{"controlNav": false, "directionNav": false,"slideshowSpeed":5000}'>
                    <ul class="slides">
                        @foreach($yazi->dosya as $resim)
                        <li style="background-image: url(/{{$resim->yol}});"></li>
                        @endforeach
                    </ul>
                </div>
                <div class="container top-element m-t-0">
                    <div class="row top-text" data-0="transform:translateY(0px);opacity:1;" data-700="transform:translateY(280px);opacity:0;">
                        <h1 class="blog-title">{{$yazi->baslik}}</h1>
                        <ul class="blog-meta">
                            <li>
                                by <a href="#">{{$yazi->users->name}}</a>
                            </li>
                            <li>
                                in <a href="#">{{$yazi->kategori[0]->adi}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="scroll-down go-next"><span></span></div>
            </header>
            <!-- END HEADER SLIDER FULLHEIGHT -->
    @endif
    <!-- BEGIN POST -->
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="post">
                            <div class="post-content">
                                <?php echo nl2br($yazi->metin); ?>
                            </div>
                            <div class="tags">
                                @foreach($yazi->etiket as $etiket)
                                <a href="#">{{$etiket->adi}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END POST -->

        <!-- BEGIN POST COMMENTS -->
        <div class="post-comments">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <h3>{{$yazi->yorum->count()}} Comments</h3>
                        @foreach($yazi->yorum as $yorumlar)
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object img-fluid img-circle" src="/assets/img/ecommerce/people-4.jpg" alt="people 4">
                            </a>
                            <div class="media-body">
                                <h4>{{$yorumlar->users->name}}
                                    <small>{{$yorumlar->tarih}}</small>
                                </h4>
                                {{$yorumlar->metin}}
                            </div>
                        </div>
                        @endforeach
                        @if(Auth::check())
                        <div class="leave-comment">
                            <h3>Leave a Comment</h3>
                            <form action="{{route('yorum.yap')}}" method="POST" class="comment-form text-center">
                                {{csrf_field()}}
                                <input type="hidden" name="yazi_id" value="{{$yazi->id}}" >
                                <textarea id="message" class="form-control" rows="10" name="metin" placeholder="Message"></textarea>
                                <button type="submit" class="btn btn-primary">Submit Comment</button>
                            </form>
                        </div>
                            @else
                            <div class="leave-comment">
                            Please <a href="{{route('login')}}">login</a> to post a comment
                            </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- END POST COMMENTS -->

    </div>
    @include('anadizin/footer')

@endsection
@section('css')
    <!-- BEGIN PAGE STYLE -->
    <link rel="stylesheet" href="/assets/css/form.css"/>
    <link rel="stylesheet" href="/assets/css/blog.css"/>
    <link rel="stylesheet" href="/assets/css/hover-effects.css"/>
    <!-- END PAGE STYLE -->

    <!-- BEGIN PAGE STYLE -->
    <link rel="stylesheet" href="/assets/js/libs/flexslider/flexslider.css"/>
    <link rel="stylesheet" href="/assets/css/sliders.css"/>
    <!-- END PAGE STYLE -->
@endsection
@section('js')
    <!-- BEGIN PAGE SCRIPT -->
    <script src="/assets/js/libs/flexslider/jquery.flexslider-min.js"></script>
    <script src="/assets/js/widgets.js"></script>
    <script src="/assets/js/sliders.js"></script>
    <!-- END PAGE SCRIPT -->
@endsection
