<?php

namespace App\Http\Controllers;

use App\Dosya;
use App\Etiket;
use App\Kategori;
use App\Marka;
use App\Sayfa;
use App\SayfaDosya;
use App\SayfaEtiket;
use App\SayfaKategori;
use App\SayfaMarka;
use App\Sitil;
use App\Tip;
use Illuminate\Http\Request;

class SayfaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sayfalar = Sayfa::all();
        return view('admin.sayfalar.index',compact('sayfalar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipler = Tip::all();
        $sitiller = Sitil::all();
        $resimler = Dosya::all();
        $kategoriler = Kategori::all();
        $etiketler = Etiket::all();
        $markalar = Marka::all();
        return view('admin.sayfalar.create',compact('resimler','tipler','sitiller','kategoriler','etiketler','markalar'));
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

        $sayfa = new Sayfa();
        $sayfa->baslik = request('baslik');
        $sayfa->metin = request('metin');
        $sayfa->tip_id = request('tip_id');
        $sayfa->sitil_id = request('sitil_id');
        $sayfa->save();


        if ($sayfa){
            $resimler = $request->get('dosya');
            $kategoriler = $request->get('kategori');
            $etiketler = $request->get('etiket');
            $markalar = $request->get('marka');
            if ($resimler){
                foreach ($resimler as $rsm){
                    $sayfadosya = new SayfaDosya();
                    $sayfadosya->sayfa_id = $sayfa->id;
                    $sayfadosya->dosya_id = $rsm;
                    $sayfadosya->save();
                }
            }
            if ($kategoriler){
                foreach ($kategoriler as $ktgr){
                    $sayfakategori = new SayfaKategori();
                    $sayfakategori->sayfa_id = $sayfa->id;
                    $sayfakategori->kategori_id = $ktgr;
                    $sayfakategori->save();
                }
            }
            if ($markalar){
                foreach ($markalar as $mrk){
                    $sayfamarka = new SayfaMarka();
                    $sayfamarka->sayfa_id = $sayfa->id;
                    $sayfamarka->marka_id = $mrk;
                    $sayfamarka->save();
                }
            }
            if ($etiketler){
                foreach ($etiketler as $etkt){
                    $sayfaetiket = new SayfaEtiket();
                    $sayfaetiket->sayfa_id = $sayfa->id;
                    $sayfaetiket->etiket_id = $etkt;
                    $sayfaetiket->save();
                }
            }
    }

        if ($sayfa){
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
        $tipler = Tip::all();
        $sitiller = Sitil::all();
        $resimler = Dosya::all();
        $kategoriler = Kategori::all();
        $etiketler = Etiket::all();
        $markalar = Marka::all();
        $sayfa = Sayfa::find($id);
        return view('admin.sayfalar.edit',compact('sayfa','resimler','tipler','sitiller','kategoriler','etiketler','markalar'));
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

        $sayfa = Sayfa::find($id);
        $sayfa->baslik = request('baslik');
        $sayfa->metin = request('metin');
        $sayfa->tip_id = request('tip_id');
        $sayfa->sitil_id = request('sitil_id');
        $sayfa->save();

        $resimler = $request->get('dosya');
        $kategoriler = $request->get('kategori');
        $etiketler = $request->get('etiket');
        $markalar = $request->get('marka');

        //Resimler
        $seciliDB = collect([null]);
        $seciliGelen = collect([null]);
        if ($sayfa->dosya){
            foreach ($sayfa->dosya as $dosya){
                $seciliDB->push($dosya->id);
            }
        }
        if ($resimler){
            foreach ($resimler as $resim){
                $seciliGelen->push($resim);
                if ($seciliDB->search($resim)){

                }else{
                    $sayfadosya = new SayfaDosya();
                    $sayfadosya->sayfa_id = $sayfa->id;
                    $sayfadosya->dosya_id = $resim;
                    $sayfadosya->save();
                }
            }
        }
        if ($sayfa->dosya){
            foreach ($sayfa->dosya as $dosya2){
                if ($seciliGelen->search($dosya2->id)){

                }else{
                    $affectedRows = SayfaDosya::where('dosya_id', '=', $dosya2->id)->delete();
                }
            }
        }



        //Kategori

        $seciliDBK = collect([null]);
        $seciliGelenK = collect([null]);
        if ($sayfa->kategori){
            foreach ($sayfa->kategori as $kategori){
                $seciliDBK->push($kategori->id);
            }
        }
        if ($kategoriler){
            foreach ($kategoriler as $kategori){
                $seciliGelenK->push($kategori);
                if ($seciliDBK->search($kategori)){

                }else{
                    $sayfakategori = new SayfaKategori();
                    $sayfakategori->sayfa_id = $sayfa->id;
                    $sayfakategori->kategori_id = $kategori;
                    $sayfakategori->save();
                }
            }
        }
        if ($sayfa->kategori){
            foreach ($sayfa->kategori as $kategori2){
                if ($seciliGelenK->search($kategori2->id)){

                }else{
                    $affectedRows = SayfaKategori::where('kategori_id', '=', $kategori2->id)->delete();
                }
            }
        }

        //Marka

        $seciliDBK = collect([null]);
        $seciliGelenK = collect([null]);
        if ($sayfa->marka) {
            foreach ($sayfa->marka as $marka) {
                $seciliDBK->push($marka->id);
            }
        }
        if ($markalar){
            foreach ($markalar as $marka){
                $seciliGelenK->push($marka);
                if ($seciliDBK->search($marka)){

                }else{
                    $sayfamarka = new SayfaMarka();
                    $sayfamarka->sayfa_id = $sayfa->id;
                    $sayfamarka->marka_id = $marka;
                    $sayfamarka->save();
                }
            }
            if ($sayfa->marka){
                foreach ($sayfa->marka as $marka2){
                    if ($seciliGelenK->search($marka2->id)){

                    }else{
                        $affectedRows = SayfaMarka::where('marka_id', '=', $marka2->id)->delete();
                    }
                }
            }
        }

        //Etiket
        $seciliDBE = collect([null]);
        $seciliGelenE = collect([null]);
        if ($sayfa->etiket){
            foreach ($sayfa->etiket as $etiket){
                $seciliDBE->push($etiket->id);
            }
            if ($etiketler){
                foreach ($etiketler as $etiket){
                    $seciliGelenE->push($etiket);
                    if ($seciliDBE->search($etiket)){

                    }else{
                        $sayfaetiket = new SayfaEtiket();
                        $sayfaetiket->sayfa_id = $sayfa->id;
                        $sayfaetiket->etiket_id = $etiket;
                        $sayfaetiket->save();
                    }
                }
                if ($sayfa->etiket){
                    foreach ($sayfa->etiket as $etiket2){
                        if ($seciliGelenE->search($etiket2->id)){

                        }else{
                            $affectedRows = SayfaEtiket::where('etiket_id', '=', $etiket2->id)->delete();
                        }
                    }
                }
            }
        }
        if ($sayfa){
            alert()
                ->success('Başarılı...', 'Başarı ile güncellendi')
                ->autoClose(2000);
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
        }
        return redirect()->route('sayfalar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sayfa = Sayfa::destroy($id);
        $sayfaKat = SayfaKategori::where('sayfa_id', '=', $id)->delete();
        $sayfaDosya = SayfaDosya::where('sayfa_id', '=', $id)->delete();
        $sayfaEtiket = SayfaEtiket::where('sayfa_id', '=', $id)->delete();
        $sayfaMarka = SayfaMarka::where('sayfa_id', '=', $id)->delete();
        if ($sayfa){
            alert()
                ->success('Başarılı...', 'Başarı ile silindi')
                ->autoClose(2000);
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
        }
        return redirect()->route('sayfalar.index');
    }
}
