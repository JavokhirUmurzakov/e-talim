<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tinglovchi;
use App\Models\Dars_jadvali;

class Baho_davomat extends Model
{
    use HasFactory;

    protected $fillable = [
        'baho',
        'haqida',
        'tinglovchi_id',
        'dars_jadvali_id',
        'baho_davomat_holat_id',
    ];

    public function tinglovchi(){
        return $this->belongsTo(Tinglovchi::class);
    }
    public function dars_jadvali(){
        return $this->belongsTo(Dars_jadvali::class);
    }
    public function baho_davomat_holat(){
        return $this->belongsTo(Baho_davomat_holat::class);
    }
}
