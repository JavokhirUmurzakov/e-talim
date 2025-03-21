<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tinglovchi_holat;
use App\Models\Guruh;
use App\Models\Tinglovchi_diplom;
use App\Models\Harbiy_unvon;
use App\Models\User;
use App\Models\Horijdagi_tinglovchilar;
use App\Models\Tinglovchi_shax_mal;
use App\Models\Tinglovchi_yutuqlar;
use App\Models\Baho_davomat;

class Tinglovchi extends Model
{
    use HasFactory;
    protected $table = 'tinglovchis';
//    protected $fillable = [
//        'fio',
//        'lavozim',
//        'rasm',
//        'haqida',
//        'guruh_id',
//        'tinglovchi_holat_id',
//        'tinglovchi_diplom_id',
//        'harbiy_unvon_id',
//        'fakultet_kafedra_id',
//        'ohtm_id',
//        'user_id',
//    ];
    protected $guarded = [];

    public function holat(){
        return $this->belongsTo(Tinglovchi_holat::class);
    }

    public function guruh(){
        return $this->belongsTo(Guruh::class);
    }

    public function diplom(){
        return $this->hasOne(Tinglovchi_diplom::class);
    }

    public function harbiy_unvon(){
        return $this->hasOne(Harbiy_unvon::class, 'id', 'harbiy_unvon_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function horijdagi_tinglovchi(){
        return $this->hasOne(Horijdagi_tinglovchilar::class);
    }

    public function shaxsiy_malumot(){
        return $this->hasOne(Tinglovchi_shax_mal::class);
    }

    public function tinglovchi_yutuqlar(){
        return $this->hasMany(Tinglovchi_yutuqlar::class);
    }

    public function baho_davomat(){
        return $this->hasMany(Baho_davomat::class);
    }
    public function getVidemostBaho(){
        return $this->hasOne(VidemostBaho::class, 'tinglovchi_id', 'id');
    }
    public function baholar()
    {
        $modelName = 'App\Models\Baho' . auth()->user()->ohtm_id;

        if (!class_exists($modelName)) {
            throw new \Exception("Model $modelName topilmadi!");
        }

        return $this->hasMany($modelName, 'tinglovchi_id', 'id');
    }



}
