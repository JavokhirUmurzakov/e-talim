<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Uquv_yili_ohtm;
use App\Models\Fan_uqituvchi;

class Yuklama extends Model
{
    use HasFactory;
    protected $fillable = [
        'uquv_yili_ohtm_id',
        'fan_uqituvchi_id',
        'umumiy_soat',
        'utilgan_soat',
        'mashgulot_turi_soat',
        'uquv_rejasi',
    ];

    public function uquv_yili_ohtm(){
        return $this->belongsTo(Uquv_yili_ohtm::class);
    }

    public function fan_uqituvchi(){
        return $this->belongsTo(Fan_uqituvchi::class);
    }
}
