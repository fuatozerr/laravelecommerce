@extends('layouts.master')
@section('title','Sipariş Detayı')

@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Sipariş (SP-{{$siparis->id}})</h2>
            <table class="table table-bordererd table-hover">
                <tr>
                    <th colspan="2">Ürün</th>
                    <th>Tutar</th>
                    <th>Adet</th>
                    <th>Ara Toplam</th>
                    <th>Durum</th>
                </tr>
                @foreach($siparis->sepet->sepet_urunler as $sepet_urun)
                <tr>
                    <td style="width: 120px">
                        <a href="{{route('urun',$sepet_urun->urun->slug)}}">
                            <img src="{{$sepet_urun->urun->detay->urun_resmi!=null ? asset('uploads/urunler/'.$sepet_urun->urun->detay->urun_resmi) :
                                    'http://via.placeholder.com/400x400?text=UrunResmi'}}" class="img-responsive" style="min-width: 100%">                           </a>
                    </td>
                    <td>{{$sepet_urun->urun->urun_adi}}</td>
                    <td>{{$sepet_urun->tutar}}</td>
                    <td>{{$sepet_urun->adet}}</td>
                    <td>{{$sepet_urun->tutar * $sepet_urun->adet}}</td>

                    <td>
                        {{$sepet_urun->durum}}
                    </td>
                </tr>

                @endforeach
                <tr>

                    <th colspan="4" class="text-right">Toplam Tutar </th>
                    <th colspan="2">{{$siparis->siparis_tutari}} TL</th>
                    <th></th>
                </tr>
                <tr>

                    <th colspan="4" class="text-right">Toplam Tutar (KDV Dahil)</th>
                    <th colspan="2">{{$siparis->siparis_tutari *((100+config('cart.tax'))/100)}} TL</th>
                    <th></th>
                </tr>
                <tr>

                    <th colspan="4" class="text-right">Sipariş Durumu</th>
                    <th colspan="2">{{$siparis->durum}} </th>
                    <th></th>
                </tr>

            </table>
        </div>
    </div>

@endsection