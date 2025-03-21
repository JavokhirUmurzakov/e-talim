<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fak_kaf_turi;
use App\Models\Ohtm;
use App\Models\Fanlar;
use App\Models\Uqituvchi;
use App\Models\Xonalar;

class Fakultet_kafedra extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomi',
        'qs_nomi',
        'haqida',
        'kod',
        'parent_id',
        'fak_kaf_turi_id',
        'ohtm_id',
    ];

    public function parent()
    {
        return $this->belongsTo(Fakultet_kafedra::class);
    }

    public function children()
    {
        return $this->hasMany('App\Models\Fakultet_kafedra', 'parent_id');
//            ->select(
//                "id",
//                "soni",
//                "qabul_yili",
//                "boshqarma_id",
//                "izoh",
//                "created_at"
//            )->orderby('id', 'desc');
//            )->orderby('created_at', 'desc');
    }


    public function fak_kaf_turi(){
        return $this->belongsTo(Fak_kaf_turi::class);
    }

    public function ohtm(){
        return $this->belongsTo(Ohtm::class);
    }

    public function fanlar(){
        return $this->hasMany(Fanlar::class);
    }

    public function uqituvchilar(){
        return $this->hasMany(Uqituvchi::class);
    }
    public function xonalar(){
        return $this->hasMany(Xonalar::class);
    }
    public function tinglovchi(){
        return $this->hasMany(Tinglovchi::class);
    }
}
