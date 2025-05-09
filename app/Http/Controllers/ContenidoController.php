<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenido_tipo;
use App\Models\Contenido;
use Auth;
use DB;

class ContenidoController extends Controller
{
    public function index(){
        return view('dashboard.contenido');
    }

    public function contenido_tipo(){
        return Contenido_tipo::select('id','tipo')->get();
    }
    public function contenido(Request $request){
        $fts = [];
        if(!empty($request->id_tipo)) $fts[] = ['id_tipo', '=', $request->id_tipo];
        $qry =  Contenido::select('id','titulo','contenido','hijo','id_padre','img','frompage','publicar','id_tipo');
        if(!empty($fts)){
            $qry->where($fts);
        }
        $datos = $qry->get();
        return $datos;
    }

    public function corporativo_pag(){
        $qry =  Contenido::select('id','titulo','contenido','img','frompage','publicar','id_tipo');
        $qry->where('id_tipo','=','1');
        $contenido = $qry->get();

        return view('corporativo', compact('contenido'));
    }

    public function deleteContenido(Request $request){
        $qry = Contenido::find($request->id);
        $qry->delete();
        return response()->json(['name' => 'add', 'state' => 'ok']);
    }
    public function setFrompage(Request $request){
        $qry = Contenido::find($request->id);
        $qry->frompage = $request->frompage;
        $qry->save();
        return response()->json(['name' => 'add', 'state' => 'ok']);
    }
    public function setPublicar(Request $request){
        $qry = Contenido::find($request->id);
        $qry->publicar = $request->publicar;
        $qry->save();
        return response()->json(['name' => 'add', 'state' => 'ok']);
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

    public function subir_imagen(Request $request){
        if($request->hasFile("img")){
            $imagen = $request->file("img");                
            $nombreimagen = $imagen->getClientOriginalName();
            $opc = Contenido::find($request->id);
            $opc->img =  $nombreimagen;
            
            $ruta = public_path("thum/");            
            copy($imagen->getRealPath(),$ruta.$nombreimagen);
            $opc->save(); 
            return response()->json(['name' => 'add', 'state' => 'ok']);
        }else{
            return response()->json(['name' => 'add', 'state' => 'no']);
        }
    }

    public function contenido_add(Request $request){
        $this->validate(request(),[
            'titulo' => 'required',
            'contenido' => 'required',
        ]);
        $opc =  new Contenido();
        $opc->titulo =  $request->titulo;
        $opc->slug = $this->tracker_slug($request->titulo,'-','es');
        $opc->contenido =  $request->contenido;
        $opc->img =  'none';
        $opc->frompage =  '0';
        $opc->publicar =  '0';
        $opc->id_tipo = $request->id_tipo; 
        if(!empty($request->hijo)){
            $opc->hijo = $request->hijo;
            $opc->id_padre = $request->id_padre; 
        }
        $opc->save();
        return response()->json(['name' => 'add', 'state' => 'ok']);   
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

    function tracker_slug($title, $separator = '-', $language = 'en')
    {
        // Convert all dashes/underscores into separator
        $flip = $separator == '-' ? '_' : '-';
        $title = preg_replace('!['.preg_quote($flip).']+!u', $separator, $title);
        // Replace @ with the word 'at'
        $title = str_replace('@', $separator.'at'.$separator, $title);
        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        $title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', $title);
        // Replace all separator characters and whitespace by a single separator
        $title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);
        return strtolower(trim($title, $separator));
    }
}