<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Uqituvchi;

class Ilmiy_unvon extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomi',
        'qs_nomi',
    ];

    public function uqituvchilar(){
        return $this->hasMany(Uqituvchi::class);
    }
}
