@extends('yonetim.layouts.master')

@section('title','Sipariş Yönetimi')

@section('content')
<h1 class="page-header">Sipariş Düzenle</h1>

<form method="post" action="{{route('yonetim.siparis.kaydet',@$entry->id)}}" >
    {{csrf_field()}}

    <div class="pull-right">
        <button type="submit" class="btn btn-primary">

            {{ @$entry->id >0 ? "Güncelle" : "Kaydet" }}
        </button>

    </div>
    <h2 class="sub-header">
        Sipariş {{@$entry->id>0 ? "Güncelle" :"Kaydet"}}

    </h2>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="adsoyad">Ad Soyad</label>
                <input type="text" class="form-control" id="adsoyad" name="adsoyad" placeholder="Adınız" value="{{old('adsoyad',$entry->adsoyad)}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="adres">Adres</label>
                <input type="text" class="form-control" id="adres" name="adres" placeholder="adres" value="{{old('adres',$entry->adres)}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="telefon">Telefon</label>
                <input type="text" class="form-control" id="telefon" name="telefon" placeholder="telefon" value="{{old('telefon',$entry->telefon)}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="ceptelefonu">Cep telefon</label>
                <input type="text" class="form-control" id="ceptelefonu" name="ceptelefonu" placeholder="ceptelefonu" value="{{old('ceptelefonu',$entry->ceptelefonu)}}">
            </div>
        </div>
    </div>


    <div class="col-md-3">
        <div class="form-group">
            <label for="durum">Kategoriler</label>

            <select name="durum" id="durum"  class="form-control" >
                <option {{old('durum',$entry->durum) ==' Sipariş Alındı'?'selected':''}}> Sipariş Alındı</option>
                <option {{old('durum',$entry->durum) ==' Ödeme Onaylandı'?'selected':''}}> Ödeme Onaylandı</option>

                <option {{old('durum',$entry->durum) ==' Kargoya Verildi'?'selected':''}}>Kargoya Verildi</option>

                <option {{old('durum',$entry->durum) ==' Sipariş Tamamlandı'?'selected':''}}> Sipariş Tamamlandı</option>

            </select>
        </div>
    </div>


    {{--<button type="submit" class="btn btn-dark">Kaydet</button>--}}
</form>
<hr>
<h3>Sipariş (SP-{{$entry->id}})</h3>


<table class="table table-bordererd table-hover">

    <tr>
        <th colspan="2">Ürün</th>
        <th>Tutar</th>
        <th>Adet</th>
        <th>Ara Toplam</th>
        <th>Durum</th>
    </tr>
    @foreach($entry->sepet->sepet_urunler as $sepet_urun)
        <tr>
            <td style="width: 120px">
                <a href="{{route('urun',$sepet_urun->urun->slug)}}">
                    <img src="{{$sepet_urun->urun->detay->urun_resmi!=null ? asset('uploads/urunler/'.$sepet_urun->urun->detay->urun_resmi) :
                                    'http://via.placeholder.com/400x400?text=UrunResmi'}}" class="img-responsive" style="min-width: 100%">                       </a>
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
        <th colspan="2">{{$entry->siparis_tutari}} TL</th>
        <th></th>
    </tr>
    <tr>

        <th colspan="4" class="text-right">Toplam Tutar (KDV Dahil)</th>
        <th colspan="2">{{$entry->siparis_tutari *((100+config('cart.tax'))/100)}} TL</th>
        <th></th>
    </tr>
    <tr>

        <th colspan="4" class="text-right">Sipariş Durumu</th>
        <th colspan="2">{{$entry->durum}} </th>
        <th></th>
    </tr>

</table>
    @endsection

