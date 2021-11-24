<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especies extends Model
{
    //
    protected $table='especies';
    protected $primaryKey='id_especie';

    public $timestamps=false;

    public $fillable=[
    	'id_especie',
    	'especie'
    ];
}
