<?php
include 'db.php';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar la actualización del mensaje
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    $sql = "UPDATE contactos SET nombre=?, telefono=?, correo=?, mensaje=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $nombre, $telefono, $correo, $mensaje, $id);

    if ($stmt->execute()) {
        header("Location: read.php");  // Redirigir a read.php después de actualizar correctamente
        exit();  // Asegurarse de que el script se detenga después de la redirección
    } else {
        echo "Error al actualizar el mensaje: " . $conn->error;
    }
} else {
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