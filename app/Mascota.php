<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    //
    protected $table='mascotas';
    protected $primaryKey='id_mascota';

    public $timestamps=false;

    public $with=['propietario','raza','especie'];

    public $fillable=[
    	'id_mascota',
    	'id_especie',
    	'id_raza',
    	'id_propietario',
    	'nombre',
    	'edad',
    	'peso',
    	'genero'
    ];
    public function propietario()
    {
        return $this -> belongsTo(Propietario::class,'id_propietario','id_propietario');
    }
    public function raza()
    {
        return $this -> belongsTo(Raza::class,'id_raza','id_raza');
    }
    public function especie()
    {
        return $this -> belongsTo(Especies::class,'id_especie','id_especie');
    }

}
