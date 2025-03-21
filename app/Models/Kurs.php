<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kurs_holat;
use App\Models\Uqituvchi;
use App\Models\Kurs_bosqich;
use App\Models\Ohtm;
use App\Models\Guruh;
use App\Models\Xorijiy;

class Kurs extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomi',
        'haqida',
        'boshlanish_vaqti',
        'tugash_vaqti',
        'qabul_asos_pdf',
        'bitiruv_asos_pdf',
        'xorijiy_id',
        'kurs_holat_id',
        'uqituvchi_id',
        'kurs_bosqich_id',
        'ohtm_id',
        'uquv_turi_id',
    ];

    public function xorijiy(){
        return $this->belongsTo(Xorijiy::class);
    }

    public function kurs_holat(){
        return $this->belongsTo(Kurs_holat::class);
    }

    public function uqituvchi(){
        return $this->belongsTo(Uqituvchi::class);
    }

    public function kurs_bosqich(){
        return $this->belongsTo(Kurs_bosqich::class);
    }

    public function ohtm(){
        return $this->belongsTo(Ohtm::class);
    }

    public function uquv_turi(){
        return $this->belongsTo(Uquv_turi::class);
    }

    public function guruhlar(){
        return $this->hasMany(Guruh::class);
    }
}
