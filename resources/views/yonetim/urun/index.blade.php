@extends('yonetim.layouts.master')

@section('title','Ürün Yönetimi')

@section('content')

    <h1 class="sub-header">  Ürün Listesi
        <div class="well">
        <div class="btn-group pull-right" role="group" aria-label="Basic example">
            <a href="{{route('yonetim.urun.yeni')}}" class="btn btn-primary"> Ürün Ekle </a>
        </div>
            <form method="post" action="{{route('yonetim.urun')}}" class="form-inline">
                {{csrf_field()}}

                <div class="form-group">

                    <label  for="aranan">Ara</label>
                    <input type="text" class="form-control form-control-sm" name="aranan" id="aranan" placeholder="Ürün ara.." value="{{old('aranan')}}">
                </div>
                <button type="submit" class="btn btn-primary">Ara</button>
                <a href="{{route('yonetim.urun')}}" class="btn btn-primary">Temizle</a>
            </form>
        </div>
    </h1>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">

            <tr>
                <th>Id</th>
                <th>Resim</th>
                <th>Slug</th>
                <th>Ürün Adı</th>
                <th>Fiyatı</th>
                <th>Kayıt Tarihi</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $listele)
            <tr>
                <td>{{$listele->id}}</td>
                <td>
                    <img src="{{$listele->detay->urun_resmi!=null ? asset('uploads/urunler/'.$listele->detay->urun_resmi) :
                                    'http://via.placeholder.com/400x400?text=Resim Yok'}}" style="width: 120px">
                </td>
                <td>{{$listele->slug}}</td>
                <td>{{$listele->urun_adi}}</td>
                <td>{{$listele->fiyat}}</td>

                <td>{{$listele->created_at}}</td>

                <td style="width: 100px">
                    <a href="{{route('yonetim.urun.duzenle',$listele->id)}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <a href="{{route('yonetim.urun.sil',$listele->id)}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="return confirm('Emin Misin?')">
                        <span class="fa fa-trash"></span>
                    </a>
                </td>
            </tr>

                @endforeach
            </tbody>
        </table>
        {{$list->links()}}

    </div>


    @endsection

