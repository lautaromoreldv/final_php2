<!DOCTYPE html>
<?php

require_once("../configs/configs.php");
require_once("../configs/arrays.php");
require_once("../configs/funcion.php");

if(empty($_SESSION["usuario"]) || $_SESSION["usuario"]["tipousuarios_id"] != 1){
	header("Location:../index.php?estado=error&mensaje=401");
    die();
}

$seccion = $_GET["seccion"] ?? "remeras";
?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Friends</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=ATRAS?>css/bootstrap.css">
    <link rel="stylesheet" href="<?=ATRAS?>css/estilo.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

</head>
<body>
	<header>
		<div class="barra">

			<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    				<span class="navbar-toggler-icon">
					</span>
  				</button>

			<div class="m-auto bg-white">
				<a href="index.php">
					<h1 class="d-none">Friends</h1>
						<img src="<?=ATRAS?>img/friends_logo.png" alt="Logo de Friends">
				</a>
			</div>
	
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav ml-auto">
								<?php
										foreach ($navbar2 as $contenido => $datos):
											if(!$datos["visible"])
												continue;
						    		?>
							   		<li class="nav-item pl-3 <?=$contenido == $seccion ? "active" : ""; ?>">
							       		<a class="nav-link" href="../panel/index.php?seccion=<?= $contenido?>"><?= $datos["nombre"];?>
							       		</a>
							    	</li>

							    	<?php
							    		endforeach;
									?>
								
							</div>
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
					</nav>
		</div>
	</header>
<main>
	
<?php
		if(!empty($_GET["estado"])){
			$estado = $_GET["estado"] == "ok" ? "success" : "danger";

			if(!empty($_GET["mensaje"])){
				$mensaje = $_GET["mensaje"];
				
				if(isset($errores_panel[$seccion]) && array_key_exists($mensaje, $errores_panel[$seccion])):
	?>

	<div class="alert alert-<?=$estado;?> alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
		<?=$errores_panel[$seccion][$mensaje];?>
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
			
				if(array_key_exists($seccion, $navbar2)){
					require_once("secciones/$seccion.php");
				}
				else{
					require_once("secciones/404.php");
				}
		}else
			require_once("secciones/remeras.php");
	?>

</main>
<script src="<?=ATRAS?>js/jquery-3.4.1.js"></script>
<script src="<?=ATRAS?>js/bootstrap.bundle.js"></script>	
</body>
</html>