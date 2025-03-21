<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Uquv_yili;
use App\Models\Ohtm;
use App\Models\Yuklama;
use App\Models\Tinglovchi_yutuqlar;
use App\Models\Dars_jadvali;

class Uquv_yili_ohtm extends Model
{
    use HasFactory;

    protected $fillable = [
        'boshlanishi',
        'tugashi',
        'faol',
        'ohtm_id',
        'uquv_yili_id',
    ];

    public function uquv_yili(){
        return $this->belongsTo(Uquv_yili::class);
    }
    public function ohtm(){
        return $this->belongsTo(Ohtm::class);
    }
    public function yuklamalar(){
        return $this->hasMany(Yuklama::class);
    }

    public function tinglovchi_yutuqlar(){
        return $this->hasMany(Tinglovchi_yutuqlar::class);
    }

    public function dars_jadvali(){
        return $this->hasMany(Dars_jadvali::class);
    }
}
