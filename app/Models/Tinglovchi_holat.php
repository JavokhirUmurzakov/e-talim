<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tinglovchi;

class Tinglovchi_holat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomi',
    ];

    public function tinglovchilar(){
        return $this->hasMany(Tinglovchi::class);
    }
}
