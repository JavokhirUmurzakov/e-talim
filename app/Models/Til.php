<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Guruh;

class Til extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomi',
        'qs_nomi',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function guruhlar(){
        return $this->hasMany(Guruh::class);
    }
}
