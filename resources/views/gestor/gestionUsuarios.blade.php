@extends('layouts.menuGestor')

@section('menu')
<a href="#" class="textoTitulosSeccion">
    Usuarios
</a>
@endsection

@section('contenido')
@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
@endif
<div class="row">

    <!-- boton agregar usuario -->
    <div class="div_agregarUsuarioGU">
        <a href="/sgtepetate/Usuarios/AñadirUsuario" class="btn_addGU"><b>&nbsp;Añadir Usuario </b><img src="/img/gestor/gestionUsuarios/addGU.png"></a>
    </div>
    
    <!-- FOREACH -->
    @foreach($usuario as $usuario)
    @if ($usuario->estatus==1)
    <div class="card shadow mb-4 dgPerfil">
        <div class="cabeceraGUtotal">
            <div class="card-header py-3 cabeceraGU">
                <h6 class="m-0 font-weight-bold text-primary ">{{$usuario->nombre}}</h6>
            </div>
            <!-- Aqui van los botones para modificar/eliminar --> 
            <div class="card-header  cabeceraGUboton"> 
                <div class="div_iconEditGU" >
                    
                    <a class="" href="/sgtepetate/Usuarios/{{$usuario->idUsuario}}/EditarUsuario"> 
                        <i class="far fa-edit"></i>
                    </a>
                </div>
                <div class="div_iconDeleteGU">
                    <a href="#" data-toggle="modal" style="text-decoration:none" data-target="#logoutModal{{$usuario->idUsuario}}">
                        <i class="far fa-trash-alt deleteUser" style="color: #e02c1b"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="contenidoDGPerfil">
                <div class="contenidoDGPerfilA">
                    <div class="datGePerfil">
                        <div class="izPerfil">
                            <p><b>Rol de Usuario:</b></p>
                        </div>
                        <div class="derPerfil">
                            <p>
                                {{$usuario->tipo}}
                            </p>
                        </div>
                    </div>

                    <div class="datGePerfil">
                        <div class="izPerfil">
                            <p><b>Salario:</b></p>
                        </div>
                        <div class="derPerfil">
                            <p>
                                ${{$usuario->sueldo}}    
                            </p>
                        </div>
                    </div>

                    <div class="datGePerfil">
                        <div class="izPerfil">
                            <p><b>Dirección:</b></p>
                        </div>
                        <div class="derPerfil">
                            <p>
                            {{$usuario->ciudad}},&nbsp;{{$usuario->colonia}},&nbsp;{{$usuario->calle}},&nbsp;{{$usuario->numCasa}}</p>
                        </div>
                    </div>

                    <div class="datGePerfil">
                        <div class="izPerfil">
                            <p><b>Fecha nacimiento:</b></p>
                        </div>
                        <div class="derPerfil">
                            <p>
                                {{$usuario->fechaNac}}  
                            </p>
                        </div>
                    </div>

                    <div class="datGePerfil">
                        <div class="izPerfil">
                            <p><b>Teléfono:</b></p>
                        </div>
                        <div class="derPerfil">
                            <p>
                                {{$usuario->telefono}}  
                            </p>
                        </div>
                    </div>

                    <div class="datGePerfil">
                        <div class="izPerfil">
                            <p><b>Fecha contratación:</b></p>
                        </div>
                        <div class="derPerfil">
                            <p>
                                {{$usuario->fechaContratacion}}  
                            </p>
                        </div>
                    </div>

                    <div class="datGePerfil">
                        <div class="izPerfil">
                            <p><b>Estatus:</b></p>
                        </div>
                        <div class="derPerfil">
                            <p>
                                @if($usuario->estatus==1)
                                    Activo
                                @else
                                    No activo
                                @endif

                            </p>
                        </div>
                    </div>

                    <div class="datGePerfil">
                        <div class="izPerfil">
                            <p><b>Correo:</b></p>
                        </div>
                        <div class="derPerfil">
                            <p>
                                {{$usuario->email}} 
                            </p>
                        </div>
                    </div>
                    </div>
                    
                    <div class="contenidoDGPerfilB">
                        <div class="imagenUsuarioPerfil shadow">
                            <img src="{{asset('/storage/images/usuarios_img/'.$usuario->foto)}}">
                        </div>
                    </div>
                {{-- here must finish a div--}}
            </div>
        </div>


    </div>

    <div class="modal fade" id="logoutModal{{$usuario->idUsuario}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Eliminar usuario</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">¿Estás seguro de que deseas eliminar este usuario?</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <form action="/sgtepetate/Usuarios/{{$usuario->idUsuario}}" method="POST">
                    {{csrf_field()}}
                    @method('DELETE')
                    <button class="btn bg-danger text-white">Eliminar</button>
                </form>
            </div>
          </div>
        </div>
      </div>


    @endif

    @endforeach
        <!-- FIN FOREACH -->
    <div class="div_agregarUsuarioGU">
        <a href="/sgtepetate/Usuarios/Inactivos" class="btn_addGU"><b>&nbsp;Usuarios Inactivos</b></a>
    </div>

</div>
    
@endsection