<?php

namespace App\Http\Controllers\Yonetim;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function index()
    {
        if(request()->filled('aranan')  || request()->filled('ust_id'))
        {
            request()->flash();
            $aranan=request('aranan');
            $ust_id=request('ust_id');
            $list=Kategori::with('ust_kategori')->where('kategori_adi','like',"%$aranan%")
                ->where('ust_id',$ust_id)
                ->orWhere('slug','like',"%$aranan%")->paginate(8);
        }
        else {
            $list = Kategori::orderByDesc('created_at')->paginate(8);
        }

        $anakategoriler=Kategori::whereRaw('ust_id is null')->get();

        return view('yonetim.Kategori.index',compact('list','anakategoriler'));


    }

    public function form($id=0)
    {

        $entry=new Kategori;
        if($id>0){
            $entry=Kategori::find($id);

        }
        $kategoriler=Kategori::all();

        return view('yonetim.kategori.form',compact('entry','kategoriler'));
    }

    public function kaydet($id=0) //id geldiyse güncelleme olcak 0 ise yeni kayıt olcak
    {
        $this->validate(request(),[
            'kategori_adi' => 'required',
            'slug'=>(request('original_slug') != request('slug') ? 'unique:kategori,slug':'')

        ]);

        $data=request()->only('kategori_adi','slug','ust_id');
        if(!request()->filled('slug')) //slug değeri doldurulmamışsa filled = boş oldugunu söylüyr

        {
            $data['slug']=str_slug(request('kategori_adi'));
        }

        if($id>0)
        {
            $entry=Kategori::where('id',$id)->firstOrFail();
            $entry->update($data);
        }
        else
        {
            $entry=Kategori::create($data);
        }



        return redirect()->route('yonetim.kategori.duzenle',$entry->id);

    }


    public function sil($id)
    {
        //çoka çok tabloları silme işlemi detach

        $kategori=Kategori::find($id);
        $kategori->urunler()->detach();
        $kategori->delete();
        return redirect()
            ->route('yonetim.kategori');
    }
}
