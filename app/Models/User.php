<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function gastos(){
        return $this->hasMany(Gasto::class);
    }
    public function entradas() {
        return $this->hasMany(Entrada::class);
    }
}
