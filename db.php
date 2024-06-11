<?php
//parametros de conexión
$servername="localhost";
$username="msuasi61245";
$password="Msuasi61245";
$dbname="formacion";

//crear la conexión
$conn=new mysqli($servername,$username,$password,$dbname);

//comprobar la conexión
if($conn->connect_error){
    //la conexión ha ido mal
    die("Connection failed: ". $conn->connect_error);
}

//echo "LA CONEXIÓN HA SIDO UN EXITO";