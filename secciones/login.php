<section id="info" class="bg-light"> 
  <article class="container">  
  <h2 class="pt-4">Inicia sesión</h2>
    <form action="autenticacion/loguearse.php" method="POST">
    <div class="row">    
      <div class="form-group pt-3 col-12 col-md-8 col-lg-6">
        <label for="usuario">Usuario o email</label>
        <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="emailHelp" placeholder="Ingresar usuario o email" autocomplete="off">
      </div>
    </div>

    <div class="row">  
      <div class="form-group col-12 col-md-8 col-lg-6">
        <label for="contraseña">Contraseña</label>
        <input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Ingrese su contraseña" autocomplete="off">
      </div>
    </div>  

      <div class="row">
        <button type="submit" class="btn btn-primary ml-3 mt-2 mb-4">Ingresar</button>
      </div> 
    </form>

    <div class="mt-2">
            <p>No tengo cuenta
            <a href="index.php?seccion=registro">Crear cuenta</a>
            </p>
        </div>

    <div class="pb-3">
            <p>Olvidé mi contraseña
            <a href="index.php?seccion=registro">Recuperar contraseña</a>
            </p>
        </div>
  </article>   
</section>