<?php
include 'db.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    echo "CREANDO CONTACTO NUEVO <BR>";
    $nombre=$_POST['nombre'];
    $telefono=$_POST['telefono'];
    $correo=$_POST['correo'];
    $mensaje=$_POST['mensaje'];


    echo "NOMBRE: " .$nombre. "<br>";
    echo "TELEFONO: " .$telefono. "<br>";
    echo "correo: " .$correo. "<br>";
    echo "mensaje: " .$mensaje. "<br>";
    $sql="INSERT INTO contactos (nombre,telefono,correo,mensaje) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt ->bind_param("ssss", $nombre, $telefono, $correo, $mensaje);
    $result = $stmt->execute();

    if($result){
            echo"CONTACTO CREADO CON EXITO";
        }else{
            echo "ERROR AL CREAR CONTACTO";
        }

}else{
    echo "ERROR EN METODO POST";
}