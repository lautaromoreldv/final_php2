<?php
  
    $query = <<<QUERYREMERAS
       SELECT r.id, r.nombre, r.precio, r.color, r.imagen, c.categoria, IFNULL(t.talle, "Sin talle") as talle
       FROM remeras as r
       LEFT JOIN categorias as c ON c.id = categorias_id
       JOIN talles as t ON t.id = talles_id
       ORDER BY r.id ASC
QUERYREMERAS;
      
    $rta = mysqli_query($cnx, $query);
    $remeras = mysqli_fetch_assoc($rta);
?>
<section id="info"> 
    <div class="bg-light"> 
        <h2 class="container pt-2 pb-2">Administración de Remeras</h2>
          <div class="container">
              <div class="row">
                  <table class="table">
                      <thead>
                          <tr>
                              <th scope="col">Imagen</th>
                              <th scope="col">Id</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Precio</th>
                              <th scope="col">Color</th>
                              <th scope="col">Categoría</th>
                              <th scope="col">Talle</th>
                              <th scope="col"><a href="index.php?seccion=crear_remera" class="btn btn-success">Crear remera</a>
                              </th>
                          </tr>
                      </thead>

                      <tbody>
                                <?php
                                    while ($remeras = mysqli_fetch_assoc($rta)):
                                ?>
                          <tr class="mb-2">
                              <td><img src="../<?=$remeras["imagen"]?>" alt="<?=$remeras["nombre"]?>" class="img-thumbnail"></td>
                              <td><?=$remeras["id"]?></td>
                              <td><?=ucfirst($remeras["nombre"])?></td>
                              <td>$<?=ucfirst($remeras["precio"])?></td>
                              <td><?=ucfirst($remeras["color"])?></td>
                              <td><?=$remeras["categoria"]?></td>
                              <td><?=$remeras["talle"]?></td>
                              <td><a href="index.php?seccion=editar_remera&id=<?=$remeras['id']?>" class="btn btn-primary">Editar</a></td>

                              <td><form action="acciones/borrar_remera.php" method="post">
                              <input type="hidden" value="<?=$remeras["id"]?>" name="id">
                              <input type="hidden" name="imgaborrar" value="<?=$remeras["imagen"]?>">
                              <button type="submit" class="btn btn-danger">Borrar</button>
                              </form>
                              </td>
                          </tr>
                        <?php
                          endwhile;
                        ?>
                      </tbody>
                  </table>       
              </div>
          </div>
    </div>
</section>