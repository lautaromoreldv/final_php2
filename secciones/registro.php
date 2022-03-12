<section id="info" class="bg-light"> 
    <article class="container">  
    <h2 class="pt-4">Registrate</h2>
      <form action="autenticacion/registrarse.php" method="POST">
        <div class="row">
          <div class="form-group col-6 mt-3">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="nombre" placeholder="Escriba su nombre">
          </div>
          <div class="form-group col-6 mt-3">
            <label for="nombre">Apellido</label>
            <input type="text" class="form-control" name="apellido" id="apellido" aria-describedby="nombre" placeholder="Escriba su apellido">
          </div>
        
          <div class="form-group col-6">
            <label for="nombre">Email</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="email" placeholder="Escriba email">
          </div>

          <div class="form-group col-6">
            <label for="exampleInputPassword1">Contraseña</label>
            <input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Escriba su contraseña">
          </div>
          </div>

          <div class="form-group">
            <label for="usuario">Nombre de usuario</label>
            <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="usuario" placeholder="Escriba su nombre de usuario">
          </div>
    
          <button type="submit" class="btn btn-primary mt-2">Registrarse</button>
      </form>    
        
        <div class="mt-4 pb-3">
            <p>Ya tengo una cuenta
            <a href="index.php?seccion=login">Iniciar sesión</a>
            </p>
        </div>
        </div>
    </article>
</section>