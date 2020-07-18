<?php

namespace App;

use App\Presentacion;
use App\Producto;
use App\Proveedor;
use Illuminate\Database\Eloquent\Model;

class MovimientosProducto extends Model
{
	protected $table = "movimientos_producto";
    protected $fillable = ['codigo_material','cantidad','movimiento','fecha_movimiento','fecha_vto','presentacion','proveedor','orden','user'];

    public function producto()
    {
    	return $this->hasOne(Producto::class,'codigo','codigo_material');
    }

    public function presentacion()
    {
    	return $this->hasOne(Presentacion::class,'id','id_presentacion');
    }

    public function proveedor()
    {
    	return $this->hasOne(Proveedor::class,'id','id_proveedor');
    }
}
