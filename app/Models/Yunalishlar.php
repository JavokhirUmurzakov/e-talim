<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ohtm;
use App\Models\Guruh;

class Yunalishlar extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomi',
        'qs_nomi',
        'shifr',
        'haqida',
        'fanlar',
        'logo',
        'faol',
        'ohtm_id',
    ];

    public function ohtm(){
        return $this->belongsTo(Ohtm::class);
    }

    public function guruhlar(){
        return $this->hasMany(Guruh::class);
    }
}
