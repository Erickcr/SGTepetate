<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Receta;
use App\Noticia;
use App\Oferta;
use Illuminate\Support\Facades\Gate;

class GestionProductosController extends Controller
{
    public function index()
    {
        Gate::authorize('haveaccess','GestionProductos.index');
        $productos = Producto::orderBy('idProducto','desc')->get();
        $recetas = Receta::orderBy('idReceta','desc')->get();
        $noticias = Noticia::orderBy('idNoticia','desc')->get();
        $ofertas = Oferta::orderBy('idOferta','desc')->get();
        return view ('gestor.gestionPagina',['productos'=>$productos,'recetas'=>$recetas,
                    'noticias'=>$noticias,'ofertas'=>$ofertas]);
    }

    public function addreceta()
    {
        Gate::authorize('haveaccess','GestionProductos.addreceta');
        $productos = Producto::get();
        return view ('gestor.gestionPagina.createReceta',['productos'=>$productos]);
    }

    public function storereceta(Request $request)
    {
        Gate::authorize('haveaccess','GestionProductos.storereceta');
       //dd($request);
        $data=request()->validate([
            'nombre'=>'required|max:100',
            'descripcion'=>'nullable|max:250',
            'ingredientes'=>'required',
            'pasos'=>'required',
            'url'=>'nullable',
            'imagen'=>'required|image',
            'producto'=>'required'
        ]);
        
        $fileNameWithTheExtension = request('imagen')->getClientOriginalName();
        $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
        $extension = request('imagen')->getClientOriginalExtension();
        $newFileName=$fileName.'_'.time().'.'.$extension;
        $path = request('imagen')->storeAs('/public/images/recetas_img',$newFileName);
        $productoId=Producto::where('nombre',request('producto'))->get();
        $productoChido=$productoId->first();
        $receta=new Receta();
        $receta->nombre=request('nombre');
        $receta->descripcion=request('descripcion');
        $receta->ingredientes=request('ingredientes');
        $receta->pasos=request('pasos');
        $receta->videoURL=request('url');
        $receta->imagen=$newFileName;
        $receta->producto=$productoChido->idProducto;
        $receta->save();
        return redirect('/sgtepetate/gestionPagina');
    }
    public function editreceta($id)
    {
        Gate::authorize('haveaccess','GestionProductos.editreceta');
        $recetas = Receta::where('idReceta',$id)->get();
        $productos = Producto::get();
        return view ('gestor.gestionPagina.editReceta',['recetas'=>$recetas,'productos'=>$productos]);
    }
    public function updatereceta($id)
    {
        Gate::authorize('haveaccess','GestionProductos.updatereceta');
        $data=request()->validate([
            'nombre'=>'required|max:100',
            'descripcion'=>'nullable|max:250',
            'ingredientes'=>'required',
            'pasos'=>'required',
            'url'=>'nullable',
            'imagen'=>'image',
            'producto'=>'required'
        ]);
        
        $recetas = Receta::where('idReceta',$id)->get();
        $imagen=$recetas->first();
        if(request('imagen')==null){
            $newFileName=$imagen->imagen;
        }
        else{
        $fileNameWithTheExtension = request('imagen')->getClientOriginalName();
        $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
        $extension = request('imagen')->getClientOriginalExtension();
        $newFileName=$fileName.'_'.time().'.'.$extension;
        $path = request('imagen')->storeAs('/public/images/recetas_img',$newFileName);

        $oldImage=public_path().'/storage/images/recetas_img/'.$imagen->imagen;
            if(file_exists($oldImage)){
                unlink($oldImage);
            }

        }

        $productoId=Producto::where('nombre',request('producto'))->get();
        $productoChido=$productoId->first();
        $receta=Receta::findOrFail($id);
        $receta->nombre=request('nombre');
        $receta->descripcion=request('descripcion');
        $receta->ingredientes=request('ingredientes');
        $receta->pasos=request('pasos');
        $receta->videoURL=request('url');
        $receta->imagen=$newFileName;
        $receta->producto=$productoChido->idProducto;
        $receta->save();
        return redirect('/sgtepetate/gestionPagina');
    }
    public function destroyreceta($id)
    {
        Gate::authorize('haveaccess','GestionProductos.destroyreceta');
        $receta=Receta::findOrFail($id);

        $oldImage=public_path().'/storage/images/recetas_img/'.$receta->imagen;

        if(file_exists($oldImage)){
            unlink($oldImage);
        }

        $receta->delete();
        return redirect('/sgtepetate/gestionPagina');
    }

    public function addnoticia()
    {
        Gate::authorize('haveaccess','GestionProductos.addnoticia');
        return view ('gestor.gestionPagina.createNoticia');
    }

