@extends('layouts.menuGestor')

@section('menu')
<a href="#" class="textoTitulosSeccion">
    Gestión inventario
</a> 
@endsection

@section('contenido')

    <div class="row">

        <div class="btn_ver_agregar_categoria" >
            {{-- <a href="/sgtepetate/inventario/todo"><div class="btn_ver_categoria"><p>Ver todo el inventario</p></div></a> --}}
            
            <a href="/sgtepetate/inventario/todo" class="btn btn-primary btn-icon-split btn-secundarioIE3" style="background-color: #207558">
                <span class="icon text-white-50">
                    <i class="fas fa-warehouse"></i>
                </span>
                <span class="text textBotonIE">Ver todo el inventario</span>
            </a>
            
            <a href="/sgtepetate/inventario/addCategoria"><div class="btn_agregar_categoria" style="margin-top:5px"><p>Agregar categoría</p></div></a>
        </div>

        <div class="cards_categorias ">
            @foreach($categorias as $categoria)
                <a href="/sgtepetate/inventario/categoria/{{$categoria->idCategoria}}" class="card_categoria card shadow mb-4">
                    <div class="card-body texto_categoria shadow" 
                        style="background-image: linear-gradient( rgba(0, 0, 0, 0.4) 100%, rgba(0, 0, 0, 0.5)100%),url('{{asset('/storage/images/categorias_img/'.$categoria->foto)}}'); ">
                        <div class="texto_texto_categoria"><p>{{$categoria->nombre}}</p></div>
                        <div class="texto_descripcion_categoria"><p>{{$categoria->descripcion}}</p></div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="div_unidades" style="width:100%;"> 
            <a  style="float:right;"href="/sgtepetate/inventario/editarUnidades"><button class="btn btn-primary">Editar medidas</button></a>
        </div>
    </div>
@endsection