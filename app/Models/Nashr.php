<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Uqituvchi;
use App\Models\Nashr_turi;

class Nashr extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomi',
        'haqida',
        'sana',
        'pdf',
        'uqituvchi_id',
        'nashr_turi_id',
    ];

    public function uqituvchi(){
        return $this->belongsTo(Uqituvchi::class);
    }

    public function nashr_turi(){
        return $this->belongsTo(Nashr_turi::class);
    }
}
