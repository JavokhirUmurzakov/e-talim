<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fakultet_kafedra;
use App\Models\Fan_uqituvchi;
use App\Models\Uqituvchi;

class Fanlar extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomi',
        'qs_nomi',
        'kod',
        'faol',
        'fakultet_kafedra_id',
    ];
    public function fakultet_kafedra(){
        return $this->belongsTo(Fakultet_kafedra::class);
//        return $this->hasMany(Fakultet_kafedra::class);

    }
    public function jurnals()
    {
        return $this->hasMany(Jurnal::class, 'fanlar_id', 'id');
    }

    public function fan_uqituvchi()
    {
        return $this->hasMany(Fan_uqituvchi::class, 'uqituvchi_id', 'id');
    }

    //xatolik bulishi mumkin test qilinmadi
//    public function uqituvchilar(){
//        return $this->belongsToMany(Uqituvchi::class);
//    }

    //yuqoridagi kodda hatolik mavjud bolsa kommentga olingan kod orqali boglash tavsiya etiladi

//    public function fan_uqituvchi(){
//        return $this->hasMany(Fan_uqituvchi::class);
//    }
}
