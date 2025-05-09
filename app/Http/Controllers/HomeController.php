<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\banner;
use App\Models\Contenido;
use App\Models\ProductoCat;
use App\Models\Producto;
use Auth;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $query =  banner::select('id','banner','url','target','descripcion','publicar','orden');
        $query->where('publicar','=','si');
        $banner = $query->get();
        //servicios
        $fts = [];
        $fts[] = ['id_tipo', '=', '4'];
        $fts[] = ['hijo', 'like', 'no'];
        $qrys = Contenido::select('id','titulo','contenido','img','frompage');
        $qrys->where($fts);
        $servicios = $qrys->get();

        //contenido texto txt_principal_1
        $qry = Contenido::select('id','titulo','contenido','img','frompage');
        $qry->where('titulo', 'like', 'txt_principal_1');
        $txt_principal_1 = $qry->get();

        //categorias de productos
        $catProducto = ProductoCat::all(); 

        //return view('corporativo', compact('contenido'));
        return view('home', compact('banner','txt_principal_1','catProducto'));
    }

    public function Corporativo()
    {
        return view('corporativo');
    }
    public function servicio($id, $texto){
        $serv =  Contenido::find($id);
        $qry = Contenido::select('id','titulo','contenido','hijo','id_padre','img','frompage','publicar','id_tipo');
        $qry->where('id_padre','=', $id);
        $hijos = $qry->get();
        return view('servicios', compact('serv','hijos'));
    }

    public function MenuServicios(){
        $fts = [];
        $fts[] = ['id_tipo', '=','4'];
        $fts[] = ['hijo', 'like','no'];
        $qry = Contenido::select('id','titulo','contenido','hijo','id_padre','img','frompage','publicar','id_tipo','slug');
        $qry->where($fts);
        $datos = $qry->get();
        return $datos;
    }

    public function ServicioComercializacion()
    {
        return view('ServicioComercializacion');
    }

    public function contactos(){
        return view('contacto');
    }
}
