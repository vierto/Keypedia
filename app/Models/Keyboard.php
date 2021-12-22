<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyboard extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function cart(){
        return $this->belongsTo(Cart::class);
    }
}
