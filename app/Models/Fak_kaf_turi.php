<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fakultet_kafedra;

class Fak_kaf_turi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomi',
        'boshqarma',
    ];

    public function fakultet_kafedralar(){
        return $this->hasMany(Fakultet_kafedra::class);
    }
}
