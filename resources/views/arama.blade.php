@extends('layouts.master')
@section('title','Arama Sonuçları')

@section('content')

<div class="container">

    <ol class="breadcrumb">

        <li><a href="{{route('anasayfa')}}">Anasayfa</a></li>
        <li class="active">Arama Sonuçları</li>
    </ol>

    <div class="producs">

        <div class="row">
            @if(count($urunler)==0)
                <div class="col-md-12 text-center">

                    Ürün yok
                </div>
@endif
            @foreach($urunler as $urun)

                    <div class="col-md-3 product">
                        <a href="{{route('urun',$urun->slug)}}">
                            <img src="http://via.placeholder.com/640x400?text=UrunResmi"
                            alt="{{$urun->urun_adi}}">
                        </a>

                        <p>
                            <a href="{{route('urun',$urun->slug)}}">

                                {{$urun->urun_adi}}
                            </a>
                        </p>
                        <p class="price"> {{$urun->fiyat}} TL</p>


                    </div>

                @endforeach

        </div>

        {{$urunler->appends(['aranan'=>old('aranan')])->links()}}

    </div>


</div>



    @endsection