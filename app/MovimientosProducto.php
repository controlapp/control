<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimientosProducto extends Model
{
	protected $table = "movimientos_producto";
    protected $fillable = ['codigo_material','cantidad','movimiento','fecha_movimiento','fecha_vto','presentacion','proveedor','orden','user'];
}
