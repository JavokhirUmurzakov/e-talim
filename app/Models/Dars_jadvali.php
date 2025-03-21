<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guruh;
use App\Models\Dars_vaqti;
use App\Models\Dars_turi;
use App\Models\Fan_uqituvchi;
use App\Models\Xonalar;
use App\Models\Uquv_yili_ohtm;
use App\Models\Baho_davomat;

class Dars_jadvali extends Model
{
    use HasFactory;

    protected $fillable = [
        'sana',
        'fan',
        'mavzu',
        'guruh_id',
        'dars_vaqti_id',
        'dars_turi_id',
        'fan_uqituvchi_id',
        'xona_id',
        'uquv_yili_ohtm_id',
    ];

    public function guruh(){
        return $this->belongsTo(Guruh::class);
    }
    public function dars_vaqti(){
        return $this->belongsTo(Dars_vaqti::class);
    }
    public function dars_turi(){
        return $this->belongsTo(Dars_turi::class);
    }
    public function fan_uqituvchi(){
        return $this->belongsTo(Fan_uqituvchi::class);
    }
    public function xona(){
        return $this->belongsTo(Xonalar::class);
    }
    public function uquv_yili_ohtm(){
        return $this->belongsTo(Uquv_yili_ohtm::class);
    }
    public function baho_davomat(){
        return $this->hasMany(Baho_davomat::class);
    }
}
