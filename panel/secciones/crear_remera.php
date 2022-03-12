<?php

    $queryRemeras = <<<REMERAS
       SELECT * FROM remeras;
REMERAS;
    $queryCategorias = <<<CATEGORIAS
        SELECT * FROM categorias;
CATEGORIAS;
    $queryTalles = <<<TALLES
        SELECT * FROM talles;
TALLES;

    $remeras = select($queryRemeras);      
    $categorias = select($queryCategorias);  
    $talles = select($queryTalles);  
?>
<section id="info"> 
    <div class="bg-light pt-4">
        <div class="container pb-4">
            <h2>Crear remera</h2>
            <a href="index.php?seccion=remeras"> ← Volver a Remeras</a>
        </div>
        <form action="acciones/enviar_remera.php" enctype="multipart/form-data" method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <div class="form-row">
                            <div class="form-group col-12 col-lg-6">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese nombre de la remera">
                            </div>

                            <div class="form-group col-12 col-lg-6">
                                <label for="color">Color</label>
                                <input type="text" class="form-control" name="color" id="color" placeholder="Ingrese el color de la remera">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-12 col-lg-4">
                                <label for="precio">Precio</label>
                                <input type="number" class="form-control" name="precio" id="precio" placeholder="$1000">
                            </div>
                            <div class="form-group col-12 col-lg-4">
                                <label for="categoria">Categoría</label>
                                <select name="categoria" id="categoria" class="form-control">
                                    <option value="">Elegir categoría</option>
                                        <?php
                                            foreach($categorias as $categoria):
                                        ?>
                                    <option value="<?= $categoria["id"]; ?>"><?=$categoria["categoria"]; ?></option>
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
                                    <option value="<?=$talle["id"]; ?>"><?=$talle["talle"]; ?></option>
                                        <?php
                                            endforeach;
                                        ?>
                                </select>
                            </div>
                        </div>    
                    </div>

                    <div class="col-sm text-center">
                        <div class="form-group mt-0 pt-0">
                            <label for="imagen">Sólo acepta imágenes .jpg / .jpeg</label>
                            <input type="file" class="form-control-file" name="imagen" id="imagen">
                        </div>
                    </div>
                </div>
            <div class="mb-4 mt-2">
                <button type="submit" class="btn btn-primary btn-enviar">Crear remera</button>   
            </div> 
            </div>      
    </div>    
</section>