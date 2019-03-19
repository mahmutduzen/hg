<!-- BEGIN REVOLUTION SLIDER -->


<div class="rev_slider_wrapper">
    <div id="rev_slider" data-slider-layout="fullscreen" data-slider-thumbnail="true" class="rev_slider" data-version="5.0">
        <ul>
            <!-- SLIDE 1 -->
            @foreach($sliderler as $slider)
                <?php
                    $bilgiler = json_decode($slider->bilgiler,true);
                    $baslik = $bilgiler['baslik'];
                    $altyazi = $bilgiler['altyazi'];
                    $button = $bilgiler['button'];
                    $link = $bilgiler['link'];
                ?>

            <li data-index="rs-110{{$slider->sira}}" data-transition="fade" data-slotamount="7" data-easein="default" data-easeout="default" data-masterspeed="1500" data-rotate="0" data-saveperformance="off" data-title="Trip" data-description="">
                <!-- MAIN IMAGE -->
                <img src="assets/img/various/bg-image.png" data-lazyload="{{$slider->dosya->yol}}" alt="ecommerce" width="1920" height="1280" data-bgposition="right top" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                <!-- OVERLAY -->
                <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0" id="slide-274-layer-3" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                     data-width="full" data-height="full" data-whitespace="normal" data-transform_idle="o:1;" data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="s:300;s:300;" data-start="1000" data-basealign="slide" data-responsive_offset="on"
                     style="background-color:rgba(0, 0, 0, 0.3);">
                </div>
                <!-- LAYER NR. 1 -->
                <div class="tp-caption tp-caption-title tp-resizeme rs-parallaxlevel-0" data-x="center" data-hoffset="0" data-y="center" data-voffset="['-10','0','-20','-140']" data-fontsize="['50','40','35','35']" data-lineheight="['60','50','45','40']" data-whitespace="normal"
                     data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" data-transform_out="y:[100%];s:1000;s:1000;" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                     data-start="500" data-responsive_offset="on" style="font-size:45px">
                    {{$baslik}}
                </div>
                @if($baslik)
                <!-- LAYER NR. 2 -->
                <div class="tp-caption tp-caption-line tp-resizeme rs-parallaxlevel-0" data-x="center" data-hoffset="0" data-y="center" data-voffset="['65','55','25','-95']" data-transform_in="x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" data-transform_out="x:[100%];s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                     data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="500" data-responsive_offset="on">
                    <img src="assets/img/various/bg-image.png" data-lazyload="assets/img/various/whitebar.png" alt="whitebar" width="350" height="4" data-ww="['350px','280px','240px','200px']" data-hh="2px" data-no-retina>
                </div>
                <!-- LAYER NR. 3 -->
                @endif
                <div class="tp-caption tp-caption-subtitle tp-resizeme rs-parallaxlevel-0" data-x="center" data-hoffset="0" data-y="center" data-voffset="['100','80','60','-70']" data-fontsize="['25','20','20','18']" data-lineheight="['35','30','28','25']" data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" data-transform_out="y:[100%];s:1000;s:1000;"
                     data-mask_in="x:0px;y:0px;" data-mask_out="x:inherit;y:inherit;" data-start="500" data-responsive_offset="on">
                    {{$altyazi}}
                </div>
                <!-- LAYER NR. 4 -->
                @if($button && $link)
                <div class="tp-caption" data-x="center" data-hoffset="0" data-y="center" data-voffset="['185','165','150','100']" data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" data-transform_out="y:[100%];s:1000;s:1000;" data-mask_in="x:0px;y:0px;"
                     data-mask_out="x:inherit;y:inherit;" data-start="500" data-responsive_offset="on">
                    <a href="{{$link}}" class="btn btn-white btn-bordered btn-lg">{{$button}}</a>
                </div>
                @endif
            </li>
                @endforeach
        </ul>
        <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
    </div>
</div>
<!-- END REVOLUTION SLIDER -->
