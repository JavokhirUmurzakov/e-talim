<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dars_kun extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function fanlar()
    {
        return $this->belongsTo(Fanlar::class);
    }

    public function mavzu()
    {
        return $this->belongsTo(Mavzu::class,'mavzu_id','id');
    }

    public function uqituvchi()
    {
        return $this->belongsTo(Uqituvchi::class);
    }
    public function get_baho_only()
    {
        // Dinamik model nomini yaratamiz
        $modelName = 'App\Models\Baho' . auth()->user()->ohtm_id;

        // hasMany orqali bog'lanamiz
        return $this->hasMany($modelName, 'dars_kun_id');
    }




}
