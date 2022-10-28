<?php
    $albums = GalerieBaseDonnee::getAllAlbum();
    if(isset($_POST['supprimer'])){
        GalerieBaseDonnee::deleteAlbum($_POST['supprimer']);
        Redirect::toAdmin_Galerie();
    }
?>

<section class="pages">
      <div class="page">
        <div class="table mt-4">
        <form action="Ajouter-Album" method="POST">
          <button class="btn btn-primary btn-sm mb-1 button-decor" name="ajouter-album">
          <i class="fas fa-images"></i> Ajouter un album 
          </button>
      </form>
        <table class="ccna">
                    <tr class="text-center">
                        <th>Id</th>
                        <th>Titre</th>
                        <th>Image de Profiel</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($albums as $album):?>
                    <tr>
                        <td><?php echo $album['id_album'];?></td>
                        <td><?php echo $album['Title'];?></td>
                        <td>
                            <div class="d-flex flex-row justify-content-center">
                                <img src="./images/galerie/<?php echo $album['Image_profiel']?>" alt="img" width="60%" height="200">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-row justify-content-center">
                                <form action="" method="POST">
                                <button class="btn btn-primary btn-sm mb-1 button-decor-red" name="supprimer" value="<?php echo $album['id_album'];?>">
                                    Supprimer  
                                </button>
                                </form>
                                <form action="Admin-Album" method="POST">
                                <button class="btn btn-primary btn-sm mb-1 button-decor" name="acceder" value="<?php echo $album['id_album'];?>">
                                <i class="fas fa-sign-in-alt"></i> Accéder  
                                </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                  
                </table>
                
        </div>
      </div>
</section>