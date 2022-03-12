<?php

    $queryUsuarios = <<<USUARIOS
       SELECT * FROM usuarios;
USUARIOS;
    $queryTipoUsuarios = <<<TIPOUSUARIOS
        SELECT * FROM tipousuarios;
TIPOUSUARIOS;

    $usuarios = select($queryUsuarios);      
    $tipousuarios = select($queryTipoUsuarios);
?>
<section id="info"> 
    <div class="bg-light pt-4">
    <div class="container pb-4">
        <h2>Crear usuario</h2>
        <a href="index.php?seccion=usuarios"> ← Volver a Usuarios</a>
    </div>
        <form action="acciones/enviar_usuario.php" enctype="multipart/form-data" method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <div class="form-row">
                            <div class="form-group col-4">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="nombre" placeholder="Ingrese un nombre ">
                            </div>

                            <div class="form-group col-4">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese un apellido">
                            </div>

                            <div class="form-group col-4">
                                <label for="usuario">Nombre de usuario</label>
                                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="juanperez">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-4">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="juanperez@hotmail.com">
                            </div>

                            <div class="form-group col-4">
                                <label for="contraseña">Contraseña</label>
                                <input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="****">
                            </div>

                            <div class="form-group col-4">
                                <label for="tipousuario">Tipo de usuario</label>
                                <select name="tipousuario" id="tipousuario" class="form-control">
                                    <option value="">Elegir tipo de usuario</option>
                                        <?php
                                            foreach($tipousuarios as $tipousuario):
                                        ?>
                                    <option value="<?= $tipousuario["id"]; ?>"><?=$tipousuario["tipousuario"]; ?></option>
                                        <?php
                                            endforeach;
                                        ?>
                                </select>
                            </div>
                        </div>    
                    </div>

                </div>
            <button type="submit" class="btn btn-primary mb-4 mt-2">Crear usuario</button>    
            </div>      
    </div>    
</section>