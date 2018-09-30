@extends('yonetim.layouts.master')

@section('title','Kategori Yönetimi')

@section('content')

    <h1 class="sub-header">  Kategori Listesi
        <div class="well">
        <div class="btn-group pull-right" role="group" aria-label="Basic example">
            <a href="{{route('yonetim.kategori.yeni')}}" class="btn btn-primary"> Kategori Ekle </a>
        </div>
            <form method="post" action="{{route('yonetim.kategori')}}" class="form-inline">
                {{csrf_field()}}

                <div class="form-group">

                    <label  for="aranan">Ara</label>
                    <input type="text" class="form-control form-control-sm" name="aranan" id="aranan" placeholder="Ad, Kategori.." value="{{old('aranan')}}">
                    <label for="ust_id">Üst Kategori</label>
                    <select name="ust_id" id="ust_id" class="form-control">
                        <option value="">Seçiniz</option>
                        @foreach($anakategoriler as $kategori)
                            <option value="{{$kategori->id}}">{{$kategori->kategori_adi}}</option>
                            @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Ara</button>
                <a href="{{route('yonetim.kategori')}}" class="btn btn-primary">Temizle</a>
            </form>
        </div>
    </h1>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">

            <tr>
                <th>Id</th>
                <th>Üst Kategori</th>
                <th>Slug</th>
                <th>Kategori Adı</th>

                <th>Kayıt Tarihi</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $listele)
            <tr>
                <td>{{$listele->id}}</td>
               <td> {{$listele->ust_kategori->kategori_adi}}</td>
                <td>{{$listele->slug}}</td>
                <td>{{$listele->kategori_adi}}</td>

                <td>{{$listele->created_at}}</td>

                <td style="width: 100px">
                    <a href="{{route('yonetim.kategori.duzenle',$listele->id)}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <a href="{{route('yonetim.kategori.sil',$listele->id)}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="return confirm('Emin Misin?')">
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

