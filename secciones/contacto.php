<aside>
<div class="bg-light">
<div class="container">
  <h2 class="pt-4">Formulario de contacto</h2>
  <p>Complete el formulario</p>
<div class="row justify-content-center">  
  <div class="col-md-10 col-lg-8">
    
        <form action="acciones/enviar_contacto.php" method="post" enctype="multipart/form-data" name="form">
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Escriba su nombre..." autocomplete="off"> 
              </div>

              <div class="form-group">
                <label for="apellido">Apellido</label>
                <input class="form-control" type="text" name="apellido" id="apellido" placeholder="Escriba su apellido..." autocomplete="off">
              </div>

              <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Escriba su e-mail..." autocomplete="off">
              </div>

            <?php
              if(!empty($_SESSION["usuario"])):
            ?> 
              <h3>Elija cuales fueron para usted los mejores capítulos</h3>
              <p>Al enviar este formulario se sorteran remeras, entradas para visitar Central Perk y objetos íconicos de la serie.</p>
              <div class="custom-control custom-checkbox">
              <input type="checkbox" value="El del apagón T1E7" name="checkbox[]" class="custom-control-input" id="El del apagón T1E7">
              <label class="custom-control-label" for="El del apagón T1E7"><b>El del apagón T1E7.</b></label>
              <p>Chandler, que se queda atrapado en el vestíbulo de un cajero automático con Jill Goodacre, la modelo de Victoria’s Secret.</p>
            </div>

            <div class="custom-control custom-checkbox">
              <input type="checkbox" value="El de cuando Eddie no quiere irse T2E19" name="checkbox[]" class="custom-control-input" id="El de cuando Eddie no quiere irse T2E19">
              <label class="custom-control-label" for="El de cuando Eddie no quiere irse T2E19"><b>El de cuando Eddie no quiere irse T2E19.</b></label>
              <p>El papel de Adam Goldberg como el psicótico compañero temporal de Chandler resulta genial. Además, la estatua cerámica con forma de galgo de Joey (más tarde conocida como Pat) hace su primera aparición.</p>
            </div>

            <div class="custom-control custom-checkbox">
              <input type="checkbox" value="El del gran instrumento punzante T3E8" name="checkbox[]" class="custom-control-input" id="El del gran instrumento punzante T3E8">
              <label class="custom-control-label" for="El del gran instrumento punzante T3E8"><b>El del gran instrumento punzante T3E8.</b></label>
              <p>Este capítulo incluye a tres de los clásicos de Friends: una Janice más nasal que nunca, Phoebe más delirante que nunca y muchas miradas hacia el Tipo Feo y Desnudo.</p>
            </div>

            <div class="custom-control custom-checkbox">
              <input type="checkbox" value="El de todos los vestidos de novia T4E20" name="checkbox[]" class="custom-control-input" id="El de todos los vestidos de novia T4E20">
              <label class="custom-control-label" for="El de todos los vestidos de novia T4E20"><b>El de todos los vestidos de novia T4E20.</b></label>
              <p>Si no puedes juntarte con tus amigas físicamente, ver a Phoebe, Monica y Rachel bebiéndose unas cervezas y comiendo palomitas con vestidos de los 90 absolutamente horrendos es la siguiente mejor cosa que puedes hacer.</p>
            </div>

            <div class="custom-control custom-checkbox">
              <input type="checkbox" value="El de todas las promesas T5E11" name="checkbox[]" class="custom-control-input" id="El de todas las promesas T5E11">
              <label class="custom-control-label" for="El de todas las promesas T5E11"><b>El de todas las promesas T5E11.</b></label>
              <p>Ross tiene una cita con una chica llamada Elizabeth Hornswoggle mientras lleva unos pantalones de cuero.</p>
            </div>

            <div class="custom-control custom-checkbox">
              <input type="checkbox" value="El de la proposición: partes 1 y 2, T6E24,E25" name="checkbox[]" class="custom-control-input" id="El de la proposición: partes 1 y 2, T6E24,E25">
              <label class="custom-control-label" for="El de la proposición: partes 1 y 2, T6E24,E25"><b>El de la proposición: partes 1 y 2, T6E24,E25.</b></label>
              <p>El triángulo amoroso entre Chandler, Monica y Richard se pone todo lo dramático que puede ponerse en Friends, pero esos pocos momentos de tensión merecen la pena al ver la lacrimógena proposición de Monica a la luz de las velas </p>
            </div>

            <div class="custom-control custom-checkbox">
              <input type="checkbox" value="El de las tartas de queso T7E11" name="checkbox[]" class="custom-control-input" id="El de las tartas de queso T7E11">
              <label class="custom-control-label" for="El de las tartas de queso T7E11"><b>El de las tartas de queso T7E11.</b></label>
              <p>Rachel y Chandler devorando tartas de queso de Mama’s Little Bakery. Puntos extra por el momento tan tierno entre Phoebe y Joey al acabar el episodio, después de que David vuelva a marcharse a Minsk.</p>
            </div>

            <div class="custom-control custom-checkbox">
              <input type="checkbox" value="El de cuando Chandler se da un baño T8E13" name="checkbox[]" class="custom-control-input" id="El de cuando Chandler se da un baño T8E13">
              <label class="custom-control-label" for="El de cuando Chandler se da un baño T8E13"><b>El de cuando Chandler se da un baño T8E13.</b></label>
              <p>En este episodio vemos cómo Chandler trata de navegar su torbellino emocional estando en horizontal dentro de una bañera con un barco de plástico de juguete.</p>
            </div>

            <div class="custom-control custom-checkbox">
              <input type="checkbox" value="El de los tiburones T9E4" name="checkbox[]" class="custom-control-input" id="El de los tiburones T9E4">
              <label class="custom-control-label" for="El de los tiburones T9E4"><b>El de los tiburones T9E4.</b></label>
              <p>Monica está convencida de que a Chandler le ponen los tiburones blancos, Ross finge ser Vikram, el exnovio diseñador de cometas imaginario de Phoebe y Joey se olvida de con quién se ha acostado… todo un clásico.</p>
            </div>

            <div class="custom-control custom-checkbox">
              <input type="checkbox" value="El de la boda de Phoebe T10E12" name="checkbox[]" class="custom-control-input" id="El de la boda de Phoebe T10E12">
              <label class="custom-control-label" for="El de la boda de Phoebe T10E12"><b>El de la boda de Phoebe T10E12.</b></label>
              <p>La boda de Phoebe es el final emotivo que Friends se merecía, porque si alguien se merecía un final feliz, esa era Phoebs.</p>
            </div>
            <?php
              endif;
            ?>  
              <div class="form-group mt-4">
                <label for="comentario">Deje su comentario</label>
                <textarea class="form-control" name="comentario" id="comentario" cols="30" rows="5"></textarea>
              </div>
              <button type="submit" value="enviar" name="enviar" class="mb-5 btn btn-dark btn-block">Enviar</button>
      </form>

</div>
</div>
</div>
</div>
</aside>