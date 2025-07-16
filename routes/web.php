<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContenidoController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProductoCatController;


Route::get('/',  [HomeController::class, 'index'])->name('login.index');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/produtos_from_page', [ProductoController::class,'produtos_from_page']);
Route::get('/tienda/{id}/{texto}', [ProductoController::class, 'producto_view']);
Route::get('/categoria/{slug}', [ProductoCatController::class, 'categoria']);
Route::post('/categoria/productos', [ProductoController::class, 'getProductos']);

Route::post('/productos_view',[ProductoController::class, 'producto_view_vue']);
Route::post('/produto_imagenes', [ProductoController::class, 'get_imagenes_producto']);



Route::get('/sobre-computadores-de-cordoba', [ContenidoController::class, 'corporativo_pag'])->name('corporativo');
Route::get('/contactos', [HomeController::class, 'contactos'])->name('contactos');
Route::get('/servicio', [HomeController::class, 'servicio'])->name('servicios');
Route::get('/servicios/{texto}/{id}', [HomeController::class, 'servicio']);
Route::post('/MenuServicios_vue', [HomeController::class,'MenuServicios']);


Route::get('/comercializacion-de-materiales-reciclables', [HomeController::class, 'ServicioComercializacion'])->name('comercializacion');
Route::get('/bascula-camionera', [HomeController::class, 'servicio-bascula'])->name('bascula');
Route::get('/recoleccion-transporte', [HomeController::class, 'servicio-recolecion'])->name('recoleccion');


Route::get('/acceso', [LoginController ::class,'index'])->name('acceso');
Route::post('/acceso', [LoginController::class,'store']);
Route::get('/salir', [LoginController::class, 'salir'])->name('salir');
Route::get('/dashboard',[LoginController::class,'dashboard'])->middleware('auth')->name('dashboard');
//vue route
// Tienda vue
Route::get('/catalogo', [ProductoCatController::class, 'index'])->middleware('auth')->name('catalogo');
Route::get('/catalogo/{id}/{slug}', [ProductoCatController::class, 'categoria'])->middleware('auth')->name('categoria');
Route::post('/getCat', [ProductoCatController::class,'getCat']);
Route::post('/catalogo_add', [ProductoCatController::class, 'add_categoria'])->middleware('auth');
Route::post('/subir_imagen_CAT_vue', [ProductoCatController::class, 'subir_imagen'])->middleware('auth');
Route::post('/getProductos', [ProductoController::class, 'getProductos'])->middleware('auth');
Route::post('/producto_del', [ProductoController::class, 'del_producto'])->middleware('auth');
Route::post('/producto_add', [ProductoController::class, 'add_producto'])->middleware('auth');
Route::post('/producto_edit', [ProductoController::class, 'edit_producto'])->middleware('auth');
Route::post('/publicar_producto', [ProductoController::class, 'publicar_producto'])->middleware('auth');
Route::post('/subir_imagen_producto', [ProductoController::class, 'subir_imagen_producto'])->middleware('auth');
Route::post('/get_imagenes_producto', [ProductoController::class, 'get_imagenes_producto'])->middleware('auth');
Route::post('/quitar_imagenes_producto', [ProductoController::class, 'quitar_imagenes_producto'])->middleware('auth');
Route::post('/principal_imagen_asignar', [ProductoController::class, 'principal_imagen_asignar'])->middleware('auth');
Route::post('/get_marca', [ProductoController::class, 'get_marca'])->middleware('auth');

// fin tienda

Route::get('/contenidos', [ContenidoController::class, 'index'])->middleware('auth')->name('contenidos');
Route::post('/contenido_tipoVue', [ContenidoController::class,'contenido_tipo']);
Route::post('/contenido_Vue', [ContenidoController::class,'contenido']);
Route::post('/contenido_add_Vue', [ContenidoController::class,'contenido_add']);
Route::post('/contenido_update_Vue', [ContenidoController::class,'contenido_update']);
Route::post('/setFrompage_Vue', [ContenidoController::class,'setFrompage']);
Route::post('/setPublicar_Vue', [ContenidoController::class,'setPublicar']);
Route::post('/deleteContenido_Vue', [ContenidoController::class,'deleteContenido']);
Route::post('/subir_imagen_vue', [ContenidoController::class,'subir_imagen']);
Route::post('/eliminar_imagen_vue', [ContenidoController::class,'eliminar_imagen']);

Route::get('/banners', [BannerController::class, 'index'])->middleware('auth')->name('banners');
Route::post('/getBanners_Vue', [BannerController::class,'getBanners']);
Route::post('/subir_banner_vue', [BannerController::class,'subir_banner']);
Route::post('/deleteBanner_Vue', [BannerController::class,'delete_banner']);
Route::post('/setBannerPublicar_Vue', [BannerController::class,'setPublicar']);

Route::get('/setting', [SettingController::class, 'index'])->middleware('auth')->name('setting');


Route::get('/galerias-admin', [BannerController::class, 'index'])->middleware('auth')->name('galerias-admin');
// Route::post('/getBanners_Vue', [BannerController::class,'getBanners']);
// Route::post('/subir_banner_vue', [BannerController::class,'subir_banner']);
// Route::post('/deleteBanner_Vue', [BannerController::class,'delete_banner']);
// Route::post('/setBannerPublicar_Vue', [BannerController::class,'setPublicar']);

Route::get('/contactos-admin', [BannerController::class, 'index'])->middleware('auth')->name('contactos-admin');

// fin route vue
Auth::routes();



