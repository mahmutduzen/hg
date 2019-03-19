<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Sayfa;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuler = Menu::all();
        return view('admin.menuler.index',compact('menuler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menuler = Menu::all();
        $sayfalar = Sayfa::all();
        return view('admin.menuler.create',compact('menuler','sayfalar'));
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
            'sayfa_id'=> 'required',
            'ust_id'=> 'required',
            'sira'=> 'required'
        ));

        $menu = new Menu();
        $menu->sayfa_id = request('sayfa_id');
        $menu->ust_id = request('ust_id');
        $menu->sira = request('sira');
        $menu->save();

        if ($menu){
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
        $menuler = Menu::all();
        $sayfalar = Sayfa::all();
        $menu = Menu::find($id);
        return view('admin.menuler.edit',compact('menuler','sayfalar','menu'));
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
            'sayfa_id'=> 'required',
            'ust_id'=> 'required',
            'sira'=> 'required'
        ));

        $menu = Menu::find($id);
        $menu->sayfa_id = request('sayfa_id');
        $menu->ust_id = request('ust_id');
        $menu->sira = request('sira');
        $menu->save();

        if ($menu){
            alert()
                ->success('Başarılı...', 'Başarı ile güncellendi')
                ->autoClose(2000);
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
        }
        return redirect()->route('menuler.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::destroy($id);
        if ($menu){
            alert()
                ->success('Başarılı...', 'Başarı ile silindi')
                ->autoClose(2000);
        }else{
            alert()
                ->error('Hata...', 'İşlem hatası oluştu!')
                ->autoClose(2000);
        }
        return redirect()->route('menuler.index');
    }
}
