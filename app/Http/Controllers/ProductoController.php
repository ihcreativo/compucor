<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\productoCat;
use App\Models\producto;
use App\Models\productoImage;
use App\Models\producto_marca;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;

class ProductoController extends Controller
{
    public function getProductos(Request $request){
        $id = $request->id;
        // DB::raw('count(productos_imagen.id_producto) as n_img')
        $qry =  producto::select(DB::raw('count(productos_imagen.id_producto) as n_img'),'productos.id','productos.producto','productos.especificaciones','productos.caracteristicas','productos.terminos','productos.img','productos.precio','productos.oferta','productos.slug','productos.frompage','productos.publicar','productos.id_categoria');
        $qry->leftjoin("productos_imagen", "productos.id", "=", "productos_imagen.id_producto");
        $qry->where("productos.id_categoria","=",$id);
        $qry->groupBy('productos.id','productos.producto','productos.especificaciones','productos.caracteristicas','productos.terminos','productos.img','productos.precio','productos.oferta','productos.slug','productos.frompage','productos.publicar','productos.id_categoria');
        $datos = $qry->get();


        // $datos = DB::table("productos")
            // ->leftJoin("productos_imagen", function($join){
            //     $join->on("productos.id", "=", "productos_imagen.id_producto");
            // })
            // ->select("*")
            // ->groupBy("productos_imagen.id_producto")
            // ->get();

        //  $datos =Importacion::select('importacion.*','importacion_datos.importacion_id','auth_cliente.cliente',Importacion::raw("count('importacion_datos.importacion_id') as cantidad"))
        //     ->join('importacion_datos','importacion.id','=','importacion_datos.importacion_id')
        //     ->join('auth_cliente','importacion.cliente_id', '=', 'auth_cliente.id')
        //     ->groupBy('importacion_datos.importacion_id')
        //     ->get();

        // $qry =  producto::select('id','producto','especificaciones','caracteristicas','terminos','img','precio','oferta','slug','frompage','publicar','id_categoria');
        // $qry->where('id_categoria','=',$id);
        // $datos = $qry->get();
        return $datos;
    }

    public function produtos_from_page(){
        $qry =  producto::select('id','producto','especificaciones','caracteristicas','terminos','img','precio','oferta','slug','frompage','publicar','id_categoria');
        $qry->where('frompage','=','1');
        $datos = $qry->get();
        return $datos; 
        
    }
    public function producto_view($id, $texto){
         return view('producto_view', compact('id'));
    }

     public function producto_view_vue(Request $request){
        $id = $request->id;
        $qry =  producto::select('productos.id','productos.producto','productos.marca','productos.especificaciones','productos.caracteristicas','productos.terminos','productos.img','productos.precio','productos.oferta','productos.slug','productos.frompage','productos.publicar','productos.id_categoria','productos_cat.categoria', 'productos_cat.slug');
        $qry->join('productos_cat','productos.id_categoria','=','productos_cat.id');
        $qry->where('productos.id','=',$id);
        $datos = $qry->get();
        return $datos;
    }

    public function add_producto(Request $request){
        $this->validate(request(),[
            'producto' => 'required',
            'especificaciones' => 'required',
        ]);
        $opc =  new producto();
        $opc->producto =  $request->producto;
        $opc->slug = $request->slug;
        $opc->especificaciones =  $request->especificaciones;
        $opc->caracteristicas =  $request->caracteristicas;
        $opc->terminos =  $request->terminos;
        $opc->marca =  $request->marca;
        $opc->precio =  $request->precio;
        $opc->oferta =  $request->oferta;
        $opc->publicar =  '0';
        $opc->frompage =  '0';
        $opc->id_categoria =  $request->id_categoria;
        $opc->img =  'none.png';

        $opc->save();
        return response()->json(['name' => 'add', 'state' => 'ok']);   
    }

    public function del_producto(Request $request){
        $p=producto::find($request->id);
        $p->delete(); //returns true/false
        // buscar la imagenes y eliminarlas
        
    }

    public function publicar_producto(Request $request){
        $qry = producto::find($request->id);
        if($request->campo == 'publicar'){
            $qry->publicar = $request->publicar; 
        }else{
            $qry->frompage = $request->publicar;
        }
        $qry->save();
        return response()->json(['name' => 'add', 'state' => 'ok']);
    }

    public function get_imagenes_producto(Request $request){
        $id = $request->id;
        $qry =  productoImage::select('id','img','id_producto');
        $qry->where('id_producto','=',$id);
        $datos = $qry->get();
        return $datos;
    }

    public function get_marca(){
        return producto_marca::all();
    }

    function quitar_imagenes_producto(Request $request){
        $id = $request->id;
        $img = $request->img;
        $qry =  productoImage::find($id);
        $qry->delete();
        $ruta = public_path("tienda/productos/thum/".$img);
        $ruta2 = public_path("tienda/productos/".$img);
        if(@getimagesize($ruta)) {
           // File::delete($ruta);
            unlink($ruta);
            unlink($ruta2);
            return response()->json(['name' => 'add', 'state' => 'ok']);
        } else {
            return response()->json(['name' => 'add', 'state' => 'no']);
        }
    }

    public function principal_imagen_asignar(Request $request){
        $img = $request->img;
        $qry = producto::find($request->id_producto);
        $qry->img = $img;
        $qry->save();
        return response()->json(['name' => 'add', 'state' => 'ok']);
    }

    public function subir_imagen_producto(Request $request){
        if($request->hasFile("img")){
            $imagen = $request->file("img"); 
            $id = $request->id;
            $prefijo = 'IHV_';
            $nombreimagen =  uniqid($prefijo).'.'.$imagen->getClientOriginalExtension();              
            //$nombreimagen = $imagen->getClientOriginalName();            
            $opc = new productoImage();
            $opc->img =  $nombreimagen;
            $opc->id_producto = $id;            
            $rutaT = public_path("tienda/productos/thum/");
            $ruta = public_path("tienda/productos/");            
            copy($imagen->getRealPath(),$ruta.$nombreimagen);

            // $thumbnail = Image::make($imagen)
            // // ->fit(250, 250) // Tamaño del thumbnail
            // ->resize(300, 300, function ($constraint) {
            //     $constraint->aspectRatio();
            //     $constraint->upsize();
            // })
            // ->save($rutaT . $thumbnail);
            // ->save(storage_path('app/public/' . $thumbnailPath));
    
            copy($imagen->getRealPath(),$rutaT.$nombreimagen);

            $opc->save(); 
            return response()->json(['name' => 'add', 'state' => 'ok']);
        }else{
            return response()->json(['name' => 'add', 'state' => 'no']);
        }
    }
    
    public function eliminar_imagen_producto(Request $request){
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
}
