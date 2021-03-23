<?php

use Illuminate\Support\Facades\Route;
use App\Exports\MovFinancieroExport;
use Illuminate\Support\Facades\Gate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*---------------------------RUTAS PÁGINA PUBLICITARIA---------------------------*/
Route::get('/', 'PublicitariaController@index');

// Route::get('/inicio', function () {
//     return view('publicitaria.inicio');
// });

Route::get('/sobre-nosotros', 'PublicitariaController@sobreNosotros');

Route::get('/contacto', 'PublicitariaController@contacto');

//PRODUCTOS
Route::get('/productos', 'ProductosController@index');
Route::get('/agregar-al-carrito/{id}', 'PublicitariaController@agregarAlCarrito');
Route::patch('/actualizar-carrito', 'PublicitariaController@update');
Route::delete('eliminar-del-carrito', 'PublicitariaController@remove');

//RECETAS
Route::get('/recetas', 'RecetasController@index');
Route::get('/recetas/{idReceta}','RecetasController@show');

//NOTICIAS
Route::get('/noticias', 'NoticiasController@index');

//PEDIDOS
Route::get('/solicitar-pedido', 'PublicitariaController@solicitudPedido');
Route::post('/solicitar-pedido', 'PublicitariaController@enviarPedido');

Route::get('/pedidoCorrecto', function () {
    return view('publicitaria.pedidoCorrecto');
});

Route::get('/pedidoIncorrecto', function () {
    return view('publicitaria.pedidoIncorrecto');
});
/*---------------------------RUTAS SISTEMA GESTOR---------------------------*/
Route::get('/sgtepetate', function () {
    return view('gestor.inicio');
})->middleware('auth');

Route::get('/sgtepetate/perfil','UsuarioController@index')->middleware('auth');

Route::get('/login', function () {
    return view('login');
});

Route::get('/forget', function () {
    return view('forget');
});

/*---------------------------USUARIOS---------------------------**/
Route::get('/sgtepetate/Usuarios','gestionUsuarioController@index')->middleware('auth');
Route::get('/sgtepetate/Usuarios/{usuario}/EditarUsuario','gestionUsuarioController@editusuario')->middleware('auth');
Route::patch('/sgtepetate/Usuarios/{usuario}','gestionUsuarioController@updateusuario')->middleware('auth');
Route::delete('/sgtepetate/Usuarios/{usuario}','gestionUsuarioController@destroyEstatus')->middleware('auth');
Route::get('/sgtepetate/Usuarios/AñadirUsuario','gestionUsuarioController@addusuario')->middleware('auth');
Route::post('/sgtepetate/Usuarios/AñadirUsuario','gestionUsuarioController@storeusuario')->middleware('auth');
Route::get('/sgtepetate/Usuarios/Inactivos','gestionUsuarioController@indexInactivos')->middleware('auth');
Route::patch('/sgtepetate/Usuarios/activar/{usuario}','gestionUsuarioController@reactivarUsuario')->middleware('auth');

/*---------------------------GestionPagina---------------------------*/
Route::get('/sgtepetate/gestionPagina','GestionProductosController@index')->middleware('auth');


Route::get('/sgtepetate/gestionPagina/createReceta','GestionProductosController@addreceta')->middleware('auth');
Route::post('/sgtepetate/gestionPagina/createReceta','GestionProductosController@storereceta')->middleware('auth');
Route::get('/sgtepetate/gestionPagina/{receta}/editReceta','GestionProductosController@editreceta')->middleware('auth');
Route::patch('/sgtepetate/gestionPagina/{receta}/patchReceta','GestionProductosController@updatereceta')->middleware('auth');
Route::delete('/sgtepetate/gestionPagina/{receta}/deleteReceta','GestionProductosController@destroyreceta')->middleware('auth');

Route::get('/sgtepetate/gestionPagina/createNoticia','GestionProductosController@addnoticia')->middleware('auth');
Route::post('/sgtepetate/gestionPagina/createNoticia','GestionProductosController@storenoticia')->middleware('auth');
Route::get('/sgtepetate/gestionPagina/{noticia}/editNoticia','GestionProductosController@editnoticia')->middleware('auth');
Route::patch('/sgtepetate/gestionPagina/{noticia}/patchNoticia','GestionProductosController@updatenoticia')->middleware('auth');
Route::delete('/sgtepetate/gestionPagina/{noticia}/deleteNoticia','GestionProductosController@destroynoticia')->middleware('auth');

