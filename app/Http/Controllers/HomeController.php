<?php

namespace App\Http\Controllers;

use App\Adres;
use App\Ayar;
use App\Favori;
use App\FavoriUrun;
use App\Sayfa;
use App\Sepet;
use App\SepetUrun;
use App\Terms;
use App\TeslimSekli;
use App\Urun;
use App\UrunYorum;
use App\User;
use App\Yazi;
use App\Yorum;
use App\Iletisim;
use App\Ip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Teknomavi\Tcmb\Doviz;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $now = new DateTime('now');
        if (Auth::check()){
            $ip = new Ip();
            $ip->ip = $request->ip();
            $ip->kullanici_id = Auth::user()->id;
            $ip->save();
            $kullanici = User::find(Auth::user()->id);
            $kullanici->songiris = $now;
            $kullanici->save();
        }
        return view('anadizin.anasayfa');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
    public function sayfa($id){
        $sayfa = Sayfa::find($id);
        $terms = Terms::find(1)->first();
        //$markalar = $sayfa->marka;
        return view('anadizin.sayfa',compact('sayfa','terms'));
    }

    public function urun($id){
        $urun = Urun::find($id);
        return view('anadizin.urun',compact('urun'));
    }

    public function yazi($id){
        $yazi = Yazi::find($id);
        return view('anadizin.yazi',compact('yazi'));
    }

    public function arama(Request $request){
        $this->validate(request(),array('kelime' => 'required'));
        $kelime = request('kelime');
        $sonuc = DB::table('urun')->where([
            ['baslik', 'like', '%'.$kelime.'%'],
            ['metin', 'like', '%'. $kelime .'%'],
        ])->get();
        return view('anadizin.arama',compact('sonuc'));
    }

    public function yorumyap(Request $request){
        $this->validate(request(),array('metin' => 'required'));
        $now = new DateTime('now');
        if (request('yazi_id')){
            $yorum = new Yorum();
            $yorum->metin = request('metin');
            $yorum->yazi_id = request('yazi_id');
            $yorum->kullanici_id = Auth::user()->id;
            $yorum->tarih = $now;
            $yorum->save();
        }else{
            $yorum = new Yorum();
            $yorum->metin = request('metin');
            $yorum->yazi_id = null;
            $yorum->kullanici_id = Auth::user()->id;
            $yorum->tarih = $now;
            $yorum->save();
            if ($yorum){
                $urunyorum = new UrunYorum();
                $urunyorum->yorum_id = $yorum->id;
                $urunyorum->urun_id = request('urun_id');
                $urunyorum->save();
            }
        }
        if ($yorum){
            alert()
                ->success('Başarılı...', 'Başarılı')
                ->autoClose(2000);
            return back();
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
            return back();
        }
    }

    public function favoriekle($id){

        if (!Auth::user()->favori){
            $favori = new Favori();
            $favori->kullanici_id = Auth::user()->id;
            $favori->save();
            if ($favori){
                $favoriUrun = new FavoriUrun();
                $favoriUrun->favori_id = $favori->id;
                $favoriUrun->urun_id = $id;
                $favoriUrun->save();
                if($favoriUrun){
                    alert()
                        ->success('Başarılı...', 'Başarılı')
                        ->autoClose(2000);
                    return back();
                }else{
                    alert()
                        ->error('Hata...', 'İşlem hatası oluştu!')
                        ->autoClose(2000);
                    return back();
                }
            }
        }else{
            $urun = Urun::find($id);
            if ($urun){
                $favoriUrun = new FavoriUrun();
                $favoriUrun->favori_id = Auth::user()->favori->id;
                $favoriUrun->urun_id = $id;
                $favoriUrun->save();
                if($favoriUrun){
                    alert()
                        ->success('Başarılı...', 'Başarılı')
                        ->autoClose(2000);
                    return back();
                }else{
                    alert()
                        ->error('Hata...', 'İşlem hatası oluştu!')
                        ->autoClose(2000);
                    return back();
                }
            }
        }
    }


    public function sepeteklesayfa($id){
        $now = new DateTime('now');
        $sepet2 = Auth::user()->sepet;
        if (!$sepet2){
            $sepet = new Sepet();
            $sepet->kullanici_id = Auth::id();
            $sepet->olusturulma = $now;
            $sepet->not = ' ';
            $sepet->durum = 1;
            $sepet->toplamucret = 0;
            $sepet->save();
            if ($sepet){
                $sepetUrun = new SepetUrun();
                $sepetUrun->sepet_id = $sepet->id;
                $sepetUrun->urun_id = $id;
                $sepetUrun->miktar = 1;
                $sepetUrun->secenek_id = null;
                $sepetUrun->save();
                if($sepetUrun){
                    alert()
                        ->success('Başarılı...', 'Başarılı')
                        ->autoClose(2000);
                    return back();
                }else{
                    alert()
                        ->error('Hata...', 'İşlem hatası oluştu!')
                        ->autoClose(2000);
                    return back();
                }
            }
        }else{
            $sepet = Sepet::where([['durum', '=',1],['kullanici_id','=',Auth::id()]])->first();
            $urun = Urun::find($id);
            if (!$sepet){
                $sepet = new Sepet();
                $sepet->kullanici_id = Auth::id();
                $sepet->olusturulma = $now;
                $sepet->not = ' ';
                $sepet->durum = 1;
                $sepet->toplamucret = 0;
                $sepet->save();
                if ($sepet){
                    $sepetUrun = new SepetUrun();
                    $sepetUrun->sepet_id = $sepet->id;
                    $sepetUrun->urun_id = $urun->id;
                    $sepetUrun->miktar = 1;
                    $sepetUrun->secenek_id = null;
                    $sepetUrun->save();
                    if($sepetUrun){
                        alert()
                            ->success('Başarılı...', 'Başarılı')
                            ->autoClose(2000);
                        return back();
                    }else{
                        alert()
                            ->error('Hata...', 'İşlem hatası oluştu!')
                            ->autoClose(2000);
                        return back();
                    }
                }
            }else{
                $sepetUrun = new SepetUrun();
                $sepetUrun->sepet_id = $sepet->id;
                $sepetUrun->urun_id = $urun->id;
                $sepetUrun->miktar = 1;
                $sepetUrun->secenek_id = null;
                $sepetUrun->save();
                if($sepetUrun){
                    alert()
                        ->success('Başarılı...', 'Başarılı')
                        ->autoClose(2000);
                    return back();
                }else{
                    alert()
                        ->error('Hata...', 'İşlem hatası oluştu!')
                        ->autoClose(2000);
                    return back();
                }
            }
        }
    }

    public function sepeteklepost(Request $request)
    {
        $urun = Urun::find(request('urun_id'));
        $now = new DateTime('now');
        if (!Auth::user()->sepet) {
            $sepet = new Sepet();
            $sepet->kullanici_id = Auth::id();
            $sepet->olusturulma = $now;
            $sepet->not = ' ';
            $sepet->durum = 1;
            $sepet->toplamucret = 0;
            $sepet->save();
            if ($sepet) {
                $sepetUrun = new SepetUrun();
                $sepetUrun->sepet_id = $sepet->id;
                $sepetUrun->urun_id = $urun->id;
                $sepetUrun->miktar = 1;
                if (request('secenek_id')){
                    $sepetUrun->secenek_id = request('secenek_id');
                }else{
                    $sepetUrun->secenek_id = null;
                }
                $sepetUrun->save();
                if ($sepetUrun) {
                    alert()
                        ->success('Başarılı...', 'Başarılı')
                        ->autoClose(2000);
                    return back();
                } else {
                    alert()
                        ->error('Hata...', 'İşlem hatası oluştu!')
                        ->autoClose(2000);
                    return back();
                }
            }
        } else {
            $sepet = Sepet::where([['durum', '=',1],['kullanici_id','=',Auth::id()]])->first();
            if (!$sepet) {
                $sepet = new Sepet();
                $sepet->kullanici_id = Auth::id();
                $sepet->olusturulma = $now;
                $sepet->not = ' ';
                $sepet->durum = 1;
                $sepet->toplamucret = 0;
                $sepet->save();
                if ($sepet) {
                    $sepetUrun = new SepetUrun();
                    $sepetUrun->sepet_id = $sepet->id;
                    $sepetUrun->urun_id = $urun->id;
                    $sepetUrun->miktar = 1;
                    if (request('ozellik_id')){
                        $sepetUrun->secenek_id = request('ozellik_id');
                    }else{
                        $sepetUrun->secenek_id = null;
                    }
                    $sepetUrun->save();
                    if ($sepetUrun) {
                        alert()
                            ->success('Başarılı...', 'Başarılı')
                            ->autoClose(2000);
                        return back();
                    } else {
                        alert()
                            ->error('Hata...', 'İşlem hatası oluştu!')
                            ->autoClose(2000);
                        return back();
                    }
                }
            } else {
                $sepetUrun = new SepetUrun();
                $sepetUrun->sepet_id = $sepet->id;
                $sepetUrun->urun_id = $urun->id;
                $sepetUrun->miktar = 1;
                if (request('ozellik_id')){
                    $sepetUrun->secenek_id = request('ozellik_id');
                }else{
                    $sepetUrun->secenek_id = null;
                }
                $sepetUrun->save();
                if ($sepetUrun) {
                    alert()
                        ->success('Başarılı...', 'Başarılı')
                        ->autoClose(2000);
                    return back();
                } else {
                    alert()
                        ->error('Hata...', 'İşlem hatası oluştu!')
                        ->autoClose(2000);
                    return back();
                }
            }
        }
    }

    public function odemeyap(Request $request){

    }

    public function sepetgoster(){
        $sepet = Sepet::where([['durum', '=',1],['kullanici_id','=',Auth::id()]])->first();
        $teslimsekli = TeslimSekli::all();
        $doviz = new Doviz();
        return view('anadizin.sepet',compact('sepet','teslimsekli','doviz'));
    }

    public function favorigoster(){
        $favori = Auth::user()->favori;
        return view('anadizin.favori',compact('favori'));
    }

    public function favoriurunsil(Request $request){
        $favoriurun = FavoriUrun::where('urun_id','=',request('urun_id'))->first();
        $favoriurun->delete();
        return back();
    }

    public function sepetcheck(){
        $sepet = Sepet::where([['durum', '=',1],['kullanici_id','=',Auth::id()]])->first();
        $teslimsekli = TeslimSekli::all();
        $adres = Auth::user()->adres;
        $doviz = new Doviz();
        return view('anadizin.sepetcheck',compact('sepet','teslimsekli','doviz','adres'));
    }


    public function sepeturunsil(Request $request){
        $sepeturun = SepetUrun::where('urun_id','=',request('urun_id'))->first();
        $sepeturun->delete();
        return back();
    }

    public function adresEkle(Request $request){
        $this->validate(request(),array(
            'adi' => 'required',
            'telefonbir'=> 'required',
            'ulke'=> 'required',
            'sehir'=> 'required',
            'ilce'=> 'required',
            'detay'=> 'required',
            'postakodu'=> 'required',
        ));

        $adres = new Adres();
        $adres->adi = request('adi');
        $adres->kullanici_id = Auth::id();
        $adres->telefonbir = request('telefonbir');
        $adres->telefoniki = request('telefoniki');
        $adres->ulke = request('ulke');
        $adres->sehir = request('sehir');
        $adres->ilce = request('ilce');
        $adres->detay = request('detay');
        $adres->postakodu = request('postakodu');
        $adres->save();
        if ($adres) {
            alert()
                ->success('Başarılı...', 'Başarılı')
                ->autoClose(2000);
            return back();
        } else {
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
            return back();
        }
    }

    public function profil(){
        $user = Auth::user();
        return view('anadizin.profil',compact('user'));
    }


    public function basarili(){
        return view('anadizin.basarili');
    }

    public function sifresifirla(){
        return view('anadizin.passreset');
    }

    public function sifredegis(Request $request){
        $this->validate(request(),array(
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ));
        $user = Auth::user();
        if ($user->email == request('email')){
            $user = Auth::user();
            $user->password = Hash::make(request('password'));
            $user->save();
        }
        return back();
    }

    public function gecmisSepet(){
        $user = Auth::user();
        return view('anadizin.gecmissepet',compact('user'));
    }


    public function iletisimkaydet(Request $request){
        $this->validate(request(),array(
            'name' => 'required|string',
            'email' => 'required|string|email|max:255',
            'subject' => 'required|string',
            'service' => 'required|string',
            'message' => 'required|string',
        ));

        $iletisim = new Iletisim();
        $iletisim->name = request('name');
        $iletisim->email = request('email');
        $iletisim->subject = request('subject');
        $iletisim->service = request('service');
        $iletisim->message = request('message');
        $iletisim->save();
        if ($iletisim){
            return back();
        }else{
            return back();
        }
    }

}
