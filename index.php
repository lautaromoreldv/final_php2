<!DOCTYPE html>
<?php
require("configs/configs.php");
require("configs/arrays.php");
require("configs/funcion.php");

$seccion = $_GET["seccion"] ?? "inicio";

if(!empty($_SESSION["usuario"])){
	if($_SESSION["usuario"]["tipousuarios_id"] == 1){
		header("Location:panel/index.php?estado=error&mensaje=401");
		die();
	}
}
?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Friends</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

</head>
<body>
	<header>
		<div class="barra">

			<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

			<div class="m-auto bg-white">
				<a href="index.php">
					<h1 class="d-none">Friends</h1>
						<img src="img/friends_logo.png" alt="Logo de Friends" class="img-fluid">
				</a>
			</div>
	
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
						    	<ul class="navbar-nav m-auto">
						    		<?php
										foreach ($navbar as $contenido => $datos):
											if($datos["visible"]):
						    		?>
							   		<li class="nav-item pl-1 <?=$contenido == $seccion ? "active" : ""; ?>">
							       		<a class="nav-link" href="index.php?seccion=<?= $contenido?>"><?= $datos["nombre"];?>
							       		</a>
							    	</li>

							    	<?php
											endif;
							    		endforeach;
							    	?>
		    					</ul>

								<form class="form-inline my-2 my-lg-0" action="index.php" method="GET">
									<input class="form-control" type="hidden" name="seccion" value="tienda"> 
									<input class="form-control mr-sm-2" type="search" name="buscar" value="<?=!empty($_GET["buscar"]) ? $_GET["buscar"] : "";?>" placeholder="Buscar" aria-label="Buscar">
									<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
								</form>
		  					</div>
							
							  <?php
							 	if(empty($_SESSION["usuario"])): 
							  ?>
							  <div class="collapse navbar-collapse" id="navbarSupportedContent">
						    	<ul class="navbar-nav ml-auto">
						    		<?php
										foreach ($links as $contenido => $datos):
						    		?>
							   		<li class="nav-item pl-1 <?=$contenido == $seccion ? "active" : ""; ?>">
							       		<a class="nav-link" href="index.php?seccion=<?= $contenido?>"><?= $datos["nombre"];?>
							       		</a>
							    	</li>

							    	<?php
							    		endforeach;
							    	?>
		    					</ul>
		  					</div>
							<?php
							endif;
							?>
							
							<?php
								if(!empty($_SESSION["usuario"])):
							?>
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav ml-auto mt-3">		
									<li class="nav-item mr-2">
										<p><strong><?=$_SESSION["usuario"]["usuario"]?></strong></p>
									</li>
									<li class="nav-item">
										<a class="nav-item" href="autenticacion/salir.php">Salir</a>
									</li>
									
								</ul>
							</div>
							<?php
								endif;
							?>		
					</nav>
		</div>
	</header>
<main>
	
	<?php
		if(!empty($_GET["estado"])){
			$estado = $_GET["estado"] == "ok" ? "success" : "danger";

			if(!empty($_GET["mensaje"])){
				$mensaje = $_GET["mensaje"];
				
				if(isset($errores[$seccion]) && array_key_exists($mensaje, $errores[$seccion])):
	?>

	<div class="alert alert-<?=$estado;?> alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
		<?=$errores[$seccion][$mensaje];?>
	</div>

	<?php
				unset($_SESSION["estado"]);
				unset($_SESSION["mensaje"]);	
				endif;
			}
		}
	?>

	<?php
		if(!empty($_GET["seccion"])){
        	$seccion = $_GET["seccion"];
            
				if(array_key_exists($seccion, $navbar)){
					require_once("secciones/$seccion.php");
				}
				else{
					require_once("secciones/404.php");
				}
        }else
            require_once("secciones/inicio.php");
	?>

</main>
<script src="js/jquery-3.4.1.js"></script>
<script src="js/bootstrap.bundle.js"></script>	
</body>
</html>