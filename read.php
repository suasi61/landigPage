

<?php
    include 'db.php';
    include 'header.php';
    $sql = "SELECT id, nombre, telefono, correo, mensaje FROM contactos";
    $result=$conn->query($sql);

?>  
<h1>Leer mensajes</h1>

<div class="contenedor listado">
    <div class="fila cabecera">
        <div class="campoCabecera">
            id
        </div>
        <div class="campoCabecera">
            nombre
        </div>
        <div class="campoCabecera">
            telefono
        </div>
        <div class="campoCabecera">
            correo
        </div>
        <div class="campoCabecera">
            mensaje
        </div>
        <div class="campoCabecera">
            Acción
        </div>
    </div>
    <?php
        $num=0;
        while($row = $result->fetch_assoc()){
            $num++;
            $paridad="inpar";
            if($num%2==0){
                $paridad="par";
            }
            //PARIDAD ME INDICA SI LA FILA ES PAR O INPAR
            ?>
            <div class="fila <?=$paridad?>">
                    <div class="campo"><?=$row['id']?></div>
                    <div class="campo"><?=$row['nombre']?></div>
                    <div class="campo"><?=$row['telefono']?></div>
                    <div class="campo"><?=$row['correo']?></div>
                    <div class="campo">
                        <?=$row['mensaje']?></div>
                        <?=substr($row["mensaje"],0,51)?>...
                    <div class="btn-borrar">
                        <a href="borrar.php?id=<?=$row['id']?>">Borrar</a>
                    </div>
            </div>
        <?php
        }
        if($num===0){
            echo "no har registros para mostrar";
        }
    ?>
</div>
<?php
    include 'footer.php';
?>