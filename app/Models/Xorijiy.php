<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kurs;

class Xorijiy extends Model
{
    use HasFactory;

    protected $fillable = [
        'davlat_nomi',
        'bayroq_icon',
    ];

    public function kurslar(){
        return $this->hasMany(Kurs::class);
    }
}
