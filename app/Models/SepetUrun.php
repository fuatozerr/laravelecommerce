<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SepetUrun extends Model
{
    use SoftDeletes;

    protected $table="sepet_urun";
    protected $guarded=[]; //tüm kolonlara ekleme izni verir
}
