<?php
  $id = ($_GET["id"]);

if(!is_numeric($id)){
  header("location:index.php?seccion=tienda&estado=error&mensaje=no_encontrado");
  die();
}


    $query = <<<QUERYREMERAS
    SELECT r.id, r.nombre, r.precio, r.color, IFNULL(r.imagen, "Sin imagen") as imagen, c.categoria, IFNULL(t.talle, "Sin talle") as talle
    FROM remeras as r
    JOIN categorias as c ON c.id = categorias_id
    LEFT JOIN talles as t ON t.id = talles_id
    WHERE r.id = $id;
QUERYREMERAS;
   
    $rta = mysqli_query($cnx, $query);
    $remeras = mysqli_fetch_assoc($rta);

  if(mysqli_num_rows($rta) == 0){
     header("location:index.php?seccion=tienda&estado=error&mensaje=no_encontrado");
     die();
    }


?>
<section id="info"> 
  <article class="bg-light">  

    <div class="container pb-5">
        <div class="pt-4 pb-2">
          <h2>Información</h2>
        </div>
        
        <a href="index.php?seccion=tienda"> ← Volver a la tienda</a>

            <div class="row">
                <div class="col-12 col-sm-6 mt-3">   
                    <img class="img-fluid" src="<?=$remeras["imagen"]?>" alt="<?= $remeras["nombre"]?>"> 
                </div>    

                          <div class="col-12 col-sm-6 mt-3">
                            <div class="card">
                              <div class="card-body">
                                <h3 class="card-title text-center tituloachicar pt-3 pb-4"><?= ucfirst($remeras["nombre"])?></h3>
                                  <p class="text-center mt-4">Precio: $<?=$remeras["precio"]?></p>
                                  <p class="text-center">Categoría: <?=$remeras["categoria"]?></p>
                                  <p class="text-center">Talle: <?=ucfirst($remeras["talle"])?></p>
                                  <p class="text-center">Color: <?=ucfirst($remeras["color"])?></p>

                                  <?php
                                    if(!empty($_SESSION["usuario"])){
                                  ?>   
                                    
                                    <form action="acciones/comprar.php" method="POST" enctype="multipart/form-data">
                                      <input type="hidden" name="id" value="<?=$remeras["id"]?>">
                                      <input type="hidden" name="imagen" value="<?=$remeras["imagen"]?>">
                                      <input type="hidden" name="nombre" value="<?=$remeras["nombre"]?>">
                                      <input type="hidden" name="precio" value="<?=$remeras["precio"]?>">
                                      <input type="hidden" name="talle" value="<?=$remeras["talle"]?>">
                                      <input type="hidden" name="categoria" value="<?=$remeras["categoria"]?>">
                                      <input type="hidden" name="color" value="<?=$remeras["color"]?>">
                                      <div class="text-center mt-5 mb-2">
                                        <button type="submit" value="enviar" name="enviar" class="btn btn-primary btn-lg addCarrito" id="<?=$remeras["id"]?>">Comprar</button>
                                      </div> 
                                    </form>

                                  <?php
                                  }
                                  ?>
                                  
                              </div>
                            </div>
                          </div>
              </div>
    </div>

  </article>
</section>