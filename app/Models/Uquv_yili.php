<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Uquv_yili_ohtm;

class Uquv_yili extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomi',
    ];

    public function uquv_yili_ohtm(){
        return $this->hasMany(Nashr::class);
    }

}
