<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fakultet_kafedra;
use App\Models\Dars_jadvali;

class Xonalar extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomi',
        'haqida',
        'parent_id',
        'fakultet_kafedra_id',
    ];

    public function parent()
    {
        return $this->belongsTo(Xonalar::class);
    }

    public function children()
    {
        return $this->hasMany('App\Models\Xonalar', 'parent_id');
//            ->select(
//                "id",
//                "soni",
//                "qabul_yili",
//                "boshqarma_id",
//                "izoh",
//                "created_at"
//            )->orderby('id', 'desc');
//            )->orderby('created_at', 'desc');
    }



    public function fakultet_kafedra(){
        return $this->belongsTo(Fakultet_kafedra::class);
    }

    public function dars_jadvali(){
        return $this->hasMany(Dars_jadvali::class);
    }
}



