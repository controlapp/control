<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class DetalleFactura extends Model
{
	protected $fillable = ['factura_numero','producto_codigo','cantidad','precio_unitario','iva','total'];
    protected $table = "detalle_facturas";
}
