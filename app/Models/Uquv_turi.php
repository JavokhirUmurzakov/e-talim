<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kurs;

class Uquv_turi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomi',
    ];

    public function kurslar(){
        return $this->hasMany(Kurs::class);
    }
}
