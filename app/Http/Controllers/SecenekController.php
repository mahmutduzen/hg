<?php

namespace App\Http\Controllers;

use App\Ozellik;
use App\Secenek;
use Illuminate\Http\Request;

class SecenekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secenekler = Secenek::all();
        return view('admin.secenekler.index',compact('secenekler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ozellikler = Ozellik::all();
        return view('admin.secenekler.create',compact('ozellikler'));
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
            'adi'=> 'required|max:255'
        ));

        $secenek = new Secenek();
        $secenek->adi = request('adi');
        $secenek->ozellik_id = request('ozellik_id');
        $secenek->save();

        if ($secenek){
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
        $secenek = Secenek::find($id);
        $ozellikler = Ozellik::all();
        return view('admin.secenekler.edit',compact('secenek','ozellikler'));
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
            'adi'=> 'required|max:255'
        ));

        $secenek = Secenek::find($id);
        $secenek->adi = request('adi');
        $secenek->ozellik_id = request('ozellik_id');
        $secenek->save();

        if ($secenek){
            alert()
                ->success('Başarılı...', 'Başarı ile güncellendi')
                ->autoClose(2000);
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
        }
        return redirect()->route('secenekler.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $secenek = Secenek::destroy($id);
        if ($secenek){
            alert()
                ->success('Başarılı...', 'Başarı ile silindi')
                ->autoClose(2000);
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
        }
        return redirect()->route('secenekler.index');
    }
}
