<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baho1 extends Model
{
    protected $with = ['dars_kun'];

    use HasFactory;
    protected $guarded = [];
    public function dars_kun(){
        return $this->hasOne(Dars_kun::class, 'id', 'dars_kun_id');
    }



//    public function bahos(){
//        $this->hasOne(Baho::class, 'baho_id', 'id');
//    }
}
