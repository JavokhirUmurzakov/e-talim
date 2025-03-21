<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yakuniy extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function baholar()
    {
        return $this->hasMany(YakuniyBaho::class, 'yakuniy_id', 'id');
    }

}
