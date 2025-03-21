<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tinglovchi;

class Tinglovchi_shax_mal extends Model
{
    use HasFactory;

    protected $fillable = [
        'fuqarolik',
        'pass_raqami',
        'jshshir_kod',
        'tugilgan_sana',
        'jinsi',
        'haqida',
        'uy_manzili',
        'tinglovchi_id',
    ];

    public function tinglovchi(){
        return $this->belongsTo(Tinglovchi::class);
    }
}
