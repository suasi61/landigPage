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
        $stmt->close();
        $conn->close();
        echo"CONTACTO CREADO CON EXITO";
        header("Location: contacto.php?status=success&msg=MENSAJE GUARDADO!");
    
    }else{
            echo "ERROR AL CREAR CONTACTO";
        }

}else{
    echo "ERROR EN METODO POST";
    header("Location: contacto.php?status=error&msg=Error guardando mensaje!");
    // Mostrar el formulario de edición
    $id = $_GET['id'];
    $sql = "SELECT id, nombre, telefono, correo, mensaje FROM contactos WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    ?>

    <h1 class="form-title">Editar mensaje</h1>
    <form method="POST" action="editar.php" class="edit-form">
        <input type="hidden" name="id" value="<?=$row['id']?>">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?=$row['nombre']?>" class="form-input" required>
        <br>
        <label for="telefono" class="form-label">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="<?=$row['telefono']?>" class="form-input" required>
        <br>
        <label for="correo" class="form-label">Correo:</label>
        <input type="email" id="correo" name="correo" value="<?=$row['correo']?>" class="form-input" required>
        <br>
        <label for="mensaje" class="form-label">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" class="form-textarea" required><?=$row['mensaje']?></textarea>
        <br>
        <button type="submit" class="btn-submit">Guardar cambios</button>
    </form>
    <?php
}
include 'footer.php';
?>    