Route::get('/sgtepetate/gestionPagina/createOferta','GestionProductosController@addoferta')->middleware('auth');
Route::post('/sgtepetate/gestionPagina/createOferta','GestionProductosController@storeoferta')->middleware('auth');
Route::get('/sgtepetate/gestionPagina/{oferta}/editOferta','GestionProductosController@editoferta')->middleware('auth');
Route::patch('/sgtepetate/gestionPagina/{oferta}/patchOferta','GestionProductosController@updateoferta')->middleware('auth');
Route::delete('/sgtepetate/gestionPagina/{oferta}/deleteOferta','GestionProductosController@destroyoferta')->middleware('auth');

Route::get('/sgtepetate/gestionPagina/createProducto','GestionProductosController@addproducto')->middleware('auth');
Route::post('/sgtepetate/gestionPagina/createProducto','GestionProductosController@storeproducto')->middleware('auth');
Route::get('/sgtepetate/gestionPagina/{producto}/editProducto','GestionProductosController@editproducto')->middleware('auth');
Route::patch('/sgtepetate/gestionPagina/{producto}/patchProducto','GestionProductosController@updateproducto')->middleware('auth');
Route::delete('/sgtepetate/gestionPagina/{producto}/deleteProducto','GestionProductosController@destroyproducto')->middleware('auth');

/*---------------------------Gestion Pedidos---------------------------*/
Route::get('/sgtepetate/pedidos', 'gestionPedidoController@index');

Route::get('/sgtepetate/revisarpedido/{pedido}', 'gestionPedidoController@show');

Route::patch('/sgtepetate/revisarpedido/{pedido}', 'gestionPedidoController@update');

/*-----------------------------Ingresos y egresos-----------------------*/
Route::get('/sgtepetate/ingresos-egresos','ingresosEgresosController@index');
Route::get('/sgtepetate/ingresos-egresos/ver-ingresos','ingresosEgresosController@indexIngresos');
Route::get('/sgtepetate/ingresos-egresos/ver-egresos','ingresosEgresosController@indexEgresos');
Route::get('/sgtepetate/ingresos-egresos/nuevo-registro','ingresosEgresosController@registrar');
Route::post('/sgtepetate/ingresos-egresos/nuevo-registro/create','ingresosEgresosController@addRegistro');
Route::get('/sgtepetate/ingresos-egresos/historial','ingresosEgresosController@indexHistorial');
Route::get('/sgtepetate/ingresos-egresos/historial/editar/{movfinanciero}','ingresosEgresosController@indexEditar');
Route::patch('/sgtepetate/ingresos-egresos/historial/patch/{movfinanciero}','ingresosEgresosController@updateEditar');
Route::delete('/sgtepetate/ingresos-egresos/historial/delete/{movfinanciero}','ingresosEgresosController@deleteEditar');
Route::get('/sgtepetate/ingresos-egresos/conceptos','ingresosEgresosController@indexConceptos');
Route::get('/sgtepetate/ingresos-egresos/conceptos/create','ingresosEgresosController@addConceptos');
Route::post('/sgtepetate/ingresos-egresos/conceptos/create','ingresosEgresosController@createConceptos');
Route::get('/sgtepetate/ingresos-egresos/conceptos/edit/{tipoconcepto}','ingresosEgresosController@editConceptos');
Route::patch('/sgtepetate/ingresos-egresos/conceptos/edit/{tipoconcepto}','ingresosEgresosController@updateConceptos');
Route::delete('/sgtepetate/ingresos-egresos/conceptos/{tipoconcepto}','ingresosEgresosController@deleteConceptos');
//ruta para poner el informe de los Ingresos y egresos
Route::get('/sgtepetate/ingresos-engresos/informe/{mesnuevo}/{anionuevo}',[
    'uses'=>'ingresosEgresosController@informe',
    'as'=>'informeIE'
]); 

//Inventario //////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/sgtepetate/inventario','GestionInventarioController@index')->middleware('auth');
Route::get('/sgtepetate/inventario/todo','GestionInventarioController@showall')->middleware('auth');

Route::get('/sgtepetate/inventario/addCategoria','GestionInventarioController@addcategoria')->middleware('auth');
Route::post('/sgtepetate/inventario/addCategoria','GestionInventarioController@storecategoria')->middleware('auth');


