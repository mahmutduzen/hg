<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'ikadmin','middleware'=>'admin'],function(){
    Route::get('/','YonetimController@index')->name('yonetim.index');
    Route::get('cikis','YonetimController@cikis')->name('yonetim.cikis');
    Route::resource('ayarlar','AyarController');
    Route::resource('etiketler','EtiketController');
    Route::get('kullaniciekle','YonetimController@kullaniciekle')->name('kullanici.ekle');
    Route::post('kullanicikayit','YonetimController@kullanicikayit')->name('kullanici.kayit');
    Route::get('kullanicilar','YonetimController@kullanicigoster')->name('kullanicilar.index');
    Route::get('kullaniciguncelle/{id}','YonetimController@kullaniciguncelle')->name('kullanici.edit');
    Route::post('kullaniciupdate/{id}','YonetimController@kullaniciupdate')->name('kullanici.update');
    Route::delete('kullanicisil/{id}','YonetimController@kullanicidestroy')->name('kullanici.destroy');
    Route::resource('dosyalar','DosyaController');
    Route::resource('sayfalar','SayfaController');
    Route::resource('tipler','TipController');
    Route::resource('sitiller','SitilController');
    Route::resource('kategoriler','KategoriController');
    Route::resource('menuler','MenuController');
    Route::resource('sliderler','SliderController');
    Route::resource('yazilar','YaziController');
    Route::resource('markalar','MarkaController');
    Route::resource('ozellikler','OzellikController');
    Route::resource('secenekler','SecenekController');
    Route::resource('infolar','InfoController');
    Route::resource('infodetaylar','InfoDetayController');
    Route::resource('urunler','UrunController');
    Route::resource('terms','TermsController');
    Route::resource('fotograflar','FotografController');
    Route::resource('resKategoriler','ResKategoriController');
    Route::get('odemeler','YonetimController@odemeler')->name('odemeler.index');
    Route::get('odemeler/rechnung','YonetimController@rechnungOdeme')->name('odemeler.rechnung');
    Route::get('odemeler/detay/{id}','YonetimController@odemelerdetay')->name('odemeler.detay');
    Route::get('iletisimler','YonetimController@iletisimler')->name('iletisimler.index');
    Route::get('iletisimler/detay/{id}','YonetimController@iletisimlerdetay')->name('iletisimler.detay');
    Route::get('randevular','YonetimController@randevular')->name('randevular.index');
    Route::get('randevular/detay/{id}','YonetimController@randevulardetay')->name('randevular.detay');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('anasayfa');
Route::get('/anasayfa', 'HomeController@index')->name('anasayfa');
Route::get('cikis','HomeController@logout')->name('logout');
Route::get('sayfa/{id}/{slug}','HomeController@sayfa')->name('sayfa.view');
Route::get('yazi/{id}/{slug}','HomeController@yazi')->name('yazi.view');
Route::get('urun/{id}/{slug}','HomeController@urun')->name('urun.view');
Route::post('suche','HomeController@arama')->name('arama.yap');
//->middleware('auth');
Route::post('yorumyap','HomeController@yorumyap')->name('yorum.yap')->middleware('kullanici');
Route::get('favoriekle/{id}','HomeController@favoriekle')->name('favori.ekle')->middleware('kullanici');
Route::get('sepetekle/{id}','HomeController@sepeteklesayfa')->name('sepet.ekle')->middleware('kullanici');
Route::post('sepeteklepost','HomeController@sepeteklepost')->name('sepetpost.ekle')->middleware('kullanici');
Route::post('odemeyap','HomeController@odemeyap')->name('odeme.yap')->middleware('kullanici');
Route::post('adresEkle','HomeController@adresEkle')->name('adres.ekle')->middleware('kullanici');
Route::post('sepeturunsil','HomeController@sepeturunsil')->name('sepeturun.sil')->middleware('kullanici');
Route::post('favoriurunsil','HomeController@favoriurunsil')->name('favoriurun.sil')->middleware('kullanici');
Route::post('iletisimkaydet','HomeController@iletisimkaydet')->name('iletisim.kaydet');

Route::get('sepet','HomeController@sepetGoster')->name('sepet.goster')->middleware('kullanici');
Route::get('favori','HomeController@favoriGoster')->name('favori.goster')->middleware('kullanici');
Route::get('odemetamamla','HomeController@sepetcheck')->name('sepet.check')->middleware('kullanici');
Route::get('profil','HomeController@profil')->name('profil')->middleware('kullanici');
Route::get('basarili','HomeController@basarili')->name('basarili')->middleware('kullanici');
Route::get('gecmissepet','HomeController@gecmisSepet')->name('gecmis.sepet')->middleware('kullanici');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('password/resets','HomeController@sifresifirla')->name('sifre.sifirla')->middleware('kullanici');
Route::post('password/resets', 'HomeController@sifredegis')->name('sifre.degistir')->middleware('kullanici');

Route::post('paypal','PaymentController@payWithpaypal')->middleware('kullanici');
Route::get('status','PaymentController@getPaymentStatus')->name('status')->middleware('kullanici');
Route::get('basari','PaymentController@basari')->name('basari')->middleware('kullanici');


Route::post('rechnung','PaymentController@payWithRechnung')->middleware('kullanici');
