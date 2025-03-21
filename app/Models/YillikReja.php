<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YillikReja extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function uqituvchi()
    {
        return $this->belongsTo(Uqituvchi::class);
    }

    public function nashr_tur()
    {
        return $this->belongsTo(Nashr_turi::class);
    }


    public function uquv_yili()
    {
        return $this->belongsTo(Uquv_yili::class);
    }


}
