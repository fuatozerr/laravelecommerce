@extends('yonetim.layouts.master')

@section('title','Kategori Yönetimi')

@section('content')
<h1 class="page-header">Kategori Düzenle</h1>

<form method="post" action="{{route('yonetim.kategori.kaydet',@$entry->id)}}">
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
                <label for="kategori_adi">Üst Kategori Adı</label>
                <select name="ust_id" id="ust_id" class="form-control">
        @foreach($kategoriler as $kategori)
                    <option value="{{$kategori->id}}">{{$kategori->kategori_adi}}</option>
        @endforeach

                </select>

            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="kategori_adi">Kategori Adı</label>
                <input type="text" class="form-control" id="kategori_adi" name="kategori_adi" placeholder="Adınız" value="{{old('kategori_adi',$entry->kategori_adi)}}">
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="hidden" name="original_slug" value="{{old('slug',$entry->slug)}}">
                <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="{{old('slug',$entry->slug)}}">
            </div>
        </div>
    </div>

    {{--<button type="submit" class="btn btn-dark">Kaydet</button>--}}
</form>
    @endsection