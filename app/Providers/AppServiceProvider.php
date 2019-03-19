<?php

namespace App\Providers;


use App\Ayar;
use App\Marka;
use App\Menu;
use App\Sayfa;
use App\Slider;
use App\Urun;
use App\Yazi;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        $ayarlar = Ayar::find(1)->first();
        $sayfalar = Sayfa::all();
        $urunler = Urun::all();
        $yazilar = Yazi::all();
        $menuler = Menu::where('ust_id','=','0')->get();
        $markalar = Marka::all();
        $sliderler = Slider::all();
        View::share([
            'ayarlar' => $ayarlar,
            'sayfalar' => $sayfalar,
            'urunler' => $urunler,
            'yazilar' => $yazilar,
            'menuler' => $menuler,
            'markalar' => $markalar,
            'sliderler' => $sliderler,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
