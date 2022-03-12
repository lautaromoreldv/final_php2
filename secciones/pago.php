<?php
if(!isset($_SESSION["carrito"]) || empty($_SESSION["carrito"])){
    header("Location:index.php?seccion=tienda&estado=error&mensaje=401");
    die();
}

    $total = $_POST["totalFinal"];

if(!isset($total)){
    header("Location:index.php?seccion=carrito&estado=error&mensaje=sin_acceso");
    die();
}

    $provincias = [
        'Buenos Aires',
        'Ciudad Autónoma de Buenos Aires',
        'Catamarca',
        'Chaco',
        'Chubut',
        'Córdoba',
        'Corrientes',
        'Entre Ríos',
        'Formosa',
        'Jujuy',
        'La Pampa',
        'La Rioja',
        'Mendoza',
        'Misiones',
        'Neuquén',
        'Río Negro',
        'Salta',
        'San Juan',
        'San Luis',
        'Santa Cruz',
        'Santa Fe',
        'Santiago del Estero',
        'Tierra del Fuego, Antártida e Islas del Atlántico Sur',
        'Tucumán',
    ];
?>
<section id="info" class="bg-light"> 
  <article class="container">  
    <h2 class="pt-4">Pago</h2>
    <a href="index.php?seccion=carrito"> ← Volver al carrito</a>
        <form action="acciones/finalizar_pago.php" method="POST" class="mt-3">
            <h3>Entrega</h3>
            <div class="row">   
                <div class="form-group col-12 col-md-7">
                    <label for="direccion">Dirección de entrega</label>
                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Av. corrientes 2000">
                </div> 
                <div class="form-group col-12 col-md-5">
                <label for="provincia">Provincia</label>
                    <select id="provincia" name="provincia" class="form-control">
                        <option disabled selected>Elegí tu provincia</option>
                        <?php
                            foreach ($provincias as $prov):
                        ?>
                            <option><?=$prov?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>
                <div class="form-group col-12 col-sm-8 col-md-7">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="La Plata">
                </div>
                <div class="form-group col-12 col-sm-4 col-md-5">
                    <label for="codigo_postal">Código postal</label>
                    <input type="number" class="form-control" name="codigo_postal" id="codigo_postal" placeholder="1001">
                </div>
            </div>

            <h3>Pago</h3>
            <div class="row">  
                <div class="form-group col-12 col-6">
                    <label for="numero_tarjeta">Número de tarjeta de crédito/débito</label>
                    <input type="number" class="form-control" name="numero_tarjeta" id="numero_tarjeta" placeholder="XXXX-XXXX-XXXX-XXXX">
                </div>
             <div class="form-group col-12 col-sm-8 col-md-7">
                <label for="fecha_vencimiento">Vencimiento</label>
                <input type="month" class="form-control" name="fecha_vencimiento" id="fecha_vencimiento" value="2022-08">
            </div>
            <div class="form-group col-12 col-sm-4 col-md-5">
                <label for="codigo_seguridad">Código de seguridad</label>
                <input type="number" class="form-control" name="codigo_seguridad" id="codigo_seguridad" placeholder="***">
            </div>
            <div class="form-group col-12">
                <label for="titular_tarjeta">Nombre del titular de la tarjeta</label>
                <input type="text" class="form-control" name="titular_tarjeta" id="titular_tarjeta" placeholder="Juan Perez">
            </div>
            <div class="form-group col-12">
                <label for="coutas">Cuotas</label>
                    <select id="coutas" name="cuotas" class="form-control">
                        <option disabled selected>Elegí las cuotas $<?=$total?></option>
                        <option>1x $<?=number_format($total/1, 2)?> = $<?=$total?></option>
                        <option>3x $<?=number_format($total/3, 2)?> = $<?=$total?></option>
                        <option>6x $<?=number_format($total/6, 2)?> = $<?=$total?></option>
                    </select>
                <input type="hidden" name="precio" value="<?=$total?>">
            </div>
        </div>  
            <button type="submit" class="btn btn-primary btn-block mt-2 mb-4">Comprar</button>
        </form>
  </article>   
</section>
