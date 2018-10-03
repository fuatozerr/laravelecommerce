@extends('yonetim.layouts.master')

@section('title','Sipariş Yönetimi')

@section('content')

    <h1 class="sub-header">  Sipariş Listesi
        <div class="well">

            <form method="post" action="{{route('yonetim.siparis')}}" class="form-inline">
                {{csrf_field()}}

                <div class="form-group">

                    <label  for="aranan">Ara</label>
                    <input type="text" class="form-control form-control-sm" name="aranan" id="aranan" placeholder="Sipariş ara.." value="{{old('aranan')}}">
                </div>
                <button type="submit" class="btn btn-primary">Ara</button>
                <a href="{{route('yonetim.siparis')}}" class="btn btn-primary">Temizle</a>
            </form>
        </div>
    </h1>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">

            <tr>
                <th>Id</th>
                <th>Kullanıcı</th>
                <th>Sipariş Kodu</th>

                <th>Tutar</th>
                <th>Durum</th>
                <th>Sipariş Tarihi</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $listele)
            <tr>
                <td>{{$listele->id}}</td>
              <td>{{$listele->adsoyad}}</td>
                <td>SP-{{$listele->id}}</td>
                <td>{{$listele->siparis_tutari}}</td>
                <td>{{$listele->durum}}</td>

                <td>{{$listele->created_at}}</td>

                <td style="width: 100px">
                    <a href="{{route('yonetim.siparis.duzenle',$listele->id)}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <a href="{{route('yonetim.siparis.sil',$listele->id)}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="return confirm('Emin Misin?')">
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

