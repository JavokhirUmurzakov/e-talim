<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mavzu extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function fanlar()
    {
        return $this->belongsTo(Fanlar::class);
    }
}
