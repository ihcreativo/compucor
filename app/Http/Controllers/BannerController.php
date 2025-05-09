<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\banner;
use Auth;
use DB;

class BannerController extends Controller
{
    public function index(){
        return view('dashboard.banners');
    }
    public function getBanners(Request $request){
        return banner::select('id','banner','url','target','descripcion','publicar','orden')->get();
    }

    
    public function setFrompage(Request $request){
        $qry = banner::find($request->id);
        $qry->frompage = $request->frompage;
        $qry->save();
        return response()->json(['name' => 'add', 'state' => 'ok']);
    }
    public function setPublicar(Request $request){
        $qry = banner::find($request->id);
        $qry->publicar = $request->publicar;
        $qry->save();
        return response()->json(['name' => 'add', 'state' => 'ok']);
    }

    public function delete_banner(Request $request){
        $bn = banner::find($request->id);
        $image = public_path().'/'.$bn->url;
        if (@getimagesize($image)) {
            unlink($image);
            $bn->delete();
            return response()->json(['name' => 'add', 'state' => 'si']);
        }else{
            $bn->delete();
            return response()->json(['name' => 'add', 'state' => 'si']);
        }

    }

    public function subir_banner(Request $request){
        if($request->hasFile("img")){
            $imagen = $request->file("img");                
            $nombreimagen = $imagen->getClientOriginalName();
            $opc = new banner();
            $opc->url =  'banner/'.$nombreimagen;
            $ruta = public_path("banner/");            
            copy($imagen->getRealPath(),$ruta.$nombreimagen);

            $opc->target = '_parent';
            $opc->banner =  $request->banner;
            $opc->descripcion = $request->descripcion;
            $opc->publicar = 'no';
            $opc->orden = '1';
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
        $opc->contenido =  $request->contenido;
        $opc->img =  'none';
        $opc->frompage =  '0';
        $opc->publicar =  '0';
        $opc->id_tipo = $request->id_tipo; 
        $opc->save();
        return response()->json(['name' => 'add', 'state' => 'ok']);   
    }

}
