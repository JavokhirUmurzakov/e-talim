<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Uqituvchi_holat;
use App\Models\Harbiy_unvon;
use App\Models\Fakultet_kafedra;
use App\Models\Ilmiy_unvon;
use App\Models\Ilmiy_daraja;
use App\Models\User;
use App\Models\Fan_uqituvchi;
use App\Models\Fanlar;
use  App\Models\Nashr;
use App\Models\Uqituvchi_shax_mal;
use App\Models\Malaka_oshirish;
use App\Models\Kurs;

class Uqituvchi extends Model
{

    protected $with = ['harbiy_unvon'];
    use HasFactory;
    protected $table = 'uqituvchis';

    protected $fillable = [
        'fio',
        'lavozim',
        'rasm',
        'mutaxassisligi',
        'rahbar',
        'uqituvchi_holat_id',
        'harbiy_unvon_id',
        'fakultet_kafedra_id',
        'ilmiy_unvon_id',
        'ilmiy_daraja_id',
        'user_id',
        'ohtm_id',
    ];


    //protected $table='uqituvchis';
    public function holat(){
        return $this->belongsTo(Uqituvchi_holat::class);
    }

    public function til()
    {
        return $this->belongsTo(Til::class);
    }
    public function harbiy_unvon(){
        return $this->belongsTo(Harbiy_unvon::class);
    }
    public function fakultet_kafedra(){
        return $this->belongsTo(Fakultet_kafedra::class);
    }
    public function ilmiy_unvon(){
        return $this->belongsTo(Ilmiy_unvon::class);
    }
    public function ilmiy_daraja(){
        return $this->belongsTo(Ilmiy_daraja::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    //xatolik bulishi mumkin test qilinmadi
    public function fanlar(){
        return $this->belongsTo(Fanlar::class, 'fanlar_id', 'id', Fan_uqituvchi::class);
    }

    //yuqoridagi kodda hatolik mavjud bolsa kommentga olingan kod orqali boglash tavsiya etiladi
//    public function fan_uqituvchi(){
//        return $this->hasMany(Fan_uqituvchi::class);
//    }

    public function nashrlar(){
        return $this->hasMany(Nashr::class);
    }

    public function shaxsiy_mal(){
        return $this->hasOne(Uqituvchi_shax_mal::class);
    }

    public function malaka_oshirish(){
        return $this->hasMany(Malaka_oshirish::class);
    }

    public function kurslar(){
        return $this->hasMany(Kurs::class);
    }


}
