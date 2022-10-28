<?php
    $annonces = AnnoncesBaseDonnee::getAll();
    if(isset($_POST['delete'])){
        AnnoncesBaseDonnee::deleteAnnonce($_POST['delete']);
        Redirect::toAdmin_Annonces();
    }

?>

<section class="pages">
      <div class="page">
        <div class="table mt-4">
        <form action="Ajouter-Annoce" method="POST">
          <button class="btn btn-primary btn-sm mb-1 button-decor" name="ajouter">
            <i class="fas fa-megaphone"></i> Ajouter une Annonces
          </button>
      </form>
        <table class="ccna">
                    <tr class="text-center">
                        <th>Title</th>
                        <th>Annonce</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($annonces as $annonce):?>
                    <tr>
                        <td><?php echo $annonce['Title']?></td>
                        <td>
                            <div class="d-flex flex-row justify-content-center">
                                <img src="./images/annonces/<?php echo $annonce['image_path']?>" alt="img" width="60%" height="200">
                            </div>
                            
                        </td>
                        <td>
                            <div class="d-flex flex-row justify-content-center">
                            <form action="" method="POST" class="me-2">
                        <button type="submit" name="delete" class="btn btn-danger btn-sm" value="<?php echo $annonce['id']?>">
                                Supprimer
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