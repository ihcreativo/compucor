<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productoCat;
use App\Models\Producto;
use Auth;
use DB;

class ProductoCatController extends Controller
{
    public function index(){
        return view('dashboard.catalogo');
   }

   public function getCat(){
       $qry = productoCat::select('id','categoria','descripcion', 'slug', 'banner',DB::raw("(select count(id_categoria) from productos  WHERE productos.id_categoria = productos_cat.id) as n_producto" ));
       $datos = $qry->get();
       return $datos;
   }

   public function add_categoria(Request $request){
        $this->validate(request(),[
            'categoria' => 'required',
            'slug' => 'required',
        ]);
        $opc =  new productoCat();
        $opc->categoria =  $request->categoria;
        $opc->slug = $request->slug;
        $opc->descripcion =  $request->descripcion;
        $opc->banner =  'none.png';
        $opc->save();
        return response()->json(['name' => 'add', 'state' => 'ok']);   
    }

    public function subir_imagen(Request $request){
        if($request->hasFile("img")){
            $imagen = $request->file("img");                
            $nombreimagen = $imagen->getClientOriginalName();
            $opc = productoCat::find($request->id);
            $opc->banner =  $nombreimagen;
            
            $ruta = public_path("catalogo_all/");            
            copy($imagen->getRealPath(),$ruta.$nombreimagen);
            $opc->save(); 
            return response()->json(['name' => 'add', 'state' => 'ok']);
        }else{
            return response()->json(['name' => 'add', 'state' => 'no']);
        }
    }

    public function categoria($id,$slug){

    } 
    
    public function eliminar_imagen(Request $request){
        $image = public_path().'/thum/'.$request->img;
        if (@getimagesize($image)) {
            unlink($image);
            $opc = Contenido::find($request->id);
            $opc->img =  'none';
            $opc->save();
            return response()->json(['name' => 'add', 'state' => 'si']);
        }else{
            $opc = Contenido::find($request->id);
            $opc->img =  'none';
            $opc->save();
            return response()->json(['name' => 'add', 'state' => 'no']);
        }

    }


    

    public function contenido_update(Request $request){
        $this->validate(request(),[
            'titulo' => 'required',
            'contenido' => 'required',
        ]);
        $opc = Contenido::find($request->id);
        $opc->titulo = $request->titulo;
        $opc->slug = $this->tracker_slug($request->titulo,'-','es');
        $opc->contenido =  $request->contenido; 
        $opc->save();
        return response()->json(['name' => 'add', 'state' => 'ok']);
    }
}
