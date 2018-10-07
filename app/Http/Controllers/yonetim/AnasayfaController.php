<?php

namespace App\Http\Controllers\yonetim;

use App\Models\Siparis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class AnasayfaController extends Controller
{
    public function index()
    {
        $istatislikler=[
        $bekleyen_siparis=Siparis::where('durum','Siparişiniz Alındı')->count()


        ];
        $bitiszamani=now()->addMinutes(10);
        Cache::put('istatislikler',$istatislikler,$bitiszamani);

        return view('yonetim.anasayfa',compact('bekleyen_siparis'));
    }
}
