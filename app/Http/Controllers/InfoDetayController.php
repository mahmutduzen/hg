<?php

namespace App\Http\Controllers;

use App\Info;
use App\InfoDetay;
use Illuminate\Http\Request;

class InfoDetayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infodetaylar = InfoDetay::all();
        return view('admin.infodetaylar.index',compact('infodetaylar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $infolar = Info::all();
        return view('admin.infodetaylar.create',compact('infolar'));
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
            'baslik'=> 'required|max:255'
        ));

        $info = new InfoDetay();
        $info->baslik = request('baslik');
        $info->ozellik = request('ozellik');
        $info->info_id = request('info_id');
        $info->save();

        if ($info){
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
        $infoDetay = InfoDetay::find($id);
        $infolar = Info::all();
        return view('admin.infodetaylar.edit',compact('infoDetay','infolar'));
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
            'baslik'=> 'required'
        ));

        $info = InfoDetay::find($id);
        $info->baslik = request('baslik');
        $info->ozellik = request('ozellik');
        $info->info_id = request('info_id');
        $info->save();

        if ($info){
            alert()
                ->success('Başarılı...', 'Başarı ile güncellendi')
                ->autoClose(2000);
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
        }
        return redirect()->route('infodetaylar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = InfoDetay::destroy($id);
        if ($info){
            alert()
                ->success('Başarılı...', 'Başarı ile silindi')
                ->autoClose(2000);
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
        }
        return redirect()->route('infodetaylar.index');
    }
}
