<?php

namespace App\Http\Controllers;

use App\Dosya;
use App\Kategori;
use App\Etiket;
use App\User;
use App\Yazi;
use App\YaziDosya;
use App\YaziEtiket;
use App\YaziKategori;
use Illuminate\Http\Request;

class YaziController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yazilar = Yazi::all();
        return view('admin.yazilar.index',compact('yazilar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resimler = Dosya::all();
        $kategoriler = Kategori::all();
        $etiketler = Etiket::all();
        $userler = User::all();
        return view('admin.yazilar.create',compact('resimler','kategoriler','etiketler','userler'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),array(
            'baslik'=> 'required|max:255',
            'metin'=> 'required'
        ));

        $yazi = new Yazi();
        $yazi->baslik = request('baslik');
        $yazi->metin = request('metin');
        $yazi->users_id = request('users_id');
        $yazi->okunma = 0;
        $yazi->video = request('video');
        $yazi->save();


        if ($yazi){
            $resimler = $request->get('dosya');
            $kategoriler = $request->get('kategori');
            $etiketler = $request->get('etiket');
            if ($resimler){
                foreach ($resimler as $rsm){
                    $yazidosya = new YaziDosya();
                    $yazidosya->yazi_id = $yazi->id;
                    $yazidosya->dosya_id = $rsm;
                    $yazidosya->save();
                }
            }
            if ($kategoriler){
                foreach ($kategoriler as $ktgr){
                    $yazikategori = new YaziKategori();
                    $yazikategori->yazi_id = $yazi->id;
                    $yazikategori->kategori_id = $ktgr;
                    $yazikategori->save();
                }
            }
            if ($etiketler){
                foreach ($etiketler as $etkt){
                    $yazietiket = new YaziEtiket();
                    $yazietiket->yazi_id = $yazi->id;
                    $yazietiket->etiket_id = $etkt;
                    $yazietiket->save();
                }
            }
        }

        if ($yazi){
            alert()
                ->success('Başarılı...', 'Başarı ile eklendi')
                ->autoClose(2000);
            return back();
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
            return back();
        }
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
        $resimler = Dosya::all();
        $kategoriler = Kategori::all();
        $etiketler = Etiket::all();
        $userler = User::all();
        $yazi = Yazi::find($id);
        return view('admin.yazilar.edit',compact('yazi','resimler','kategoriler','etiketler','userler'));
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
        $this->validate(request(),array(
            'baslik'=> 'required|max:255',
            'metin'=> 'required'
        ));

        $yazi = Yazi::find($id);
        $yazi->baslik = request('baslik');
        $yazi->metin = request('metin');
        $yazi->users_id = request('users_id');
        $yazi->okunma = request('okunma');
        $yazi->video = request('video');
        $yazi->save();

        $resimler = $request->get('dosya');
        $kategoriler = $request->get('kategori');
        $etiketler = $request->get('etiket');



        //Resimler
        $seciliDB = collect([null]);
        $seciliGelen = collect([null]);
        foreach ($yazi->dosya as $dosya){
            $seciliDB->push($dosya->id);
        }
        if ($resimler) {
            foreach ($resimler as $resim) {
                $seciliGelen->push($resim);
                if ($seciliDB->search($resim)) {

                } else {
                    $yazidosya = new YaziDosya();
                    $yazidosya->yazi_id = $yazi->id;
                    $yazidosya->dosya_id = $resim;
                    $yazidosya->save();
                }
            }
        }
        if ($yazi->dosya){
            foreach ($yazi->dosya as $dosya2) {
                if ($seciliGelen->search($dosya2->id)) {

                } else {
                    $affectedRows = YaziDosya::where('dosya_id', '=', $dosya2->id)->delete();
                }
            }
        }




        //Kategori

        $seciliDBK = collect([null]);
        $seciliGelenK = collect([null]);
        foreach ($yazi->kategori as $kategori){
            $seciliDBK->push($kategori->id);
        }
        if ($kategoriler){
            foreach ($kategoriler as $kategori){
                $seciliGelenK->push($kategori);
                if ($seciliDBK->search($kategori)){

                }else{
                    $yazikategori = new YaziKategori();
                    $yazikategori->yazi_id = $yazi->id;
                    $yazikategori->kategori_id = $kategori;
                    $yazikategori->save();
                }
            }
        }
        if ($yazi->kategori){
            foreach ($yazi->kategori as $kategori2){
                if ($seciliGelenK->search($kategori2->id)){

                }else{
                    $affectedRows = YaziKategori::where('kategori_id', '=', $kategori2->id)->delete();
                }
            }
        }

        //Etiket
        $seciliDBE = collect([null]);
        $seciliGelenE = collect([null]);
        foreach ($yazi->etiket as $etiket){
            $seciliDBE->push($etiket->id);
        }
        if ($etiketler){
            foreach ($etiketler as $etiket){
                $seciliGelenE->push($etiket);
                if ($seciliDBE->search($etiket)){

                }else{
                    $yazietiket = new YaziEtiket();
                    $yazietiket->yazi_id = $yazi->id;
                    $yazietiket->etiket_id = $etiket;
                    $yazietiket->save();
                }
            }
        }
        if ($yazi->etiket){
            foreach ($yazi->etiket as $etiket2){
                if ($seciliGelenE->search($etiket2->id)){

                }else{
                    $affectedRows = YaziEtiket::where('etiket_id', '=', $etiket2->id)->delete();
                }
            }
        }


        if ($yazi){
            alert()
                ->success('Başarılı...', 'Başarı ile güncellendi')
                ->autoClose(2000);
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
        }
        return redirect()->route('yazilar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $yazi = Yazi::destroy($id);
        $yaziKat = YaziKategori::where('yazi_id', '=', $id)->delete();
        $yaziDosya = YaziDosya::where('yazi_id', '=', $id)->delete();
        $yaziEtiket = YaziEtiket::where('yazi_id', '=', $id)->delete();
        if ($yazi){
            alert()
                ->success('Başarılı...', 'Başarı ile silindi')
                ->autoClose(2000);
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
        }
        return redirect()->route('yazilar.index');
    }
}
