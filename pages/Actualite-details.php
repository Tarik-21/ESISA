<?php
if(isset($_POST['submit'])){
  $_SESSION['id_act']=$_POST['submit'];
}
$item = ActualiteBaseDonnee::getActualiteById($_SESSION['id_act']);

?>

<section class="header">
      <div class="title">
        <h1 class="heading mb-3">Actualités</h1>
      </div>
</section>
<section class="content my-5">
        <div class="container">
            <div class="row">
                <img src="./images/actualite/<?php echo $item[0]['img']?>" alt="">
                <h2 class="mt-3"><?php echo $item[0]['titre']?></h2>
                <p><?php echo $item[0]['article']?></p>
            </div>
        </div>
</section>
    