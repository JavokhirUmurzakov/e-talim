<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ohtm;

class Akkreditatsiya extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomi',
        'haqida',
        'sana',
        'pdf',
        'ohtm_id',
    ];
    public function ohtm(){
        return $this->belongsTo(Ohtm::class);
    }
}
