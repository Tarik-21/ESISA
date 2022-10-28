<?php
    $ecoles = EtudiantAdmisFranceDB::getAllEcoles();
    if(isset($_POST['delete'])){
      EtudiantAdmisFranceDB::deleteEcole($_POST['delete']);
      Redirect::toAdmin_etudiantAdmisEnFrance();
    }
?>

  <section class="pages">
      <div class="page">
        <div class="table mt-4">
        <form action="Ajouter-Ecole" method="POST">
          <button class="btn btn-primary btn-sm mb-1 button-decor">
          <i class="fas fa-plus"></i> Ajouter une Ecole
          </button>
      </form>
        <table class="ccna">
                    <tr class="text-center">
                        <th>Id Ecole</th>
                        <th>Ecole</th>
                        <th>Annee</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($ecoles as $ecole):?>
                    <tr>
                        <td><?php echo $ecole['id_ecole']?></td>
                        <td><?php echo $ecole['ecole']?></td>
                        <td><?php echo $ecole['annee']?></td>
                        <td class="d-flex flex-row justify-content-evenly">
                        <form action="" method="POST">
                        <button type="submit" name="delete" class="btn btn-danger btn-sm button-decor-red" value="<?php echo $ecole['id_ecole'];?>">
                                Supprimer
                        </button>
                        </form>
                        <form action="Admin-Etudiant" method="POST">
                                <button class="btn btn-primary btn-sm mb-1 button-decor" name="acceder" value="<?php echo $ecole['id_ecole'];?>">
                                <i class="fas fa-sign-in-alt"></i> Accéder  
                                </button>
                        </form>

                        </td>
                    </tr>
                    <?php endforeach;?>
                  
                </table>
                
        </div>
      </div>
</section>