<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Til;
use App\Models\Permission;
use App\Models\Uqituvchi;
use App\Models\Tinglovchi;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $with = ['permission', 'uqituvchi', 'ohtm', 'tinglovchi'];

    protected $fillable = [
        'nomi',
        'login',
        'password',
        'faol',
        'til_id',
        'ohtm_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
//        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
//        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function til(){
        return $this->belongsTo(Til::class);
    }

    public function permission(){
        return $this->hasOne(Permission::class);
    }

    public function uqituvchi(){
        return $this->hasOne(Uqituvchi::class);
    }

    public function tinglovchi(){
        return $this->hasOne(Tinglovchi::class);
    }
    public function ohtm(){
        return $this->belongsTo(Ohtm::class);
    }

}
