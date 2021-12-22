<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function history(){
        return $this->hasOne(History::class);
    }
}
