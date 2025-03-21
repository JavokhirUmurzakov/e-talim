<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ohtm;
use App\Models\Tinglovchi;

class Horijdagi_tinglovchilar extends Model
{
    use HasFactory;

    protected $fillable = [
        'tinglovchi_id',
        'ohtm_id',
        'muassasa',
        'ketish_vaqti',
        'kelish_vaqti',
        'mutaxassislik',
        'diplom_pdf',
    ];

    public function ohtm(){
        return $this->belongsTo(Guruh::class);
    }

    public function tinglovchi(){
        return $this->belongsTo(Tinglovchi::class);
    }
}
