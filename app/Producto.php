<?php

namespace App;

use App\Ume;
use App\Proveedor;
use App\Categoria;
use App\Presentacion;
use App\ReglaImpuesto;
use App\MaestraDetalle;;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	protected $guarded = [];

    public function categoria()
    {
    	return $this->hasOne(Categoria::class,'id','id_categoria');
    }

    public function proveedor()
    {
    	return $this->hasOne(Proveedor::class, 'id','id_proveedor');
    }

    public function imagenes()
    {
        return $this->hasMany(Images::class);
    }

    public function ume()
    {
        return $this->hasOne(Ume::class,'id','id_ume');
    }

    public function presentacion()
    {
        return $this->hasOne(Presentacion::class,'id','id_presentacion');
    }

    public function estado()
    {
        return $this->hasOne(Estado::class, 'id', 'id_estado');
    }

    public function impuesto()
    {
        return $this->hasOne(ReglaImpuesto::class, 'id', 'id_regla_impuesto');
    }


}
