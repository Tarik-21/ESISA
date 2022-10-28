<?php
    $em="";
    if(isset($_POST['sauvegarder']) && isset($_FILES['image'])){
        $img_name = $_FILES['image']['name'];
        $img_size = $_FILES['image']['size'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $error = $_FILES['image']['error'];
        
        if($error===0){
                $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg","jpeg","png");

                if(in_array($img_ex_lc,$allowed_exs)){
                    $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                    $img_upload_path = './images/annonces/'.$new_img_name;
                    move_uploaded_file($tmp_name,$img_upload_path);

                
                    $data['title']=$_POST['title'];
                    $data['image_path']=$new_img_name;

                    AnnoncesBaseDonnee::addAnnonce($data);
                    Redirect::toAdmin_Annonces();
                
                }else{
                    $em = "jpg, jpeg ou png";
                }
            
        }else{
            $em = "erreur peut-etre la taille du ficher est grande";
        }
    }

?>



<section class="pages">
        <div class="page">
        <div class="card inscription-form mx-auto my-5" style="border-radius: 20px;">
            <div class="card-body my-3">
                    <?php
                        if(isset($_POST['sauvegarder']) && $em!=""){
                            echo '<div class="alert alert-danger" role="alert">'.$em.'</div>';
                        }
                    ?>
                <div class="card-text">
                    <form action="" class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
                        <div class="row justify-content-center">
                            <div class="head">
                                <h1 class="text-center fw-bold">Ajouter une Annonce</h1>
                            </div>
                            
                            <div class="col-lg-5 col-md-5">
                                <div class="form-group">
                                    <label for="title" class="title" >Title *</label>
                                    <input type="text" class="form-control form-control-sm" id="title" name="title"  required>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <div class="form-group">
                                    <label for="image" class="title" >Image *</label>
                                    <input type="file" class="form-control form-control-sm" id="image" name="image"  required>
                                </div>
                            </div>

                            <div class="row justify-content-center mt-4">
                                <button class="btn btn-primary" type="submit" name="sauvegarder">Sauvegarder</button> 
                            </div>
                            
                        </div>
        
                            
                        

                        
                        
                    </form>
                </div>
            </div>
        </div>
        </div>
</section>