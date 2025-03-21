<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Baho_davomat;

class Baho_davomat_holat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomi',
    ];

    public function baho_davomat(){
        return $this->hasMany(Baho_davomat::class);
    }
}
