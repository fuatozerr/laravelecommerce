<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index($slug_kategoriadi){

        $kategori=Kategori::where('slug',$slug_kategoriadi)->firstOrfail();

        $alt_kategoriler=Kategori::where('ust_id',$kategori->id)->get();

//        $urunler=$kategori->urunler()->paginate(2);

        $order=request('order');

        if($order=='coksatanlar')
        {
            $urunler=$kategori->urunler()
                ->distinct()
                ->join('urun_detay','urun_detay.urun_id','urun.id') //urun detay tablosuna ürünid ve ürün tablasında id
                ->orderby('urun_detay.goster_cok_satan','desc')
                ->paginate(2);
        }

        else if ($order=='yeni')
        {
            $urunler=$kategori->urunler()->distinct()->orderbyDesc('updated_at')->paginate(2);
        }

        else
            {
                $urunler=$kategori->urunler()->paginate(2);

            }


        return view('kategori',compact('kategori','alt_kategoriler','urunler'));
    }


}
