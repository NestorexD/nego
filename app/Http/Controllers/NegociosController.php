<?php

namespace arequipacity\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use arequipacity\Http\Requests\NegociosFormRequest;
use arequipacity\Negocios;
use DB;

class NegociosController extends Controller
{       

    public function __construct()
    {

    }
 
    public function index(Request $request)     //nuestro metodo index
    {
    	if ($request) 		//si existe objeto, obtener todos los registros de la tabla de negocios de DB
    	{
    		$query=trim($request->get('searchText')); 
            $negocios=DB::table('negocios')
            ->where('nombre_negocio','LIKE', '%'.$query.'%')
            ->where('condicion','=','1')
            ->orwhere('rubro','LIKE','%'.$query.'%') 
            ->orwhere('distrito','LIKE','%'.$query.'%')     
    		->orderBy('id_negocios','desc')	 
    		->paginate(8);
    		return view('cloudservice.negocios.index',["negocios"=>$negocios,"searchText"=>$query]);	        
    	}
    }   
   

     public function edit()
    {
        
    }
    public function store(NegociosFormRequest $request)
    { 		
 
    }
    public function show($dato)
    {
        $negocios=DB::table('negocios')  
        ->select('nombre_negocio','nombre_dueno','telefonos','rubro','descripcion','direccion','distrito','gps','referencia','puntuacion','imagen_00','imagen_01','imagen_02','imagen_03','imagen_04','imagen_05','imagen_06','imagen_07',
        'imagen_08')
        ->where('nombre_negocio','LIKE','%'.$dato.'%')
        ->first();
        return view('cloudservice.negocios.single',["negocios"=>$negocios]);
    }
    public function update(NegociosFormRequest $request, $id)
    {
    		
    } 

    public function nombre($nombre)
    {
        return view('cloudservice.information.'.$nombre);
    }

}   

