@extends('layouts.menuGestor')

@section('menu')
<a href="/sgtepetate/Usuarios" class="textoTitulosSeccion">
    Usuarios
</a>/
<a href="#" class="textoTitulosSeccion">
    Editar usuario
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
    <div class="row contenidoTotalGU">
        <div class="containerNU shadow">	
            @foreach($usuario as $usuario)
            <form class="formNU" action="/sgtepetate/Usuarios/{{$usuario->idUsuario}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
            
                <p class="txtDatosNU PNUE">&#x263B; &nbsp;Nombre</p>
                <input class="camposNU CNUE" type="text" name="nombre" placeholder="&#x263B;  Nombre completo" value="{{$usuario->nombre}}" required autofocus> <br>
                <!-- <input class="camposNU" type="text" name="tipo" placeholder="&#x229A; Tipo de usuario" required autofocus> <br> -->
                <p class="txtDatosNU PNUE">&nbsp; &#x20E4; &nbsp;&nbsp;Tipo de usuario</p> 
                <select class=" camposNU tipoUsuarioNU CNUE selectTipoEDIT"  name="tipo" placeholder="Tipo de usuario" >
                    <option  selected="selected">{{$usuario->tipo}}</option>
                    @if($usuario->tipo=="Administrador")
                        <option>Tecnico</option>
                        <option>Empleado</option>
                    @endif
                    @if($usuario->tipo=="Tecnico")
                        <option>Empleado</option>
                        <option>Administrador</option>
                    @endif
                    @if($usuario->tipo=="Empleado")
                        <option>Tecnico</option>
                        <option>Administrador</option>
                    @endif
                </select>
                <p class="txtDatosNU PNUE">&#x2706; &nbsp;Teléfono</p>
                <input class="camposNU CNUE" type="tel" name="telefono"  maxlength=15 minlength=10 onkeypress="return solonumeros(event)" onpaste="return false" placeholder="&#x2706; Telefono" value="{{$usuario->telefono}}" required> <br>
                <script>
                    function solonumeros(e){
                        key=e.keyCode || e.which;
                        teclado=String.fromCharCode(key);
                        numeros="0123456789";
                        especiales="8-37-38-46";
                        teclado_especial=false;

                        for(var i in especiales){
                            if(key==especiales[i]){
                                teclado_especial=true;
                            }
                        }
                        if(numeros.indexOf(teclado)==-1 && !teclado_especial){
                            return false;
                        }
                    }
                </script>
                <p class="txtDatosNU PNUE">&#x25A2; &nbsp;Ciudad</p>
                <input class="camposNU CNUE" type="text" name="ciudad" placeholder="&#x25A2; Ciudad" value="{{$usuario->ciudad}}" required> <br>
                <p class="txtDatosNU PNUE">&#x25A3; &nbsp;Colonia</p>
                <input class="camposNU CNUE" type="text" name="colonia" placeholder="&#x25A3; Colonia" value="{{$usuario->colonia}}" required> <br>
                <p class="txtDatosNU PNUE">&#x26D9; &nbsp;Calle</p>
                <input class="camposNU CNUE" type="text" name="calle" placeholder="&#x26D9; Calle" value="{{$usuario->calle}}" required> <br>
                <p class="txtDatosNU PNUE">&#x0023; &nbsp;Num. casa</p>
                <input class="camposNU CNUE" type="number" min="1" name="numCasa" placeholder="&#x0023; Num. casa" value="{{$usuario->numCasa}}" required> <br>
                <p class="txtDatosNU PNUE">&#x2713; &nbsp;Estatus</p>
                <select class="camposNU CNUE selectTipoEDIT" placeholder="Estatus" name="estatus">
                    @if($usuario->estatus==1)
                        <option  selected="selected">Activo</option>
                    @else
                        <option  selected="selected">No activo</option>
                    @endif
                    @if($usuario->estatus==1)
                        <option>No activo</option>
                    @endif
                    @if($usuario->estatus==0)
                        <option>Activo</option>
                    @endif
                </select>
                <p class="txtDatosNU PNUE">&#x0024; &nbsp;Sueldo</p>
                <input class="camposNU CNUE" type="number" min="1" step="any" name="sueldo" placeholder="&#x0024; Sueldo" value="{{$usuario->sueldo}}"> <br>
                <p class="txtDatosNU PNUE">&#x26C9; &nbsp;Contraseña</p>
                <input class="camposNU CNUE" type="password" name="contraseña" placeholder="&#x26C9; Contraseña" value="{{$usuario->contraseña}}" required> <br>
                {{-- <input class="camposNU" type="password" name="confcontraseña" placeholder="&#x26CA; Confirmar contraseña" required> <br> --}}
                <p class="txtDatosNU PNUE">&#x40; &nbsp;Email</p>
                <input class="camposNU CNUE" type="email" name="email" placeholder="&#x40; Email" value="{{$usuario->email}}  " required> <br>
                <p class="txtDatosNU PNUE">&#x1D11C; &nbsp;Fecha de nacimiento</p>
                <input class="camposNU campoDateNU CNUE" type="date" name="fechaNac" placeholder="&#x1D11C; Fecha nac." value="{{$usuario->fechaNac}}"> <br>
                <p class="txtDatosNU PNUE">&#x1D11C; &nbsp;Fecha de contratación</p>
                <input class="camposNU campoDateNU CNUE" type="date" name="fechaContratacion" placeholder="&#x1D11C; Fecha de contratación" value="{{$usuario->fechaContratacion}}"> <br>
                <p class="txtDatosNU PNUE">&#x1F5BB; &nbsp;Imagen de usuario</p>
                <input class="camposNU imagenNU CNUE"  type="file" name="foto" placeholder="&#x40; Foto perfil" value="{{$usuario->foto}}"> <br>
                <div class="divBotonesNU">
                    <a class="btnCancelarNUE" href="/sgtepetate/Usuarios" style="text-decoration: none; text-align: center;">Cancelar</a>
                    <input class="btnGuardarNUE" type="submit" value="Guardar">	
                </div>
                @endforeach
            </form>
        </div>
    </div>
@endsection