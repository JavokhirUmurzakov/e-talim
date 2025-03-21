<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Qabul_statistika;
use App\Models\Xabarlar;
use App\Models\Akkreditatsiya;
use App\Models\Fakultet_kafedra;
use App\Models\Uquv_yili_ohtm;
use App\Models\Kurs;
use App\Models\Yunalishlar;
use App\Models\Horijdagi_tinglovchilar;

class Ohtm extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomi',
        'qs_nomi',
        'uqituvchi_id',
        'haqida',
        'logo',
    ];

    public function qabul_statlar(){
        return $this->hasMany(Qabul_statistika::class);
    }

    public static function hello()
    {
        return "Hello";
    }
    public function xabarlar(){
        return $this->hasMany(Xabarlar::class);
    }

    public function akkreditatsiya(){
        return $this->hasMany(Akkreditatsiya::class);
    }

    public function fakultet_kafedralar(){
        return $this->hasMany(Fakultet_kafedra::class);
    }

    public function uquv_yili_ohtm(){
        return $this->hasMany(Uquv_yili_ohtm::class);
    }

    public function kurslar(){
        return $this->hasMany(Kurs::class);
    }

    public function yunalishlar(){
        return $this->hasMany(Yunalishlar::class);
    }

    public function horijdagi_tinglovchilar(){
        return $this->hasMany(Horijdagi_tinglovchilar::class);
    }
}