Route::get('/sgtepetate/inventario/categoria/{categoria}','GestionInventarioController@showcategoria')->middleware('auth');
Route::get('/sgtepetate/inventario/editCategoria/{categoria}','GestionInventarioController@editcategoria')->middleware('auth');
Route::patch('/sgtepetate/inventario/patchCategoria/{categoria}','GestionInventarioController@updatecategoria')->middleware('auth');
Route::delete('/sgtepetate/inventario/deleteCategoria/{categoria}','GestionInventarioController@destroycategoria')->middleware('auth');

Route::get('/sgtepetate/inventario/editInventario/{inventario}','GestionInventarioController@editinventario')->middleware('auth');
Route::patch('/sgtepetate/inventario/patchInventario/{inventario}','GestionInventarioController@updateinventario')->middleware('auth');

Route::get('/sgtepetate/inventario/minusInventario/{inventario}','GestionInventarioController@minusinventario')->middleware('auth');
Route::patch('/sgtepetate/inventario/minuspatchInventario/{inventario}','GestionInventarioController@minusupdateinventario')->middleware('auth');
Route::get('/sgtepetate/inventario/plusInventario/{inventario}','GestionInventarioController@plusinventario')->middleware('auth');
Route::patch('/sgtepetate/inventario/pluspatchInventario/{inventario}','GestionInventarioController@plusupdateinventario')->middleware('auth');


Route::get('/sgtepetate/inventario/addInventario/{categoria}','GestionInventarioController@addinventario')->middleware('auth');
Route::post('/sgtepetate/inventario/addInventario/{categoria}','GestionInventarioController@storeinventario')->middleware('auth');

Route::post('/sgtepetate/inventario/addUnidad/{inventario}','GestionInventarioController@storeunidad')->middleware('auth');

Route::delete('/sgtepetate/inventario/deleteInventario/{inventario}','GestionInventarioController@destroyinventario')->middleware('auth');


//INVENTARIO
Route::get('/sgtepetate/inventario/editarUnidades','GestionInventarioController@showunidades')->middleware('auth');
Route::get('/sgtepetate/inventario/editarUnidad/{unidad}','GestionInventarioController@editunidad')->middleware('auth');
Route::patch('/sgtepetate/inventario/editarUnidad/{unidad}','GestionInventarioController@updateunidad')->middleware('auth');

/*--------------------------Gestion Truchas-----------------------------*/
Route::get('/sgtepetate/gestionTruchas', 'GestionTruchasController@index')->middleware('auth'); 

Route::get('/sgtepetate/gestionTruchas/Enfermedades', 'GestionTruchasController@indexEnfermedades')->middleware('auth');

Route::get('/sgtepetate/gestionTruchas/Mortalidad', 'GestionTruchasController@indexMortalidad')->middleware('auth');

Route::get('/sgtepetate/gestionTruchas/AproximaciónDiagnostico', 'GestionTruchasController@indexSintomas')->middleware('auth');

Route::post('/sgtepetate/gestionTruchas/AproximaciónDiagnostico', 'GestionTruchasController@indexResultados')->middleware('auth');

Route::patch('/sgtepetate/gestionTruchas/AproximaciónDiagnostico/Archivar', 'GestionTruchasController@archivarEnfermedad')->middleware('auth');

Route::patch('/sgtepetate/gestionTruchas/Conteo', 'GestionTruchasController@ingresoConteoTruchas')->middleware('auth');

Route::patch('/sgtepetate/gestionTruchas/Alimentacion', 'GestionTruchasController@ingresoAlimentoTruchas')->middleware('auth');

/*-----------------------Gestión Bitácora------------------------*/
Route::get ('/sgtepetate/gestionBitacora', 'GestionBitacoraController@index')->middleware('auth');
Route::get ('/sgtepetate/gestionTareasPendientes', 'GestionBitacoraController@tareasPendientes')->middleware('auth');
Route::delete('/sgtepetate/gestionTareasPendientes/{tarea}','GestionBitacoraController@deleteTarea');
Route::patch('/sgtepetate/gestionTareasPendientes/{tarea}','GestionBitacoraController@updateTarea');
Route::get ('/sgtepetate/gestionBitacora/nuevaBitacora', 'GestionBitacoraController@newBit')->middleware('auth');
Route::patch('/sgtepetate/gestionBitacora/addBitacora', 'GestionBitacoraController@storeBitacora')->middleware('auth');





Auth::routes(['register' => false]);

Route::get('/arreglo', 'PublicitariaController@arreglo');
