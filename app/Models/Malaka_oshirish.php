<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Uqituvchi;

class Malaka_oshirish extends Model
{
    use HasFactory;

    protected $fillable = [
        'maqsad_mavzusi',
        'uqish_joyi',
        'boshlanish_vaqti',
        'tugash_vaqti',
        'dip_sert_pdf',
        'uqituvchi_id',
    ];

    public function uqituvchi(){
        return $this->belongsTo(Uqituvchi::class);
    }
}
