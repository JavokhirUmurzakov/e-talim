<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Uqituvchi;

class Uqituvchi_shax_mal extends Model
{
    use HasFactory;

    protected $fillable = [
        'fuqarolik',
        'pass_raqami',
        'jshshir_kod',
        'tugilgan_sana',
        'jinsi',
        'uy_manzili',
        'haqida',
        'uqituvchi_id',
    ];

    public function uqituvchi(){
        return $this->belongsTo(Uqituvchi::class);
    }
}
