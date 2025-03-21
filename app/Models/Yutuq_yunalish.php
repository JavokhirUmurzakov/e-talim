<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tinglovchi_yutuqlar;

class Yutuq_yunalish extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomi',
        'ball',
    ];

    public function tinglovchi_yutuqlar(){
        return $this->hasMany(Tinglovchi_yutuqlar::class);
    }
}
