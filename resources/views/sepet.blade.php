@extends('layouts.master')
@section('title','Sepet')

@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Sepet</h2>
            @include('layouts.partials.alert')

            @if(count(Cart::content())>0)
                <table class="table table-bordererd table-hover">
                <tr>
                    <th colspan="2">Ürün</th>
                    <th>Tutar</th>
                    <th>Adet</th>
                    <th>Toplam</th>
                    <th>İşlem</th>
                </tr>

                @foreach(Cart::content() as $urunCartItem)

                <tr>
                    <td style="width: 120px;">
                        <a href="{{route('urun',$urunCartItem->options->slug)}}">

                            <img src="http://via.placeholder.com/120x100?text=UrunResmi"> Ürün adı </a></td>
                    <td>18.99</td>
                    <td>
                        <a href="{{route('urun',$urunCartItem->options->slug)}}">
                            {{$urunCartItem->name}}
                        </a>

                        <form action="{{route('sepet.kaldir',$urunCartItem->rowId)}}" method="post">
                            {{csrf_field()}}

                            {{method_field('DELETE')}}


                            <input type="submit" class="btn btn-danger btn-xs" value="Sepetten Kaldır">
                        </form>
                    </td>

                    <td>{{$urunCartItem->price}}</td>
                    <td>
                        <a href="#" class="btn btn-xs btn-default urun-adet-azalt " data-id="{{$urunCartItem->rowId}}" data-adet="{{$urunCartItem->qty-1}}">-</a>
                        <span style="padding: 10px 20px">{{$urunCartItem->qty}}</span>
                        <a href="#" class="btn btn-xs btn-default urun-adet-artir" data-id="{{$urunCartItem->rowId}}" data-adet="{{$urunCartItem->qty+1}}">+</a>
                    </td>
                    <td>18.99</td>
                    <td class="text-right">
                        {{$urunCartItem->subTotal}}
                    </td>
                </tr>
                @endforeach
                <tr>

                    <th colspan="4" class="text-right" >Alt Toplam</th>
                    <th class="text-right">{{Cart::subtotal()}}</th>
                </tr>


                <tr>

                    <th colspan="4" class="text-right" >KDV</th>
                    <th class="text-right"> {{Cart::tax()}}</th>
                </tr>

                <tr>

                    <th colspan="4" class="text-right" >Genel Toplam</th>
                    <th class="text-right">{{Cart::total()}}</th>
                </tr>


            </table>
                <div>
                    
                    <form action="{{route('sepet.bosalt')}}" method="post">
                {{csrf_field()}}
                        {{method_field('DELETE')}}

                        <input type="submit" class="btn btn-info pull-left" value="Sepeti Sil">
                    </form>
                    
                    <a href="{{route('odeme')}}" class="btn btn-success pull-right btn-lg">Ödeme Yap</a>
                </div>

            @else
                <p>Sepetinizde Ürün Yok</p> @endif

        </div>
    </div>

@endsection