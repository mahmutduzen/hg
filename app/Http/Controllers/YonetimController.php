<?php

namespace App\Http\Controllers;

use App\Odeme;
use App\User;
use App\Iletisim;
use App\Randevu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class YonetimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function kullanicigoster(){
        $kullanicilar = User::all();
        return view('admin.kullanicilar.index',compact('kullanicilar'));
    }

    public function kullaniciguncelle($id){
        $kullanici = User::find($id);
        return view('admin.kullanicilar.edit',compact('kullanici'));
    }

    public function kullaniciupdate(Request $request, $id){
        $this->validate(request(),array(
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ));

        $kullanici = User::find($id);
        $kullanici->name = request('name');
        $kullanici->email = request('email');
        $kullanici->yetki = request('yetki');
        $kullanici->onay = request('onay');
        $kullanici->save();

        if ($kullanici){
            alert()
                ->success('Başarılı...', 'Başarı ile güncellendi')
                ->autoClose(2000);
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
        }
        return redirect()->route('kullanicilar.index');
    }

    public function kullanicidestroy($id){
        $kullanici = User::destroy($id);
        if ($kullanici){
            alert()
                ->success('Başarılı...', 'Başarı ile silindi')
                ->autoClose(2000);
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
        }
        return redirect()->route('kullanicilar.index');
    }

    public function kullaniciekle(){
        return view('admin.kullanicilar.create');
    }

    public function kullanicikayit(Request $request){
        $this->validate(request(),array(
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ));

        $kullanici = new User();
        $kullanici->name = request('name');
        $kullanici->email = request('email');
        $kullanici->yetki = 0;
        $kullanici->password = Hash::make(request('password'));
        $kullanici->save();

        if ($kullanici){
            alert()
                ->success('Başarılı...', 'Başarı ile kayıt oluşturuldu')
                ->autoClose(2000);
            return back();
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
            return back();
        }
    }

    public function cikis(){
        auth()->logout();
        return redirect('/');
    }

    public function odemeler(){
        $odemeler = Odeme::where('odemesekli', '=' , '1')->get();
        return view('admin.odemeler.index',compact('odemeler'));
    }

    public function rechnungOdeme(){
        $odemeler = Odeme::where('odemesekli','=', 2)->get();
        return view('admin.odemeler.rechnung',compact('odemeler'));
    }

    public function odemelerdetay($id){
        $odeme = Odeme::find($id);
        return view('admin.odemeler.detay',compact('odeme'));
    }

    public function iletisimler(){
        $iletisimler = Iletisim::all();
        return view('admin.iletisimler.index',compact('iletisimler'));
    }

    public function iletisimlerdetay($id){
        $iletisim = Iletisim::find($id);
        return view('admin.iletisimler.detay',compact('iletisim'));
    }

    public function randevular(){
        $iletisimler = Randevu::all();
        return view('admin.randevular.index',compact('iletisimler'));
    }

    public function randevulardetay($id){
        $iletisim = Randevu::find($id);
        return view('admin.randevular.detay',compact('iletisim'));
    }

}