    public function storenoticia(Request $request)
    {
        Gate::authorize('haveaccess','GestionProductos.storenoticia');
       // dd($request);
        $data=request()->validate([
            'titulo'=>'required',
            'texto'=>'required',
            'boton'=>'nullable',
            'link'=>'nullable',
            'fecha'=>'required',
            'imagen'=>'required|image'
        ]);
        
        $fileNameWithTheExtension = request('imagen')->getClientOriginalName();
        $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
        $extension = request('imagen')->getClientOriginalExtension();
        $newFileName=$fileName.'_'.time().'.'.$extension;
        $path = request('imagen')->storeAs('/public/images/noticias_img',$newFileName);

        $noticia=new Noticia();
        $noticia->titulo=request('titulo');
        $noticia->texto=request('texto');
        $noticia->boton=request('boton');
        $noticia->link=request('link');
        $noticia->fecha=request('fecha');
        $noticia->imagen=$newFileName;

        $noticia->save();
        return redirect('/sgtepetate/gestionPagina');
    }

    public function editnoticia($id)
    {
        Gate::authorize('haveaccess','GestionProductos.editnoticia');
        $noticias = Noticia::where('idNoticia',$id)->get();
        return view ('gestor.gestionPagina.editNoticia',['noticias'=>$noticias]);
    }

    public function updatenoticia($id){
        Gate::authorize('haveaccess','GestionProductos.updatenoticia');
        // dd($request);
        $data=request()->validate([
            'titulo'=>'required',
            'texto'=>'required',
            'boton'=>'nullable',
            'link'=>'nullable',
            'fecha'=>'required',
            'imagen'=>'image'
        ]);
        $noticias = Noticia::where('idNoticia',$id)->get();
        $imagen=$noticias->first();

        if(request('imagen')==null){
            $newFileName=$imagen->imagen;
        }

        else{
        $fileNameWithTheExtension = request('imagen')->getClientOriginalName();
        $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
        $extension = request('imagen')->getClientOriginalExtension();
        $newFileName=$fileName.'_'.time().'.'.$extension;
        $path = request('imagen')->storeAs('/public/images/noticias_img',$newFileName);

        $oldImage=public_path().'/storage/images/noticias_img/'.$imagen->imagen;
            if(file_exists($oldImage)){
                unlink($oldImage);
            }
        }

        $noticia=Noticia::findOrFail($id);
        $noticia->titulo=request('titulo');
        $noticia->texto=request('texto');
        $noticia->boton=request('boton');
        $noticia->link=request('link');
        $noticia->fecha=request('fecha');
        $noticia->imagen=$newFileName;

        $noticia->save();
        return redirect('/sgtepetate/gestionPagina');
    }

    public function destroynoticia($id)
    {
        Gate::authorize('haveaccess','GestionProductos.destroynoticia');
        $noticia=Noticia::findOrFail($id);

        $oldImage=public_path().'/storage/images/noticias_img/'.$noticia->imagen;

        if(file_exists($oldImage)){
            unlink($oldImage);
        }

        $noticia->delete();
        return redirect('/sgtepetate/gestionPagina');
    }

    public function addoferta()
    {
        Gate::authorize('haveaccess','GestionProductos.addoferta');
        return view ('gestor.gestionPagina.createOferta');
    }

    public function storeoferta(Request $request)
    {
        Gate::authorize('haveaccess','GestionProductos.storeoferta');
       // dd($request);
        $data=request()->validate([
            'titulo'=>'required',
            'texto'=>'required',
            'boton'=>'nullable',
            'link'=>'nullable',
            'oferta'=>'required',
            'imagen'=>'required|image'
        ]);
        
        $fileNameWithTheExtension = request('imagen')->getClientOriginalName();
        $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
        $extension = request('imagen')->getClientOriginalExtension();
        $newFileName=$fileName.'_'.time().'.'.$extension;
        $path = request('imagen')->storeAs('/public/images/ofertas_img',$newFileName);

        $oferta=new Oferta();
        $oferta->titulo=request('titulo');
        $oferta->texto=request('texto');
        $oferta->boton=request('boton');
        $oferta->link=request('link');
        $oferta->oferta=request('oferta');
        $oferta->imagen=$newFileName;

        $oferta->save();
        return redirect('/sgtepetate/gestionPagina');
    }

    public function editoferta($id)
    {
        Gate::authorize('haveaccess','GestionProductos.editoferta');
        $ofertas = Oferta::where('idOferta',$id)->get();
        return view ('gestor.gestionPagina.editOferta',['ofertas'=>$ofertas]);
    }

