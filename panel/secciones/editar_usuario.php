<?php

if(!is_numeric($_GET["id"])){
    header("location:index.php?seccion=usuarios&estado=error&mensaje=no_encontrado");
    die();
}
    if(!empty($_GET["id"])){
        $id = $_GET["id"];

        $queryUsuarios = "SELECT * FROM usuarios WHERE id = $id";
        $usuarios = select($queryUsuarios);

        if(empty($usuarios)){
            header("location:index.php?seccion=usuarios&estado=error&mensaje=no_encontrado");
            die();
        }
       
    $queryTipousuarios = <<<TIPOUSUARIOS
        SELECT * FROM tipousuarios;
TIPOUSUARIOS;


$tipousuarios = select($queryTipousuarios);  
}
?>
<section id="info"> 
    <div class="bg-light pt-4">
    <div class="container pb-4">
        <h2>Editar usuario</h2>
        <a href="index.php?seccion=usuarios"> ← Volver a Usuarios</a>
    </div>
        <form action="acciones/usuario_editado.php" enctype="multipart/form-data" method="POST">
        <?php
            if(isset($usuarios)){
                foreach($usuarios as $usuario):
        ?>
        <input type="hidden" name="id" value=<?=$usuario["id"];?>>
        <?php
                endforeach;
            }
        ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <div class="form-row">
                            <div class="form-group col-4">
                                <label for="nombre">Nombre</label>
                                <?php
                                    foreach($usuarios as $usuario):
                                ?>
                                <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="nombre" value="<?=isset($usuario) ? $usuario["nombre"] : "";?>">
                                <?php
                                    endforeach;
                                ?>    
                            </div>

                            <div class="form-group col-4">
                                <label for="apellido">Apellido</label>
                                <?php
                                    foreach($usuarios as $usuario):
                                ?>
                                <input type="text" class="form-control" name="apellido" id="apellido" value="<?=isset($usuario) ? $usuario["apellido"] : "";?>">
                                <?php
                                    endforeach;
                                ?> 
                            </div>

                            <div class="form-group col-4">
                                <label for="usuario">Usuario</label>
                                <input type="text" class="form-control" name="usuario" id="usuario" value="<?=isset($usuario) ? $usuario["usuario"] : "";?>">
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-4">
                                <label for="email">Email</label>
                                <?php
                                    foreach($usuarios as $usuario):
                                ?>
                                <input type="email" class="form-control" name="email" id="email" value="<?=isset($usuario) ? $usuario["email"] : "";?>">
                                <?php
                                endforeach;
                                ?>
                            </div>

                            <div class="form-group col-4">
                                <label for="tipousuario">Tipo de usuario</label>
                                <select name="tipousuario" id="tipousuario" class="form-control">
                                    <option value="">Elegir tipo de usuario</option>
                                        <?php
                                            foreach($tipousuarios as $tipousuario):
                                        ?>
                                    <option <?=$tipousuario["id"] == $usuario["tipousuarios_id"] ? "selected" : "";?> value="<?=$tipousuario["id"]; ?>"><?=$tipousuario["tipousuario"]; ?></option>
                                        <?php
                                            endforeach;
                                        ?>
                                </select>
                            </div>
                        </div>    
                    </div>
                </div>
            <button type="submit" class="btn btn-primary mb-4 mt-2">Editar usuario</button>    
            </div>    
        </form>   
    </div>    
</section>