<?php

namespace App\Http\Controllers;

use App\Ayar;
use Illuminate\Http\Request;

class AyarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ayarlar = Ayar::find(1)->first();
        return view('admin.ayar.create',compact('ayarlar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $this->validate(request(),array(
            'title'=> 'required|max:255',
            'desc'=> 'required|max:255',
            'keyw'=> 'required|max:255',
            'sosyal'=> 'required',
            'bilgiler'=> 'required',
            'mail'=> 'required|max:255',
            'logo'=> 'required|max:255',
            'footer'=> 'required'
        ));

        $ayar = Ayar::find($id);
        $ayar->title = request('title');
        $ayar->desc = request('desc');
        $ayar->keyw = request('keyw');
        $ayar->sosyal = request('sosyal');
        $ayar->bilgiler = request('bilgiler');
        $ayar->mail = request('mail');
        $ayar->logo = request('logo');
        $ayar->footer = request('footer');
        $ayar->save();

        if ($ayar){
            alert()
                ->success('Başarılı...', 'Başarı ile güncellendi')
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
