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
            ->orwhere('descripcion','LIKE','%'.$query.'%')   
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
        return view('cloudservice.arequipacosas.'.$nombre);
    }


    public function buscar(Request $request){
        // obtenemos los 2 datos para buscar una consulta y una lista de zonas
        $query = $request->busqueda;
        $zonas = $request->zona;
        $rubro = $request->rubro;

        //hacemos una consulta con el texto de busqueda y obtenemos una tabla
        $table1=DB::table('negocios')
            ->where('nombre_negocio','LIKE', '%'.$query.'%')
            ->where('condicion','=','1');  


        if($query == ""){
            //si el campo de busqueda es vacio y hay zonas marcadas entonces hacemos una consulta con esas zonas
            if(sizeof($zonas)>0){
                $negocios = DB::table('negocios')->wherein('distrito',$zonas);
            }
            //si no hay busqueda ni campos marcados se devuelve la tabla completa
            else{
                $negocios = $table1;
            }
        }
       else{
            //si el campo de busqueda no es vacio y hay zonas marcadas entonces debemos filtrar por zonas la table1
            if(sizeof($zonas)>0){
                $negocios = $table1->wherein('distrito',$zonas);
            }
            //si no hay zonas y si hay busqueda solo se obtiene la misma tabla
            else{
                $negocios = $table1;
            }
       }

       //si hay un rubro marcado hacemos un filtro a la tabla
       if($rubro !=""){
        $negocios = $negocios->where('rubro','LIKE','%'.$rubro.'%');
       }
       
        $negocios = $negocios->orderBy('id_negocios','desc') -> get();

        return response()->json(array('negocios'=> $negocios), 200);
    }
}   

