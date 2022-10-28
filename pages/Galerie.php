<?php
    $albums = GalerieBaseDonnee::getAllAlbum();
?>

<section class="header">
      <div class="title">
        <h1 class="heading mb-3">GALERIE</h1>
      </div>
</section>
<section class="mx-auto my-3 galerie">
    <div class="row justify-content-center">
        <?php foreach($albums as $album):?>
        <div class="col-lg-4 col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="text-center"><?php echo $album['Title'];?></h5>
                    </div>
                    <img src="./images/galerie/<?php echo $album['Image_profiel']?>" alt="" class="rounded-3" height="200">
                    <div class="row justify-content-center">
                    <form action="Album" class="text-center" method="POST">
                        <button class="btn btn-primary" type="submit" name="plus" value="<?php echo $album['id_album']?>">Voir plus</button>
                        <input type="hidden" name="title" value="<?php echo $album['Title'];?>">
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
        <!--
        <div class="col-lg-4 col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="text-center">Soirée de gala DOUZI - 2016</h5>
                    </div>
                    <img src="./images/2(1).jpg" alt="" class="rounded-3" height="200">
                    <div class="row justify-content-center">
                    <a href="http://localhost/ESISA/Dozi-event" class="text-center"><button class="btn btn-primary">Voir plus</button></a>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="text-center">Soirée de fin d'année - 2015</h5>
                    </div>
                    <img src="./images/2(2).jpg" alt="" class="rounded-3" height="200">
                    <div class="row justify-content-center">
                        <a href="http://localhost/ESISA/Saida-event" class="text-center"><button class="btn btn-primary">Voir plus</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="text-center">Cérémonie de remise des diplômes - 2018</h5>
                    </div>
                    <img src="./images/28.jpg" alt="" class="rounded-3" height="200">
                    <div class="row justify-content-center">
                        <a href="http://localhost/ESISA/remise-diplome" class="text-center"><button class="btn btn-primary">Voir plus</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="text-center">Activités Parascolaires</h5>
                    </div>
                    <img src="./images/110.jpg" alt="" class="rounded-3" height="200">
                    <div class="row justify-content-center">
                        <a href="http://localhost/ESISA/Activite-para" class="text-center"><button class="btn btn-primary">Voir plus</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="text-center">Conférence Internationale NDIDO 2017</h5>
                    </div>
                    <img src="./images/1 (1).jpg" alt="" class="rounded-3" height="200">
                    <div class="row justify-content-center">
                        <a href="http://localhost/ESISA/ndido" class="text-center"><button class="btn btn-primary">Voir plus</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="text-center">Relations Entreprises</h5>
                    </div>
                    <img src="./images/1 (2).jpg" alt="" class="rounded-3" height="200">
                    <div class="row justify-content-center">
                        <a href="http://localhost/ESISA/relations-entreprises" class="text-center"><button class="btn btn-primary">Voir plus</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="text-center">Compétition annuelle « Public Speaking »</h5>
                    </div>
                    <img src="./images/2 (1).jpg" alt="" class="rounded-3" height="200">
                    <div class="row justify-content-center">
                        <a href="http://localhost/ESISA/Public-Speaking" class="text-center"><button class="btn btn-primary">Voir plus</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="text-center">Les Forums Etudiants</h5>
                    </div>
                    <img src="./images/2 (2).jpg" alt="" class="rounded-3" height="200">
                    <div class="row justify-content-center">
                    <a href="http://localhost/ESISA/forum" class="text-center"><button class="btn btn-primary">Voir plus</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="text-center">Moroccan Collegiate Programming Contest</h5>
                    </div>
                    <img src="./images/1 (3).jpg" alt="" class="rounded-3" height="200">
                    <div class="row justify-content-center">
                    <a href="http://localhost/ESISA/mcc" class="text-center"><button class="btn btn-primary">Voir plus</button></a>
                    </div>
                </div>
            </div>
        </div>
        -->
    </div>
</section>