    public function updateoferta($id){
        Gate::authorize('haveaccess','GestionProductos.updateoferta');
        // dd($request);
        $data=request()->validate([
            'titulo'=>'required',
            'texto'=>'required',
            'boton'=>'nullable',
            'link'=>'nullable',
            'oferta'=>'required',
            'imagen'=>'image'
        ]);
        
        $ofertas = Oferta::where('idOferta',$id)->get();
        $imagen=$ofertas->first();

        if(request('imagen')==null){
            $newFileName=$imagen->imagen;
        }

        else{
        $fileNameWithTheExtension = request('imagen')->getClientOriginalName();
        $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
        $extension = request('imagen')->getClientOriginalExtension();
        $newFileName=$fileName.'_'.time().'.'.$extension;
        $path = request('imagen')->storeAs('/public/images/ofertas_img',$newFileName);

        $oldImage=public_path().'/storage/images/ofertas_img/'.$imagen->imagen;
            if(file_exists($oldImage)){
                unlink($oldImage);
            }
        }

        $oferta=Oferta::findOrFail($id);
        $oferta->titulo=request('titulo');
        $oferta->texto=request('texto');
        $oferta->boton=request('boton');
        $oferta->link=request('link');
        $oferta->oferta=request('oferta');
        $oferta->imagen=$newFileName;

        $oferta->save();
        return redirect('/sgtepetate/gestionPagina');
    }

    public function destroyoferta($id)
    {
        Gate::authorize('haveaccess','GestionProductos.destroyoferta');
        $oferta=Oferta::findOrFail($id);

        $oldImage=public_path().'/storage/images/ofertas_img/'.$oferta->imagen;

        if(file_exists($oldImage)){
            unlink($oldImage);
        }


        $oferta->delete();
        return redirect('/sgtepetate/gestionPagina');
    }

    public function editproducto($id)
    {
        Gate::authorize('haveaccess','GestionProductos.editproducto');
        $productos = Producto::where('idProducto',$id)->get();
        return view ('gestor.gestionPagina.editProducto',['productos'=>$productos]);
    }

    public function updateproducto($id){
        Gate::authorize('haveaccess','GestionProductos.updateproducto');
        // dd($request);
        $data=request()->validate([
            'nombre'=>'required|max:45',
            'descripcion'=>'nullable|max:250',
            'precioMenudeo'=>'required',
            'descuentoMenudeo'=>'required',
            'imagen'=>'image'
        ]);
        
        $productos = Producto::where('idProducto',$id)->get();
        $imagen=$productos->first();

        if(request('imagen')==null){
            $newFileName=$imagen->imagen;
        }
        else{
        $fileNameWithTheExtension = request('imagen')->getClientOriginalName();
        $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
        $extension = request('imagen')->getClientOriginalExtension();
        $newFileName=$fileName.'_'.time().'.'.$extension;
        $path = request('imagen')->storeAs('/public/images/productos_img',$newFileName);

        $oldImage=public_path().'/storage/images/productos_img/'.$imagen->imagen;
            if(file_exists($oldImage)){
                unlink($oldImage);
            }
        }
        
        $producto=Producto::findOrFail($id);
        $producto->nombre=request('nombre');
        $producto->imagen=$newFileName;
        $producto->descripcion=request('descripcion');
        $producto->precioMenudeo=request('precioMenudeo');
        $producto->descuentoMenudeo=request('descuentoMenudeo');

        $producto->save();
        return redirect('/sgtepetate/gestionPagina');
    }

    public function addproducto()
    {
        Gate::authorize('haveaccess','GestionProductos.addproducto');
        return view ('gestor.gestionPagina.createProducto');
    }

    public function storeproducto(){
        Gate::authorize('haveaccess','GestionProductos.storeproducto');
        // dd($request);
        $data=request()->validate([
            'nombre'=>'required|max:45|unique:producto',
            'descripcion'=>'nullable|max:250',
            'precioMenudeo'=>'required',
            'descuentoMenudeo'=>'required',
            'imagen'=>'image'
        ]);
        
        $fileNameWithTheExtension = request('imagen')->getClientOriginalName();
        $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
        $extension = request('imagen')->getClientOriginalExtension();
        $newFileName=$fileName.'_'.time().'.'.$extension;
        $path = request('imagen')->storeAs('/public/images/productos_img',$newFileName);

        $producto=new Producto();
        $producto->nombre=request('nombre');
        $producto->imagen=$newFileName;
        $producto->descripcion=request('descripcion');
        $producto->precioMenudeo=request('precioMenudeo');
        $producto->descuentoMenudeo=request('descuentoMenudeo');

        $producto->save();
        return redirect('/sgtepetate/gestionPagina');
    }

    public function destroyproducto($id)
    {
        Gate::authorize('haveaccess','GestionProductos.destroyproducto');
        $producto=Producto::findOrFail($id);

        $oldImage=public_path().'/storage/images/productos_img/'.$producto->imagen;

        if(file_exists($oldImage)){
            unlink($oldImage);
        }
 
        $producto->delete();
        return redirect('/sgtepetate/gestionPagina');
    }
}
