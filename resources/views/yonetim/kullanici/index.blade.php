@extends('yonetim.layouts.master')

@section('title','Kullanıcı Yönetimi')

@section('content')

    <h1 class="sub-header">  Kullanıcı Listesi
        <div class="well">
        <div class="btn-group pull-right" role="group" aria-label="Basic example">
            <a href="{{route('yonetim.kullanici.yeni')}}" class="btn btn-primary"> Kullanıcı Ekle </a>
        </div>
            <form method="post" action="{{route('yonetim.kullanici')}}" class="form-inline">
                {{csrf_field()}}

                <div class="form-group">

                    <label  for="aranan">Ara</label>
                    <input type="text" class="form-control form-control-sm" name="aranan" id="aranan" placeholder="Ad, Email.." value="{{old('aranan')}}">
                </div>
                <button type="submit" class="btn btn-primary">Ara</button>
                <a href="{{route('yonetim.kullanici')}}" class="btn btn-primary">Temizle</a>
            </form>
        </div>
    </h1>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">

            <tr>
                <th>Id</th>
                <th>Ad Soyad</th>
                <th>Email</th>
                <th>Aktif mi</th>
                <th>Yönetici Mi</th>
                <th>Kayıt Tarihi</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $listele)
            <tr>
                <td>{{$listele->id}}</td>
                <td>{{$listele->adsoyad}}</td>
                <td>{{$listele->email}}</td>
                <td>

                    @if($listele->aktif_mi)
                        <label>Evet</label>

                        @else
                        <label >Hayır</label>
    @endif

                </td>
                <td>
                    @if($listele->yonetici_mi)
                        <label>Yönetici</label>

                    @else
                        <label >Müşteri</label>
                    @endif</td>
                <td>{{$listele->created_at}}</td>

                <td style="width: 100px">
                    <a href="{{route('yonetim.kullanici.duzenle',$listele->id)}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <a href="{{route('yonetim.kullanici.sil',$listele->id)}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="return confirm('Emin Misin?')">
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

