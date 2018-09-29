@extends('yonetim.layouts.master')

@section('title','Kullanıcı Yönetimi')

@section('content')
<h1 class="page-header">Kullanıcı Düzenle</h1>

<form method="post" action="{{route('yonetim.kullanici.kaydet',@$entry->id)}}">
    {{csrf_field()}}

    <div class="pull-right">
        <button type="submit" class="btn btn-primary">

            {{ @$entry->id >0 ? "Güncelle" : "Kaydet" }}
        </button>

    </div>
    <h2 class="sub-header">
        Kullanıcı {{@$entry->id>0 ? "Güncelle" :"Kaydet"}}

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
                <label for="email">E Mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Mail" value="{{old('email',$entry->email)}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sifre">Şifre</label>
                <input type="password" class="form-control" id="sifre" name="sifre" placeholder="Şifre">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="adres">Adres</label>
                <input type="text" class="form-control" id="adres" name="adres" placeholder="adres" value="{{old('adres',$entry->detay->adres)}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="telefon">Telefon</label>
                <input type="text" class="form-control" id="telefon" name="telefon" placeholder="telefon" value="{{old('telefon',$entry->detay->telefon)}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="ceptelefon">Cep Telefon</label>
                <input type="text" class="form-control" id="ceptelefon" name="ceptelefon" placeholder="ceptelefon" value="{{old('ceptelefon',$entry->detay->ceptelefon)}}">
            </div>
        </div>
    </div>


    <div class="checkbox">
        <label>
            <input type="hidden" name="aktif_mi" value="0">
            <input type="checkbox" name="aktif_mi" value="1" {{old('aktif_mi',$entry->aktif_mi ? 'checked' : '')}}> Aktif Mi?
        </label>
    </div>

    <div class="checkbox">
        <label>
            <input type="hidden" name="yonetici_mi" value="0">

            <input type="checkbox" name="yonetici_mi" value="1" {{old('yonetici_mi',$entry->yonetici_mi ? 'checked' : '')}}> Yönetici Mi ?
        </label>
    </div>
    {{--<button type="submit" class="btn btn-dark">Kaydet</button>--}}
</form>
    @endsection