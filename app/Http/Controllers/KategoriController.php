<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\SayfaKategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoriler = Kategori::all();
        return view('admin.kategoriler.index',compact('kategoriler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriler = Kategori::all();
        return view('admin.kategoriler.create',compact('kategoriler'));
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
            'adi'=> 'required|max:255',
            'ust_id'=> 'required'
        ));

        $kategori = new Kategori();
        $kategori->adi = request('adi');
        $kategori->ust_id = request('ust_id');
        $kategori->save();

        if ($kategori){
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
        $kategoriler = Kategori::all();
        $kategori = Kategori::find($id);
        return view('admin.kategoriler.edit',compact('kategori','kategoriler'));
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
            'adi'=> 'required|max:255',
            'ust_id'=> 'required'
        ));

        $kategori = Kategori::find($id);
        $kategori->adi = request('adi');
        $kategori->ust_id = request('ust_id');
        $kategori->save();

        if ($kategori){
            alert()
                ->success('Başarılı...', 'Başarı ile güncellendi')
                ->autoClose(2000);
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
        }
        return redirect()->route('kategoriler.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::destroy($id);
        $sayfaKat = SayfaKategori::where('kategori_id', '=', $id)->delete();
        if ($kategori){
            alert()
                ->success('Başarılı...', 'Başarı ile silindi')
                ->autoClose(2000);
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
        }
        return redirect()->route('kategoriler.index');
    }
}
