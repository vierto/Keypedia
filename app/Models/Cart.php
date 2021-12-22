<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function keyboards(){
        return $this->hasMany(Keyboard::class);
    }
    
    public function history(){
        return $this->belongsTo(History::class);
    }
}
