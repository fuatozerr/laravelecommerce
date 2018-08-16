@extends('layouts.master')
@section('title','Hata Sayfası')

@section('content')

<div class="container">
    <div class="jumbotron text-center">
        <h1>404</h1>
        <h2>Aradığını Sayfa Bulunamadı</h2>
        <a href="{{route('anasayfa')}}" class="btn btn-primary">Anasayfaya Dön</a>
    </div>
</div>

@endsection