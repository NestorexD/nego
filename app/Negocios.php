<?php

namespace arequipacity;

use Illuminate\Database\Eloquent\Model;

class Negocios extends Model
{
    protected $table="negocios";
    protected $primaryKey='id_negocios';
    
    public $timestamps=false;

    protected $fillable =[
    	'nombre_negocio',
    	'nombre_dueno',
    	'telefonos',
        'rubro',
    	'descripcion',
    	'direccion',
    	'distrito',
    	'gps',
    	'referencia',
        'puntuacion',
    	'condicion',
        'imagen_00',
        'imagen_01',
        'imagen_02',
        'imagen_03',
        'imagen_04',
        'imagen_05',
        'imagen_06',
        'imagen_07',
        'imagen_08',
    ];

    protected $guarded=[

    ]; 



    public function scopeSearchRubro($query, $name)  
    {
        return $query->where('rubro','=','$name');
    }
}
