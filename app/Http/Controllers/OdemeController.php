<?php

namespace App\Http\Controllers;

use App\Models\Siparis;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OdemeController extends Controller
{
    public function index(){

        if(!auth()->check()) //kullanıcı girişi yapılmadıysa
        {

            return redirect()->route('kullanici.oturumac')
                ->with('mesaj_tur','info')
                ->with('mesaj','Ödeme bilgisi için oturum açın ya da kayıt olun');
        }

        else if (count(Cart::content())==0)
        {

            return redirect()->route('anasayfa')
                ->with('mesaj_tur','info')
                ->with('mesaj','Ödeme için sepetinizde ürün bulunmalıdır');
        }


        $kullanici_detay=auth()->user()->detay;

        return view('odeme',compact('kullanici_detay'));
    }


    public function odemeyap()
    {
            $siparis=request()->all();
            $siparis['sepet_id']=session('aktif_sepet_id');
            $siparis['banka']="Garanti";
            $siparis['taksit_sayisi']=1;
            $siparis['durum']="Sipariş Alındı";
            $siparis['siparis_tutari']=Cart::subtotal();

            Siparis::create($siparis);
            Cart::destroy();

            session()->forget('aktif_sepet_id');

            return redirect()->route('siparisler');

    }
}
