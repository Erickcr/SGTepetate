@extends('layouts.menuGestor')

@section('menu')
<a href="/sgtepetate/Usuarios" class="textoTitulosSeccion">
    Usuarios
</a>/
<a href="#" class="textoTitulosSeccion">
    Añadir usuario
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
            <form class="formNU" action="/sgtepetate/Usuarios/AñadirUsuario" method="POST" enctype="multipart/form-data">
                @csrf
            <input class="camposNU" style="width:100%" type="text" name="nombre" placeholder="&#x263B;  Nombre completo" required autofocus value="{{old('nombre')}}"> <br>
                <!-- <input class="camposNU" type="text" name="tipo" placeholder="&#x229A; Tipo de usuario" required autofocus> <br> -->
                <input class="camposNU" type="text" name="telefono" maxlength=15 minlength=10 onkeypress="return solonumeros(event)" onpaste="return false" placeholder="&#x2706; Telefono" required value="{{old('telefono')}}"> <br>
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
                <input class="camposNU" type="text" name="ciudad" placeholder="&#x25A2; Ciudad" required value="{{old('ciudad')}}"> <br>
                <input class="camposNU" type="text" name="colonia" placeholder="&#x25A3; Colonia" required value="{{old('colonia')}}"> <br>
                <input class="camposNU" type="text" name="calle" placeholder="&#x26D9; Calle" required value="{{old('calle')}}"> <br>
                <input class="camposNU" type="number" min="1" name="numCasa" placeholder="&#x0023; Num. casa" required value="{{old('numCasa')}}"> <br>
                <input class="camposNU" type="number" min="1" step="any" name="sueldo" placeholder="&#x0024; Sueldo" value="{{old('sueldo')}}"> <br>
                <input class="camposNU" type="password" name="contraseña" placeholder="&#x26C9; Contraseña" required value="{{old('contraseña')}}"> <br>
                <input class="camposNU" type="email" name="email" placeholder="&#x40; Email" required value="{{old('email')}}"> <br>
                <p class="txtDatosNU">&nbsp; &#x20E4; &nbsp;&nbsp;Tipo de usuario</p>
                <select class="selectTipoNU camposNU tipoUsuarioNU" name="tipo" placeholder="Tipo de usuario" required value="{{old('tipo')}}">
                    <option selected="selected">Administrador</option>
                    <option>Tecnico</option>
                    <option>Empleado</option>
                </select>
                <p class="txtDatosNU">&#x1D11C; &nbsp;Fecha de nacimiento</p>
                <input class="camposNU campoDateNU" type="date" name="fechaNac" placeholder="&#x1D11C; Fecha nac." value="{{old('fechaNac')}}"> <br>
                <p class="txtDatosNU">&#x1D11C; &nbsp;Fecha de contratación</p>
                <input class="camposNU campoDateNU" type="date" name="fechaContratacion" placeholder="&#x1D11C; Fecha de contratación" value="{{old('fechaContratacion')}}"> <br>
                <p class="txtDatosNU"> 	&#x1F5BB; &nbsp;Imagen de usuario</p>
                <input class="camposNU imagenNU"  type="file" name="foto" placeholder="&#x40; Foto perfil" multiple value="{{old('foto')}}"> <br>
                <div class="divBotonesNU">
                    <a class="btnCancelarNU btnCancelarNUE" href="/sgtepetate/Usuarios" style="text-decoration: none; text-align: center;">Cancelar</a>
                    <input class="btnAñadirNU btnGuardarNUE" type="submit" value="Añadir">	
                </div>
            </form>
        </div>
    </div>
@endsection