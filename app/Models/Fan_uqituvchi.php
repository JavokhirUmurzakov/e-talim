<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fanlar;
use App\Models\Uqituvchi;
use App\Models\Yuklama;
use App\Models\Dars_jadvali;

class Fan_uqituvchi extends Model
{
    use HasFactory;

    protected $fillable = [
        'uqituvchi_id',
        'fanlar_id',
        'faol',
    ];

    public function fanlar(){
        return $this->belongsTo(Fanlar::class);
    }
    public function uqituvchi(){
        return $this->belongsTo(Uqituvchi::class);
    }
    public function yuklamalar(){
        return $this->hasMany(Yuklama::class);
    }
    public function dars_jadvali(){
        return $this->hasMany(Dars_jadvali::class);
    }
}
