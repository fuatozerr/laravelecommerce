<?php

namespace App\Http\Controllers\Yonetim;

use App\Models\Kategori;
use App\Models\Siparis;
use App\Models\UrunDetay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Urun;
class SiparisController extends Controller
{
    public function index()
    {
        if(request()->filled('aranan'))
        {
            request()->flash();
            $aranan=request('aranan');
            $list=Siparis::with('sepet.kullanici')->where('adsoyad','like',"%$aranan%")->orWhere('banka','like',"%$aranan%")->paginate(8);
        }
        else {
            $list = Siparis::with('sepet.kullanici')->orderBy('id')->paginate(8);
        }


        return view('yonetim.siparis.index',compact('list'));
    }

    public function form($id=0)
    {



        if($id>0){
            $entry=Siparis::with('sepet.sepet_urunler.urun')->find($id);
        }

        return view('yonetim.siparis.form',compact('entry'));
    }

    public function kaydet($id=0) //id geldiyse güncelleme olcak 0 ise yeni kayıt olcak
    {


        $data=request()->only('adsoyad','adres','telefon','ceptelefonu','durum');



        if($id>0)
        {
            $entry=Siparis::where('id',$id)->firstOrFail();
            $entry->update($data);


        }



        return redirect()->route('yonetim.siparis.duzenle',$entry->id);

    }

    public function sil($id)
    {
        Siparis::destroy($id);


        return redirect()
            ->route('yonetim.siparis');
    }
}
