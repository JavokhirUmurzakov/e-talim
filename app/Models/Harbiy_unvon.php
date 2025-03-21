<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Uqituvchi;
use App\Models\Tinglovchi;

class Harbiy_unvon extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomi',
        'qs_nomi',
    ];

    public function uqituvchilar(){
        return $this->hasMany(Uqituvchi::class);
    }

    public function tinglovchilar(){
        return $this->hasMany(Tinglovchi::class);
    }
}
