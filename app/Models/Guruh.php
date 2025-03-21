<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Til;
use App\Models\Kurs;
use App\Models\Yunalishlar;
use App\Models\Tinglovchi;
use App\Models\Dars_jadvali;

class Guruh extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomi',
        'boshliq_fio',
        'holat',
        'til_id',
        'kurs_id',
        'yunalish_id',
    ];

    public function til(){
        return $this->belongsTo(Til::class);
    }

    public function kurs(){
        return $this->belongsTo(Kurs::class);
    }

    public function yunalish(){
        return $this->belongsTo(Yunalishlar::class);
    }

    public function tinglovchilar(){
        return $this->hasMany(Tinglovchi::class);
    }

    public function dars_jadvali(){
        return $this->hasMany(Dars_jadvali::class);
    }
}
