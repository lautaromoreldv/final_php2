<?php
  
    $query = <<<QUERYUSUARIOS
       SELECT * FROM usuarios
       ORDER BY id ASC
QUERYUSUARIOS;
      
    $rta = mysqli_query($cnx, $query);
    $usuarios = mysqli_fetch_assoc($rta);
?>
<section id="info"> 
    <div class="bg-light"> 
        <h2 class="container pt-2 pb-2">Administración de Usuarios</h2>
          <div class="container">
              <div class="row">
                  <table class="table">
                      <thead>
                          <tr>
                              <th scope="col">Id</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Apellido</th>
                              <th scope="col">Email</th>
                              <th scope="col">Nombre de usuario</th>
                              <th scope="col">Tipo de usuario</th>
                              <th scope="col"><a href="index.php?seccion=crear_usuario" class="btn btn-success">Crear Usuario</a>
                              </th>
                          </tr>
                      </thead>

                      <tbody>
                                <?php
                                    while ($usuarios = mysqli_fetch_assoc($rta)):
                                ?>
                          <tr class="mb-2">
                              <td><?=$usuarios["id"]?></td>
                              <td><?=$usuarios["nombre"]?></td>
                              <td><?=$usuarios["apellido"]?></td>
                              <td><?=$usuarios["email"]?></td>
                              <td><?=$usuarios["usuario"]?></td>
                              <td><?=$usuarios["tipousuarios_id"]?></td>
                              <td><a href="index.php?seccion=editar_usuario&id=<?=$usuarios["id"]?>" class="btn btn-primary">Editar</a></td>

                              <td><form action="acciones/borrar_usuario.php" method="post">
                              <input type="hidden" value="<?=$usuarios["id"]?>" name="id">
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