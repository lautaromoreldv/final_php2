<?php

if(!is_numeric($_GET["id"])){
    header("location:index.php?seccion=remeras&estado=error&mensaje=no_encontrado");
    die();
}

    if(!empty($_GET["id"])){
        $id = $_GET["id"];

        $queryRemeras = "SELECT * FROM remeras WHERE id = $id";
        $remeras = select($queryRemeras);

        if(empty($remeras)){
            header("location:index.php?seccion=remeras&estado=error&mensaje=no_encontrado");
            die();
        }
       
    $queryCategorias = <<<CATEGORIAS
        SELECT * FROM categorias;
CATEGORIAS;

    $queryTalles = <<<TALLES
        SELECT * FROM talles;
TALLES;

$categorias = select($queryCategorias);  
$talles = select($queryTalles);
}
?>
<section id="info"> 
    <div class="bg-light pt-4">
        <div class="container">
            <h2 class="pb-4">Editar remera</h2>
                <form action="acciones/remera_editada.php" enctype="multipart/form-data" method="POST">
                <?php
                    if(isset($remeras)){
                        foreach($remeras as $remera):
                ?>
                    <input type="hidden" name="id" value=<?=$remera["id"];?>>
                <?php
                        endforeach;
                    }
                ?>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-row">
                                <div class="form-group col-12 col-lg-6">
                                    <label for="nombre">Nombre</label>
                                    <?php
                                        foreach($remeras as $remera):
                                    ?>
                                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese nombre de la remera" value="<?=ucfirst(isset($remera) ? $remera["nombre"] : "");?>">
                                    <?php
                                        endforeach;
                                    ?>    
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label for="color">Color</label>
                                    <?php
                                        foreach($remeras as $remera):
                                    ?>
                                        <input type="text" class="form-control" name="color" id="color" placeholder="Ingrese el color de la remera" value="<?=ucfirst(isset($remera) ? $remera["color"] : "");?>">
                                    <?php
                                        endforeach;
                                    ?> 
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-12 col-lg-4">
                                    <label for="precio">Precio</label>
                                    <?php
                                        foreach($remeras as $remera):
                                    ?>
                                        <input type="number" min="0" class="form-control" name="precio" id="precio" placeholder="$" value="<?=isset($remera) ? $remera["precio"] : "";?>">
                                    <?php
                                        endforeach;
                                    ?>
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="categoria">Categoría</label>
                                        <select name="categoria" id="categoria" class="form-control">
                                            <option value="">Elegir categoría</option>
                                            <?php
                                                foreach($categorias as $categoria):
                                            ?>
                                                <option <?=$categoria["id"] == $remera["categorias_id"] ? "selected" : "";?> value="<?= $categoria["id"]; ?>"><?=$categoria["categoria"]; ?></option>
                                            <?php
                                                endforeach;
                                            ?>
                                        </select>
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="talle">Talle</label>
                                        <select name="talle" id="talle" class="form-control">
                                            <option value="">Elegir talle</option>
                                            <?php
                                                foreach($talles as $talle):
                                            ?>
                                                <option <?=$talle["id"] == $remera["talles_id"] ? "selected" : "";?> value="<?=$talle["id"]; ?>"><?=$talle["talle"]; ?></option>
                                            <?php
                                                endforeach;
                                            ?>
                                        </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mb-4">Editar</button>
                        </div>
                
                    <?php
                        foreach($remeras as $remera):
                    ?>      
                        <div class="col-sm">
                            <div class="form-group text-center col-12">
                                <p>Sólo acepta imágenes .jpg / .jpeg</p>
                                <img src="../<?=$remera["imagen"]?>" alt="<?=$remera["nombre"]?>" class="img-thumbnail img-edit">   
                    
                                <label for="imagen"></label>
                                <input accept="image/jpeg" type="file" class="form-control-file" name="imagen" id="imagen">
                                <input type="hidden" name="data_img" value=<?=$remera["imagen"];?>>
                            </div>
                        </div>
                    <?php     
                        endforeach;
                    ?>
                    </div>
                    
                </form>
        </div>
    </div>  
</section>