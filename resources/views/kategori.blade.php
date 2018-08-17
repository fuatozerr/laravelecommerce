@extends('layouts.master')

@section('title',$kategori->kategori_adi)

@section('content')

    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{route('anasayfa')}}">Anasayfa</a></li>

            <li class="active">{{$kategori->kategori_adi}}</li>
        </ol>
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$kategori->kategori_adi}}</div>
                    @if(count($alt_kategoriler)>0)
                    <div class="panel-body">
                        <h3>Alt Kategoriler</h3>
                        <div class="list-group categories">
                            @foreach($alt_kategoriler as $alt_kategoriler)
                            <a href="{{route('kategori',$alt_kategoriler->slug)}}" class="list-group-item"><i class="fa fa-television"></i> {{$alt_kategoriler->kategori_adi}}</a>
                            @endforeach
                        </div>

                    </div>
                        @endif
                </div>
            </div>
            <div class="col-md-9">
                <div class="products bg-content">
                    @if(count($urunler)>0)
                    <a href="?order=coksatanlar" class="btn btn-default">Çok Satanlar</a>
                    <a href="?order=yeni" class="btn btn-default">Yeni Ürünler</a>
                    <hr>
                    @endif
                    <div class="row">
                        @if(count($urunler)==0)
                            Bu kategoride ürün yok

                            @endif

                        @foreach($urunler as $urun)
                        <div class="col-md-3 product">
                            <a href="{{route('urun',$urun->slug)}}"><img src="http://lorempixel.com/400/400/food/1"></a>
                            <p><a href="{{route('urun',$urun->slug)}}">{{$urun->urun_adi}}</a></p>
                            <p class="price"> {{$urun->fiyat}}₺</p>
                            <p><a href="#" class="btn btn-theme">Sepete Ekle</a></p>
                        </div>
            @endforeach

                    </div>
                    {{ request()->has('order')? $urunler->appends(['order' =>request('order')])
                    ->links(): $urunler->links()}}
                </div>
            </div>
        </div>
    </div>


    @endsection