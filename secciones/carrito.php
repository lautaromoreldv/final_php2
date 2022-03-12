<?php

if(empty($_SESSION["usuario"])){
    header("Location:index.php?seccion=tienda&estado=error&mensaje=sin_session");
    die();
}

if(!isset($_SESSION["carrito"]) || empty($_SESSION["carrito"])){
    header("Location:index.php?seccion=tienda&estado=error&mensaje=carrito_vacio");
    die();
}

$total = 0;
?>
<section id="carrito">
    <article class="bg-light">
        
        <div class="container">
            <div class="pt-4 pb-2">
                <h2>Carrito</h2>
            </div>
            <div class="mb-3">
                <a href="index.php?seccion=tienda"> ← Volver a la tienda</a>
            </div>
        </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Imagen</th>
                            <th scope="col">Remera</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Talle</th>
                            <th scope="col">Color</th>
                            <th scope="col">Accion</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        foreach ($_SESSION["carrito"] as $indice => $dato):
                            $total += $dato["precio"];
                    ?>
                        <tr>     
                            <td><img src="<?=$dato["imagen"]?>" alt="<?=$indice?>" class="img-thumbnail"> </td> 
                            <td><?=$indice?></td>
                            <td>$<?=$dato["precio"]?></td>
                            <td><?=$dato["categoria"]?></td>
                            <td><?=$dato["talle"]?></td>
                            <td><?=ucfirst($dato["color"])?></td>
                            <td><a href="acciones/borrar_remera.php?remera=<?=$indice?>" role="button" class="btn btn-outline-danger">Eliminar</a></td>
                        </tr>  
                    <?php  
                        endforeach;
                    ?>
                    <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>$<?=$total?></strong></td>
                    </tr>
                    </tbody>
                </table>  
            </div>

            <div class="container">
                <div class="d-flex mb-3">
                    <a href="acciones/borrar_carrito.php" class="btn btn-outline-danger ml-auto mr-4" role="button">Borrar todo</a> 
                    <form action="index.php?seccion=pago" method="post">
                        <input type="hidden" name="totalFinal" value="<?=$total?>">
                        <button type="submit" value="enviar" name="enviar" class="btn btn-primary">Ir a pagar</button>
                    </form>  
                </div>
            </div>
    </article>
</section>