<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    protected $with = ['fanlar'];
    use HasFactory;
    protected $guarded=[];

    public function fanlar(){
        return $this->belongsTo(Fanlar::class);
    }
    public function uquv_yili_ohtm(){
        return $this->belongsTo(Uquv_yili_ohtm::class);
    }
    public function guruh(){
        return $this->belongsTo(Guruh::class);
    }

}
