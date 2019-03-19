<?php

namespace App\Http\Controllers;

use App\Dosya;
use App\SayfaDosya;
use Illuminate\Http\Request;

class DosyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resimler = Dosya::all();
        return view('admin.dosyalar.index',compact('resimler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dosyalar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resimler = $request->file([]);
        foreach ($resimler as $resim){
            $uzanti = $resim->getClientOriginalExtension();
            $uret = str_random(20);
            $dosya = $uret.'.'.$uzanti;
            $dizin = 'uploads/galeri';
            $resimyol = $dizin.'/'.$dosya;
            $resim->move($dizin,$dosya);

            Dosya::create([
                'yol' => $resimyol,
                'baslik' => $dosya,
                'aciklama' => $uret.$dosya,
            ]);
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
        $resim = Dosya::find($id);
        $yol = $resim->yol;

        if (file_exists($yol)){
            $resimsil = unlink(public_path().'/'.$yol);
        }

        $dosya = Dosya::destroy($id);
        $sayfaDosya = SayfaDosya::where('dosya_id', '=', $id)->delete();

        if ($dosya){
            alert()
                ->success('Başarılı...', 'Başarı ile silindi')
                ->autoClose(2000);
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
        }
        return back();
    }
}
