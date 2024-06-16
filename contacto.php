<?php
    include 'header.php';
    if(isset($_GET['status'])){
        $status=$_GET['status'];
        $msg=$_GET['msg'];
        ?>

        <div class="mensaje contenedor <?php echo $status; ?>">
            <p><?php echo $msg ?></p>
        </div>

        <?php
    }
?>  
<h1>Contacto</h1>
<main>
    <section>
                <h2>Contacto</h2>
                <form class="formulario" action="create_contact.php" method="POST">
                    <fieldset>
                        <legend>Contáctame enviando tus datos</legend>
                        <div class="contenedor-campos">
                            <div class="campo">
                                <DIV>
                                <label for="">Nombre:</label>
                                <input class="imput-text" type="text" name="nombre" placeholder="Tu nombre">
                                </DIV>
                            </div>
                            <div class="campo"></div>
                                <div>
                                    <label for="">Teléfono</label>
                                    <input class="imput-text" type="tel" name="telefono" id="" placeholder="Tu Teléfono">
                                </div>
                            </div>
                            <div class="campo"></div>
                                <div>
                                    <label for="">Correo</label>
                                    <input class="imput-text" type="email" name="correo" id="" placeholder="Tu correo">
                                </div>
                            </div>
                            <div class="campo"></div>
                                <div>
                                    <label for="">Mensaje</label>
                                    <textarea name="mensaje" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div>
                                <input class="imput-text" class="boton" type="submit" value="Enviar">
                            </div>
                        </div><!--contenedor-campos-->
                    </fieldset>
                </form>
            </section>
</main>
<?php
    include 'footer.php';
?>