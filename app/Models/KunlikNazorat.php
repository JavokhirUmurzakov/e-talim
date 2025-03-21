<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KunlikNazorat extends Model
{
    use HasFactory;

    protected $fillable = [
        'haqida',
        'fakultet_kafedra_id',
        'uquv_yili_ohtm_id',
        'guruh_id',
        'uqituvchi_id',
        'xona_id',
        'vaqti'
    ];

    public function fakkaf(){
        return $this->belongsTo(Fakultet_kafedra::class);
    }
    public function yutuq_yunalish(){
        return $this->belongsTo(Xonalar::class);
    }

    public function uquv_yili_ohtm(){
        return $this->belongsTo(Uquv_yili_ohtm::class);
    }

    public function uqituvchi(){
        return $this->belongsTo(Uqituvchi::class);
    }
}
