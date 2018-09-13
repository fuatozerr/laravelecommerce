<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Kullanici extends Authenticatable
{


    use SoftDeletes;

    protected $table='kullanici';
    protected $fillable = [
        'adsoyad', 'email', 'sifre','aktivasyon_anahtari','aktif_mi'];


//    protected $guarded=[];  //tüm kolonları izin verir ekler
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'sifre', 'aktivasyon_anahtari'];


    public function getAuthPassword()
    {
        return $this->sifre;
    }


    public function detay()
    {
        return $this->hasOne('App\Models\KullaniciDetay');
    }
}
