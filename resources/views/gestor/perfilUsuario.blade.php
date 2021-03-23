@extends('layouts.menuGestor')

@section('menu')
<a href="#" class="textoTitulosSeccion">
    Perfil
</a>
@endsection

@section('perfilActive')
    active
@endsection

@section('contenido')
    <div class="row">
        <div class="card shadow mb-4 dgPerfil">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Datos Generales</h6>
            </div>
            <div class="card-body">
                <div class="contenidoDGPerfil">
                    @foreach ($usuario as $u)
                    <div class="contenidoDGPerfilA">
                        <div class="datGePerfil">
                            <div class="izPerfil">
                                <p><b>Rol de Usuario:</b></p>
                            </div>
                            <div class="derPerfil">
                                <p>
                                    {{ $u->tipo }}
                                </p>
                            </div>
                        </div>
                        <div class="datGePerfil">
                            <div class="izPerfil">
                                <p><b>Salario:</b></p>
                            </div>
                            <div class="derPerfil">
                                <p>
                                    ${{ $u->sueldo }}    
                                </p>
                            </div>
                        </div>
                        <div class="datGePerfil">
                            <div class="izPerfil">
                                <p><b>Nombre:</b></p>
                            </div>
                            <div class="derPerfil">
                                <p>
                                    {{ $u->nombre }} &nbsp; {{ $u->apellidoP }} &nbsp; {{ $u->apellidoM }}    
                                </p>
                            </div>
                        </div>
                        <div class="datGePerfil">
                            <div class="izPerfil">
                                <p><b>Dirección:</b></p>
                            </div>
                            <div class="derPerfil">
                                <p>
                                    {{ $u->calle }} #{{ $u->numCasa }} {{ $u->colonia }} {{ $u->municipio }}, {{ $u->estado }}
                                    CP:&nbsp;{{ $u->codigoPostal }}
                                </p>
                            </div>
                        </div>
                        <div class="datGePerfil">
                            <div class="izPerfil">
                                <p><b>Teléfono:</b></p>
                            </div>
                            <div class="derPerfil">
                                <p>
                                    {{ $u->telefono }}    
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="contenidoDGPerfilB">
                        <div class="imagenUsuarioPerfil shadow">
                            <img src="{{asset('/storage/images/usuarios_img/'.$u->foto)}}">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection