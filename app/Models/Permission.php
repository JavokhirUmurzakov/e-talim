<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use App\Models\User;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'role_id',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
