<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ohtm;

class Xabarlar extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomi',
        'haqida',
        'sana',
        'xabar_muallifi',
        'pdf',
        'ohtm_id',
    ];
    public function ohtm(){
        return $this->belongsTo(Ohtm::class);
    }
}
