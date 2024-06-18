

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
                        <?=substr($row["mensaje"],0,51)?>...
                    </div>
                        <a href="leer.php?id=<?=$row['id']?>" title="Leer mensaje" style="margin-right: 10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="iconn" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round" alt="LEER">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                            <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                            <path d="M3 6l0 13" />
                            <path d="M12 6l0 13" />
                            <path d="M21 6l0 13" />
                        </svg>
                    </a>
                    <a href="editar.php?id=<?=$row['id']?>" class="btn-editar" title="Editar mensaje" style="margin-right: 10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="iconn" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#007bff" fill="none" stroke-linecap="round" stroke-linejoin="round" alt="EDITAR">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M14 4l6 6l-10 10h-6v-6z" />
                            <path d="M13.5 6.5l4 4" />
                        </svg>
                    </a>
                    <a href="borrar.php?id=<?=$row['id']?>" class="btn-borrar" title="Borrar mensaje">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon iconn" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#670546" fill="none" stroke-linecap="round" stroke-linejoin="round" alt="BORRAR">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M4 7h16" />
                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                            <path d="M10 12l4 4m0 -4l-4 4" />
                        </svg>
                    </a>
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