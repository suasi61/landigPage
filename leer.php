<?php
include 'db.php';
include 'header.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT id, nombre, telefono, correo, mensaje FROM contactos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        ?>
        <div class="mensaje-container">
            <h1>Mensaje de <?=$row['nombre']?></h1>
            <div class="mensaje-detalle">
                <p><strong>ID:</strong> <?=$row['id']?></p>
                <p><strong>Nombre:</strong> <?=$row['nombre']?></p>
                <p><strong>Teléfono:</strong> <?=$row['telefono']?></p>
                <p><strong>Correo:</strong> <?=$row['correo']?></p>
                <p><strong>Mensaje:</strong> <?=$row['mensaje']?></p>
            </div>
        </div>
        <?php
    } else {
        echo "<p>Mensaje no encontrado.</p>";
    }
} else {
    echo "<p>ID no proporcionado.</p>";
}

include 'footer.php';
?>