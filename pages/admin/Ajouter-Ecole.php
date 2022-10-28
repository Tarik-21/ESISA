<?php
    if(isset($_POST['ajouter'])){
        $data['id_ecole']=$_POST['id_ecole'];
        $data['ecole']=$_POST['ecole'];
        $data['annee']=$_POST['annee'];
        EtudiantAdmisFranceDB::createEcole($data);
        Redirect::toAdmin_etudiantAdmisEnFrance();
    }
?>

<section class="pages">
        <div class="page">
        <div class="card inscription-form mx-auto my-5" style="border-radius: 20px;">
            <div class="card-body my-3">
                    <?php
                        /*if(isset($_POST['ajouter']) && $em!=""){
                            echo '<div class="alert alert-danger" role="alert">'.$em.'</div>';
                        }*/
                    ?>
                <div class="card-text">
                    <form action="" class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
                        <div class="row justify-content-center">
                            <div class="head">
                                <h1 class="text-center fw-bold">Ajouter une Ecole</h1>
                            </div>
                            
                            <div class="col-lg-5 col-md-5">
                                <div class="form-group">
                                    <label for="ecole" class="title" >Ecole *</label>
                                    <input type="text" class="form-control form-control-sm" id="ecole" name="ecole"  required>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <div class="form-group">
                                    <label for="id_ecole" class="title" >Id Ecole*</label>
                                    <input type="text" class="form-control form-control-sm" id="id_ecole" name="id_ecole"  required>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <div class="form-group">
                                    <label for="annee" class="title" >Annnée *</label>
                                    <input type="text" class="form-control form-control-sm" id="annee" name="annee"  required>
                                </div>
                            </div>

                            <div class="row justify-content-center mt-4">
                                <button class="btn btn-primary" type="submit" name="ajouter">Ajouter</button> 
                            </div>
                            
                        </div>
        
                            
                        

                        
                        
                    </form>
                </div>
            </div>
        </div>
        </div>
</section>