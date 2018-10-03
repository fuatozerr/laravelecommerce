<?php

namespace App\Http\Controllers\Yonetim;

use App\Models\Kategori;
use App\Models\UrunDetay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Urun;
class UrunController extends Controller
{
    public function index()
    {
        if(request()->filled('aranan'))
        {
            request()->flash();
            $aranan=request('aranan');
            $list=Urun::where('urun_adi','like',"%$aranan%")->orWhere('aciklama','like',"%$aranan%")->paginate(8);
        }
        else {
            $list = Urun::orderBy('id')->paginate(8);
        }


        return view('yonetim.urun.index',compact('list'));
    }

    public function form($id=0)
    {

        $entry=new Urun;
        $urun_kategoriler=[];

        if($id>0){
            $entry=Urun::find($id);
            $urun_kategoriler=$entry->kategoriler()->pluck('kategori_id')->all();
        }
        $kategoriler=Kategori::all();

        return view('yonetim.urun.form',compact('entry','kategoriler','urun_kategoriler'));
    }

    public function kaydet($id=0) //id geldiyse güncelleme olcak 0 ise yeni kayıt olcak
    {


        $data=request()->only('urun_adi','slug','aciklama','fiyat');
        if(!request()->filled('slug')) //slug değeri doldurulmamışsa filled = boş oldugunu söylüyr

        {
            $data['slug']=str_slug(request('urun_adi'));
        }
        $data_detay=request()->only('goster_slider','goster_gunun_firsati','goster_one_cikan','goster_cok_satan','goster_indirimli');
        $kategoriler=request('kategoriler');

        if($id>0)
        {
            $entry=Urun::where('id',$id)->firstOrFail();
            $entry->update($data);

//            $urun_detay=UrunDetay::where('urun_id',$id)->firstOrFail();

            $entry->detay()->update($data_detay);


        }
        else
        {
            $entry=Urun::create($data);
            $entry->detay()->create($data_detay);
            $entry->kategoriler()->attach($kategoriler);
        }

        if(request()->hasFile('urun_resmi'))
        {
            $this->validate(request(),[
                'urun_resmi'=>'image|mimes:jpg,png,jpeg,gif|max:2048'
            ]);
            $urun_resmi=request()->file('urun_resmi');

            $dosyaadi=$entry->id."-".time().".".$urun_resmi->extension();

            if($urun_resmi->isValid())
            {
                $urun_resmi->move('uploads/urunler',$dosyaadi);
                UrunDetay::updateOrCreate(
                    ['urun_id'=>$entry->id],
                    ['urun_resmi'=>$dosyaadi]
                );
            }
        }

        return redirect()->route('yonetim.urun.duzenle',$entry->id);

    }

    public function sil($id)
    {
        $urun=Urun::find($id);
        $urun->kategoriler()->detach();
        $urun->detay()->delete();
        $urun->delete();

        $urun->delete();
        return redirect()
            ->route('yonetim.urun');
    }
}
