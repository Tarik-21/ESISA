<section class="header">
      <div class="title">
        <h1 class="heading mb-3">Actualités</h1>
      </div>
</section>
<section class="actualite my-3">
    <div class="container">
      <div class="row justify-content-center">
        <?php $items = ActualiteBaseDonnee::getAll();
              foreach($items as $item):
        ?>
        <div class="col-lg-4 col-md-6">
          <div class="act_item">
            <div class="act_bar"></div>
            <div class="act_content">
              <div class="act_image">
                <img src="./images/actualite/<?php echo $item['img']?>" alt="">
              </div>
              <div class="act_date">
                <?php echo $item['date_article']?>
              </div>
              <div class="act_title">
                <form action="Actualite-details" method="POST">
                  <button class="mb-3" type="submit" value="<?php echo $item['id']?>" name="submit"><?php echo $item['titre']?></button>
                </form>
                
              </div>
              <div class="act_desc">
                <?php echo $item['description_actualite']?>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach;?>
      </div>
    </div>
  </section>