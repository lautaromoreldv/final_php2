<?php

    $queryTodasRemeras = "SELECT COUNT(id) as todasremeras FROM remeras";
    $cantRemeras = 8;
    $totalRemeras = select($queryTodasRemeras)[0]["todasremeras"];
    $cantPaginas = ceil($totalRemeras / $cantRemeras);
    $pagAhora = $_GET["pagina"] ?? 1;

  if($pagAhora > $cantPaginas){
    $pagAhora = $cantPaginas;
  }
  if($pagAhora < 2){
    $pagAhora = 1;
  }
  $primeros = ($cantRemeras * $pagAhora) - $cantRemeras;
  
    $query = <<<QUERYREMERAS
    SELECT r.id, r.nombre, r.precio, r.color, r.imagen, c.categoria, t.talle
    FROM remeras as r
    JOIN categorias as c ON c.id = categorias_id
    LEFT JOIN talles as t ON t.id = talles_id
QUERYREMERAS;
    
    if(!empty($_GET["buscar"])){
      $buscar = $_GET["buscar"];
      $query .= " WHERE nombre LIKE '%$buscar%'";
    }
    $query .= " ORDER BY id ASC";
    $query .= " LIMIT $primeros, $cantRemeras";
    
    $remeras = select($query);

    if(!$remeras){
      $buscado = false;
      $query = <<<QUERYREMERAS
    SELECT r.id, r.nombre, r.precio, r.color, r.imagen, c.categoria, t.talle
    FROM remeras as r
    JOIN categorias as c ON c.id = categorias_id
    LEFT JOIN talles as t ON t.id = talles_id
    ORDER BY id ASC
QUERYREMERAS;
    
    $remeras = select($query);
  }
?>

<section id="info"> 
  <article class="bg-light">  
    <div class="container pb-5">
      
      <div class="pt-4 pb-2 d-flex">
        <h2>Tienda</h2>
        <?php
          if(isset($_SESSION["carrito"])):
        ?>
        <a href="index.php?seccion=carrito" class="ml-auto mt-2">Ir al carrito →</a>
        <?php
          endif;
        ?>
      </div>

      <?php
        if(isset($buscar) && isset($buscado)):
      ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          No se encontró la remera <strong><?=$_GET["buscar"]?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <?php
        endif;
      ?>
        <div class="row">
          <?php
            foreach ($remeras as $remera) :
          ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 pb-4">
              <div class="card">
                <a href="index.php?seccion=informacion&id=<?=$remera["id"]?>">
                    <img class="card-img-top" src="<?=$remera["imagen"]?>" alt="<?=$remera["imagen"]?>"> 
                </a> 
                        <div class="card-body">
                            <h3 class="text-center tituloachicar"><?= $remera["nombre"]?></h3></p>
                 
                            <p class="text-center">$<?=$remera["precio"]?></p>
                            <div class="text-center mt-4">
                              <a href="index.php?seccion=informacion&id=<?=$remera["id"]?>" class="btn btn-primary" role="button">+ info</a>
                            </div> 
                        </div>        
              </div>  
            </div>
        
          <?php
            endforeach;
          ?>     
                  
        </div>
    </div>
  </article>
  <div class="bg-light pb-3">
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item"><a class="page-link" href="index.php?seccion=tienda&pagina=<?=$pagAhora < 2 ? 1 : $pagAhora - 1?>">Anterior</a></li>
          <?php
            for($i = 0; $i < $cantPaginas; $i++):
          ?>
            <li class="page-item">
            <a class="page-link" href="index.php?seccion=tienda&pagina=<?=$i+1?>"><?=$i+1?></a>
            </li>
          <?php
            endfor;
          ?>
          <li class="page-item"><a class="page-link" href="index.php?seccion=tienda&pagina=<?=$pagAhora < $cantPaginas ? $pagAhora + 1 : $cantPaginas?>">Siguiente</a></li>
        </ul>
      </nav>
  </div>
</section>
<script src="js/index.js"></script>