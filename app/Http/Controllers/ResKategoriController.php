<?php

namespace App\Http\Controllers;

use App\Dosya;
use App\Marka;
use App\UrunMarka;
use App\ResKategori;
use App\FotoResKategori;
use Illuminate\Http\Request;

class ResKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $markalar = ResKategori::all();
        return view('admin.resKategoriler.index',compact('markalar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resimler = Dosya::all();
        $markalar = ResKategori::all();
        return view('admin.resKategoriler.create',compact('markalar','resimler'));
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
            'dosya_id'=> 'required',
            'adi'=> 'required'
        ));

        $marka = new ResKategori();
        $marka->dosya_id = request('dosya_id');
        $marka->adi = request('adi');
        $marka->save();

        if ($marka){
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
        $markalar = ResKategori::all();
        $resimler = Dosya::all();
        $marka = ResKategori::find($id);
        return view('admin.resKategoriler.edit',compact('marka','markalar','resimler'));
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
            'dosya_id'=> 'required',
            'adi'=> 'required'
        ));

        $marka = ResKategori::find($id);
        $marka->dosya_id = request('dosya_id');
        $marka->adi = request('adi');
        $marka->save();

        if ($marka){
            alert()
                ->success('Başarılı...', 'Başarı ile güncellendi')
                ->autoClose(2000);
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
        }
        return redirect()->route('resKategoriler.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marka = ResKategori::destroy($id);
        $urunmarka = FotoResKategori::where('resKategori_id', '=', $id)->delete();
        if ($marka){
            alert()
                ->success('Başarılı...', 'Başarı ile silindi')
                ->autoClose(2000);
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
        }
        return redirect()->route('resKategoriler.index');
    }
}
