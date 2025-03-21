<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dars_jadvali;

class Dars_vaqti extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomi',
        'vaqti',
    ];
    public function dars_jadvali(){
        return $this->hasMany(Dars_jadvali::class);
    }
}
