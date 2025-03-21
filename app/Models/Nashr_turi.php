<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Nashr;

class Nashr_turi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomi',
        'ball',
    ];

    public function nashrlar(){
        return $this->hasMany(Nashr::class);
    }
}
