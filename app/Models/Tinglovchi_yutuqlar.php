<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tinglovchi_yutuqlar extends Model
{
    use HasFactory;

    protected $fillable = [
        'haqida',
        'yutuq_yunalish_id',
        'uquv_yili_ohtm_id',
        'tinglovchi_id',
    ];

    public function yutuq_yunalish(){
        return $this->belongsTo(Yutuq_yunalish::class);
    }

    public function uquv_yili_ohtm(){
        return $this->belongsTo(Uquv_yili_ohtm::class);
    }

    public function tinglovchi(){
        return $this->belongsTo(Tinglovchi::class);
    }
}
