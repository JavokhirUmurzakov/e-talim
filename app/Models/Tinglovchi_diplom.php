<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tinglovchi;

class Tinglovchi_diplom extends Model
{
    use HasFactory;

    protected $fillable = [
        'klassifikatsiya',
        'seriya',
        'bitiruv_ishi',
        'uqish_vaqti',
        'baholar',
        'haqida',
    ];

    public function tinglovchi(){
        return $this->belongsTo(Tinglovchi::class);
    }
}
