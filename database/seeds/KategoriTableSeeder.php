<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('kategori')->insert(['kategori_adi'=>'Dergi','slug'=>'dergi']);

        DB::table('kategori')->insert(['kategori_adi'=>'Mobilya','slug'=>'mobilya']);


        $id=DB::table('kategori')->insertGetId(['kategori_adi'=>'Elektronik','slug'=>'elektronik']);
        DB::table('kategori')->insert(['kategori_adi'=>'Telefon',
            'slug'=>'telefon','ust_id'=>$id]);
        DB::table('kategori')->insert(['kategori_adi'=>'Monitor',
            'slug'=>'monitor','ust_id'=>$id]);
        DB::table('kategori')->insert(['kategori_adi'=>'Kamera',
            'slug'=>'kamera','ust_id'=>$id]);

        $id=DB::table('kategori')->insertGetId(['kategori_adi'=>'Kitap','slug'=>'kitap']);
        DB::table('kategori')->insert(['kategori_adi'=>'Egitim',
            'slug'=>'egitim','ust_id'=>$id]);
        DB::table('kategori')->insert(['kategori_adi'=>'Bilim',
            'slug'=>'bilim','ust_id'=>$id]);
    }
}
