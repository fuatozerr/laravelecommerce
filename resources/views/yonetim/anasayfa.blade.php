@extends('yonetim.layouts.master')

@section('title','Anasssayfa')

@section('content')

    <h1 class="page-header">Anasayfa</h1>

    <section class="row text-center placeholders">
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Bekleyen Sipariş</div>
                <div class="panel-body">
                    <h4>{{$bekleyen_siparis}}</h4>
                    <p>Kadar Sipariş var</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Header</div>
                <div class="panel-body">
                    <h4>123</h4>
                    <p>Data</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Header</div>
                <div class="panel-body">
                    <h4>123</h4>
                    <p>Data</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Header</div>
                <div class="panel-body">
                    <h4>123</h4>
                    <p>Data</p>
                </div>
            </div>
        </div>
    </section>

    @endsection