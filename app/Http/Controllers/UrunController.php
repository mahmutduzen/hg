<?php

namespace App\Http\Controllers;

use App\Dosya;
use App\Etiket;
use App\Marka;
use App\Ozellik;
use App\Secenek;
use App\Urun;
use App\UrunDosya;
use App\UrunEtiket;
use App\UrunMarka;
use App\UrunOzellik;
use App\Info;
use Illuminate\Http\Request;

class UrunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urunler = Urun::all();
        return view('admin.urunler.index',compact('urunler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resimler = Dosya::all();
        $markalar = Marka::all();
        $etiketler = Etiket::all();
        $ozellikler = Ozellik::all();
        return view('admin.urunler.create',compact('resimler','markalar','etiketler','ozellikler'));
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
            'aciklama'=> 'required',
            'metin'=> 'required',
            'fiyat'=> 'required'
        ));

        $urun = new Urun();
        $urun->baslik = request('baslik');
        $urun->aciklama = request('aciklama');
        $urun->metin = request('metin');
        $urun->fiyat = request('fiyat');
        $urun->detay = request('detay');
        $urun->save();


        if ($urun){
            $resimler = $request->get('dosya');
            $markalar = $request->get('marka');
            $etiketler = $request->get('etiket');
            $ozellikler = $request->get('ozellik');
            if ($resimler){
                foreach ($resimler as $rsm){
                    $urundosya = new UrunDosya();
                    $urundosya->urun_id = $urun->id;
                    $urundosya->dosya_id = $rsm;
                    $urundosya->save();
                }
            }
            if ($markalar){
                foreach ($markalar as $mrk){
                    $urunmarka = new UrunMarka();
                    $urunmarka->urun_id = $urun->id;
                    $urunmarka->marka_id = $mrk;
                    $urunmarka->save();
                }
            }
            if ($etiketler){
                foreach ($etiketler as $etkt){
                    $urunetiket = new UrunEtiket();
                    $urunetiket->urun_id = $urun->id;
                    $urunetiket->etiket_id = $etkt;
                    $urunetiket->save();
                }
            }
            if ($ozellikler){
                foreach ($ozellikler as $ozllk){
                    $urunozellik = new UrunOzellik();
                    $urunozellik->urun_id = $urun->id;
                    $urunozellik->ozellik_id = $ozllk;
                    $urunozellik->save();
                }
            }
        }

        if ($urun){
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
        $markalar = Marka::all();
        $etiketler = Etiket::all();
        $ozellikler = Ozellik::all();
        $urun = Urun::find($id);
        return view('admin.urunler.edit',compact('urun','resimler','markalar','etiketler','ozellikler'));
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
            'aciklama'=> 'required',
            'metin'=> 'required',
            'fiyat'=> 'required'
        ));

        $urun = Urun::find($id);
        $urun->baslik = request('baslik');
        $urun->aciklama = request('aciklama');
        $urun->metin = request('metin');
        $urun->fiyat = request('fiyat');
        $urun->detay = request('detay');
        $urun->save();

        $resimler = $request->get('dosya');
        $markalar = $request->get('marka');
        $etiketler = $request->get('etiket');
        $ozellikler = $request->get('ozellik');

        //Resimler
        $seciliDB = collect([null]);
        $seciliGelen = collect([null]);
        foreach ($urun->dosya as $dosya){
            $seciliDB->push($dosya->id);
        }
        if ($resimler) {
            foreach ($resimler as $resim) {
                $seciliGelen->push($resim);
                if ($seciliDB->search($resim)) {

                } else {
                    $urundosya = new UrunDosya();
                    $urundosya->urun_id = $urun->id;
                    $urundosya->dosya_id = $resim;
                    $urundosya->save();
                }
            }
        }
        if ($urun->dosya){
            foreach ($urun->dosya as $dosya2) {
                if ($seciliGelen->search($dosya2->id)) {

                } else {
                    $affectedRows = UrunDosya::where('dosya_id', '=', $dosya2->id)->delete();
                }
            }
        }


        //Marka
        $seciliDBK = collect([null]);
        $seciliGelenK = collect([null]);
        foreach ($urun->marka as $marka){
            $seciliDBK->push($marka->id);
        }
        if ($markalar){
            foreach ($markalar as $marka){
                $seciliGelenK->push($marka);
                if ($seciliDBK->search($marka)){

                }else{
                    $urunmarka = new UrunMarka();
                    $urunmarka->urun_id = $urun->id;
                    $urunmarka->marka_id = $marka;
                    $urunmarka->save();
                }
            }
        }
        if ($urun->marka){
            foreach ($urun->marka as $marka2){
                if ($seciliGelenK->search($marka2->id)){

                }else{
                    $affectedRows = UrunMarka::where('marka_id', '=', $marka2->id)->delete();
                }
            }
        }

        //Etiket
        $seciliDBE = collect([null]);
        $seciliGelenE = collect([null]);
        foreach ($urun->etiket as $etiket){
            $seciliDBE->push($etiket->id);
        }
        if ($etiketler){
            foreach ($etiketler as $etiket){
                $seciliGelenE->push($etiket);
                if ($seciliDBE->search($etiket)){

                }else{
                    $urunetiket = new UrunEtiket();
                    $urunetiket->urun_id = $urun->id;
                    $urunetiket->etiket_id = $etiket;
                    $urunetiket->save();
                }
            }
        }
        if ($urun->etiket){
            foreach ($urun->etiket as $etiket2){
                if ($seciliGelenE->search($etiket2->id)){

                }else{
                    $affectedRows = UrunEtiket::where('etiket_id', '=', $etiket2->id)->delete();
                }
            }
        }

        //Özellik
        $seciliDBE = collect([null]);
        $seciliGelenE = collect([null]);
        foreach ($urun->ozellik as $ozellik){
            $seciliDBE->push($ozellik->id);
        }
        if ($ozellikler){
            foreach ($ozellikler as $ozellik){
                $seciliGelenE->push($ozellik);
                if ($seciliDBE->search($ozellik)){

                }else{
                    $urunozellik = new UrunOzellik();
                    $urunozellik->urun_id = $urun->id;
                    $urunozellik->etiket_id = $ozellik;
                    $urunozellik->save();
                }
            }
        }
        if ($urun->ozellik){
            foreach ($urun->ozellik as $ozellik2){
                if ($seciliGelenE->search($ozellik2->id)){

                }else{
                    $affectedRows = UrunOzellik::where('ozellik_id', '=', $etiket2->id)->delete();
                }
            }
        }

        if ($urun){
            alert()
                ->success('Başarılı...', 'Başarı ile güncellendi')
                ->autoClose(2000);
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
        }
        return redirect()->route('urunler.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $urun = Urun::destroy($id);
        $urunMarka = UrunMarka::where('urun_id', '=', $id)->delete();
        $urunDosya = UrunDosya::where('urun_id', '=', $id)->delete();
        $urunEtiket = UrunEtiket::where('urun_id', '=', $id)->delete();
        $urunOzellik = UrunOzellik::where('urun_id', '=', $id)->delete();
        if ($urun){
            alert()
                ->success('Başarılı...', 'Başarı ile silindi')
                ->autoClose(2000);
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
        }
        return redirect()->route('urunler.index');
    }
}
