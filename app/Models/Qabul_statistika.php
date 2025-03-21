<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ohtm;

class Qabul_statistika extends Model
{
    use HasFactory;

    protected $fillable = [
        'qabul_yili',
        'abituriyentlar_soni',
        'qabul_soni',
        'ohtm_id',
    ];
    public function ohtm(){
        return $this->belongsTo(Ohtm::class);
    }

}
