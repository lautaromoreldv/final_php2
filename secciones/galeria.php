<section id="info"> 
  <article class="bg-light">  

    <div class="container pb-5">
      <div class="pt-4 pb-4">
      <h2>Temporadas de la serie</h2>
      </div>
          <div class="row">
          <?php
            for ($i=0; $i < count($temporadas); $i++):
          ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 pb-4 h-100 d-flex">
                  
              <div class="card">
                    <img class="card-img-top" src="<?= IMG_temporadas?>/<?= $temporadas[$i]['2'] ?>" 
                            alt="<?= $temporadas[$i][0]?>">
                          
                            <div class="card-body">
                              <h3 class="text-center tituloachicar"><?= $temporadas[$i][0]?></h3>
                                <p class="text-center"><?= $temporadas[$i][1]?> capítulos</p>
                                
                            </div>              
              </div>    
            </div>
          <?php
            endfor;
          ?>             
          </div>
    </div>
  
  </article>
</section>