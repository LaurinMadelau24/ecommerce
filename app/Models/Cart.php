<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasone('App\Models\User','id','user_id');
    }

    public function product(){
        return $this->hasone('App\Models\Product','id','product_id');
    }
}
