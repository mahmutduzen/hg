<?php

namespace App\Http\Controllers;

use App\Dosya;
use App\Marka;
use App\UrunMarka;
use Illuminate\Http\Request;

class MarkaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $markalar = Marka::all();
        return view('admin.markalar.index',compact('markalar'));
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
        return view('admin.markalar.create',compact('markalar','resimler'));
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
            'ust_id'=> 'required',
            'dosya_id'=> 'required',
            'adi'=> 'required'
        ));

        $marka = new Marka();
        $marka->ust_id = request('ust_id');
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
        $markalar = Marka::all();
        $resimler = Dosya::all();
        $marka = Marka::find($id);
        return view('admin.markalar.edit',compact('marka','markalar','resimler'));
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
            'ust_id'=> 'required',
            'dosya_id'=> 'required',
            'adi'=> 'required'
        ));

        $marka = Marka::find($id);
        $marka->ust_id = request('ust_id');
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
        return redirect()->route('markalar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marka = Marka::destroy($id);
        $urunmarka = UrunMarka::where('marka_id', '=', $id)->delete();
        if ($marka){
            alert()
                ->success('Başarılı...', 'Başarı ile silindi')
                ->autoClose(2000);
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
        }
        return redirect()->route('markalar.index');
    }
}
