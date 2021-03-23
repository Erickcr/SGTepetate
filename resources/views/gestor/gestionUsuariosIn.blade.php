@extends('layouts.menuGestor')

@section('menu')
<a href="#" class="textoTitulosSeccion">
    <a href="/sgtepetate/Usuarios" class="textoTitulosSeccion">
        Usuarios
    </a>/
    <a href="" class="textoTitulosSeccion">
        Usuarios Inactivos
    </a>
</a>
@endsection

@section('contenido')
<div class="row">

    <!-- boton agregar usuario -->
    
    @php
        $contador = 0;    
    @endphp
    
    <!-- FOREACH -->
    @foreach($usuario as $usuario)
    @php
        $contador++;    
    @endphp
    <div class="card shadow mb-4 dgPerfil">
        <div class="cabeceraGUtotal">
            <div class="card-header py-3 cabeceraGU">
                <h6 class="m-0 font-weight-bold text-primary ">{{$usuario->nombre}}</h6>
            </div>
            <!-- Aqui van los botones para modificar/eliminar --> 
            <div class="card-header  cabeceraGUboton"> 
                <div class="div_iconEditGU" >
    
                </div>
                <div class="div_iconDeleteGU">
                    <a href="#" data-toggle="modal" style="text-decoration:none" data-target="#logoutModal{{$usuario->idUsuario}}">
                        <i class="fas fa-user-check" style="color:#207558"></i>
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
                            {{$usuario->ciudad}},&nbsp;{{$usuario->colonia}},&nbsp;{{$usuario->calle}},&nbsp;{{$usuario->numCasa}}</p> </div>
                            </p>
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
                    
                    <div class="contenidoDGPerfilB">
                        <div class="imgGU shadow">
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
              <h5 class="modal-title" id="exampleModalLabel">Reactivar usuario</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">¿Estás seguro de que deseas reactivar este usuario?</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <form action="/sgtepetate/Usuarios/activar/{{$usuario->idUsuario}}" method="POST">
                    {{csrf_field()}}
                    @method('PATCH')
                    <button class="btn text-white" style="background-color:#207558">Aceptar</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    @endforeach
        <!-- FIN FOREACH -->

    @if($contador == 0)
    <div style="width: 100%">
      <h1 style="text-align: center">No hay usuarios inactivos</h1>
    </div>
    @endif
    

</div>
    
@endsection