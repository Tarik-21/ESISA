<?php 
    if(isset($_POST['supprimer'])){
        ActualiteBaseDonnee::deleteActualite($_POST['supprimer']);
        Redirect::toAdmin_Actualite();
    }
?>
<section class="pages">
      <div class="page">
        <div class="table mt-4">
        <form action="Ajouter-Actualite" method="POST">
          <button class="btn btn-primary btn-sm mb-1 button-decor" name="ajouter-event">
          <i class="far fa-plus"></i> Ajouter une nouvelle actualité
          </button>
        </form>
        <table class="ccna">
                    <tr class="text-center">
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Article</th>
                        <th>Action</th>
                        
                    </tr>
                    <?php
                        $items = ActualiteBaseDonnee::getAll();
                        foreach($items as $item):
                    ?>
                    <tr>
                        <td>
                            <?php echo $item['titre'];?>
                        </td>
                        <td>
                            <?php echo $item['description_actualite'];?>
                        </td>
                        <td>
                            <div class="d-flex flex-row justify-content-center">
                                <img src="./images/actualite/<?php echo $item['img'];?>" alt="img" width="60%" height="200">
                            </div>
                        </td>
                        <td>
                            <?php echo $item['article'];?>
                        </td>
                        <td>
                            <div class="d-flex flex-row justify-content-center">
                                <form action="" method="POST">
                                <button class="btn btn-primary btn-sm mb-1 button-decor-red" name="supprimer" value="<?php echo $item['id']?>">
                                    Supprimer  
                                </button>
                                </form>
                                <form action="Modifier-Actualite" method="POST">
                                <button class="btn btn-primary btn-sm mb-1 button-decor" name="modifier" value="<?php echo $item['id']?>">
                                    Modifier  
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