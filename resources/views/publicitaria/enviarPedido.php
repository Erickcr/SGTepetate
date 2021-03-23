<?php
    try{
        //Llamado de los datos
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];
        $descripcion = $_POST['descripcion'];

        //Datos para el correo
        $destinatario ="dgmarin61@gmail.com";
        $asunto ="Solicitud de pedido (Página Web)";

        //mensajeTotal
        $mensaje = "Nombre: $nombre \nTeléfono: $telefono \n
        Dirección: $direccion \nCorreo: $email \n
        Pedido Solicitado: $descripcion";

        //Envio de mensaje
        mail($destinatario, $asunto, $mensaje);

        //ENVIO A LA BD

        //se envió correctamente
        header("Location: /pedidoCorrecto");
    }
    catch(Exception $e){
        //Mensaje de alerta
        header("Location: /pedidoIncorrecto");
    }
    



?>