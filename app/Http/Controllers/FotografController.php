<?php

namespace App\Http\Controllers;

use App\Dosya;
use App\Slider;
use App\Fotograf;
use Illuminate\Http\Request;

class FotografController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliderler = Fotograf::all();
        return view('admin.fotograflar.index',compact('sliderler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resimler = Dosya::all();
        return view('admin.fotograflar.create',compact('resimler'));
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
            'baslik'=> 'required',
            'aciklama'=> 'required',
            'dosya_id'=> 'required',
            'metin'=> 'required'
        ));

        $slider = new Fotograf();
        $slider->dosya_id = request('dosya_id');
        $slider->baslik = request('baslik');
        $slider->aciklama = request('aciklama');
        $slider->metin = request('metin');
        $slider->save();

        if ($slider){
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
        $slider = Fotograf::find($id);
        return view('admin.fotograflar.edit',compact('resimler','slider'));
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
            'baslik'=> 'required',
            'aciklama'=> 'required',
            'dosya_id'=> 'required',
            'metin'=> 'required'
        ));

        $slider = Fotograf::find($id);
        $slider->dosya_id = request('dosya_id');
        $slider->baslik = request('baslik');
        $slider->aciklama = request('aciklama');
        $slider->metin = request('metin');
        $slider->save();

        if ($slider){
            alert()
                ->success('Başarılı...', 'Başarı ile güncellendi')
                ->autoClose(2000);
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
        }
        return redirect()->route('fotograflar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Fotograf::destroy($id);
        if ($slider){
            alert()
                ->success('Başarılı...', 'Başarı ile silindi')
                ->autoClose(2000);
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
        }
        return redirect()->route('fotograflar.index');
    }
}
