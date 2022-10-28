<?php 
    if(isset($_POST['acceder'])){
        $_SESSION['id_ecole']=$_POST['acceder'];
    }
    if(isset($_POST['ajouter'])){
        $data['nom']=$_POST['nom'];
        $data['filiere']=$_POST['filiere'];
        EtudiantAdmisFranceDB::addEtudiant($_SESSION['id_ecole'],$data);
        Redirect::toAdmin_AdminEtudiant();
    }
    $etudiants = EtudiantAdmisFranceDB::getAllEtudiant($_SESSION['id_ecole']);
    if(isset($_POST['supprimer'])){
        EtudiantAdmisFranceDB::deleteEtudiant($_SESSION['id_ecole'],$_POST['supprimer']);
        Redirect::toAdmin_AdminEtudiant();



    }
?>

<section class="pages">
      <div class="page">
        <div class="table mt-4">
        <form action="" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="row">
                        <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="nom" class="tw-bold" >Nom et Prénom*</label>
                                    <input type="text" class="form-control form-control-sm" id="nom" name="nom" required>

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="filiere" class="tw-bold" >Filiere *</label>
                                    <input type="text" class="form-control form-control-sm" id="filiere" name="filiere" required>
                                </div>
                            </div>

                    <div class="col-lg-4 mt-3">
                        <button class="btn btn-primary button-decor" type="submit" name="ajouter">Ajouter</button> 
                    </div>
            </div>
            
        </form>
        <table class="ccna">
                    <tr class="text-center">
                        <th>Nom</th>
                        <th>Filiere</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($etudiants as $etudiant):?>
                    <tr>
                        <td><?php echo $etudiant['Nom']?></td>
                        <td><?php echo $etudiant['filiere']?></td>
                        <td>
                            <div class="d-flex flex-row justify-content-center">
                                <form action="" method="POST">
                                <button class="btn btn-primary btn-sm mb-1 button-decor-red" name="supprimer" value="<?php echo $etudiant['id_etudiant']?>">
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