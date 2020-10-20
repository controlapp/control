<?php

namespace App;

use App\Producto;
use Illuminate\Database\Eloquent\Model;

class Diferencia extends Model
{
    public function producto()
    {
    	return $this->hasOne(Producto::class,'codigo','codigo_producto');
    }
}
