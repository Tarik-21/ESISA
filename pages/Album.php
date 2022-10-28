<?php
    if(isset($_POST['plus'])){
        $_SESSION['id_album'] = $_POST['plus'];
        $_SESSION['title_album'] = $_POST['title'];
    }
?>

<section class="header">
      <div class="title">
        <h1 class="heading mb-3"><?php echo $_SESSION['title_album']?></h1>
      </div>
</section>

<!--
<section class="videos my-4">
    <div class="container-fluid">
        <div class="row justify-content-center">         
            <iframe width="560" height="400" src="https://www.youtube.com/embed/WbQF0eD9zHA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <iframe width="560" height="400" src="https://www.youtube.com/embed/Q0ReeNR0PJE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>            
        </div>
    </div>
</section>
            -->
<section class="album">
    <div class="container">
        <div class="row justify-content-center">
            <?php $images = GalerieBaseDonnee::getAllImagees($_SESSION['id_album']); 
            foreach($images as $image):?>
            <div class="col-lg-4 col-md-5">
                <img src="./images/galerie/<?php echo $image['images']?>" alt="img" class="image-style myImg">
            </div>
            <?php endforeach;?>
        </div>
    </div>

</section>