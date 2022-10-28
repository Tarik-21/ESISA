<?php
    $em="";
    if(isset($_POST['acceder'])){
        $_SESSION['id_album']=$_POST['acceder'];
    }
    if(isset($_POST['ajouter'])){
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
                    $img_upload_path = './images/galerie/'.$new_img_name;
                    move_uploaded_file($tmp_name,$img_upload_path);

                

                    GalerieBaseDonnee::addImage($_SESSION['id_album'],$new_img_name);
                
                }else{
                    $em = "jpg, jpeg ou png";
                }
            
        }else{
            $em = "erreur peut-etre la taille du ficher est grande";
        }
    }

    if(isset($_POST['supprimer'])){
        GalerieBaseDonnee::deleteImage($_SESSION['id_album'],$_POST['supprimer']);
        
    }
    
?>

<section class="pages">
      <div class="page">
        <div class="table mt-4">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                    <div class="col-lg-2 col-md-5">
                        <label for="image" class="title fw-bold ms-2" >Ajouter une Image *</label>
                    </div>
                    <div class="col-lg-5 col-md-2">
                        <input type="file" class="form-control form-control-sm" id="image" name="image"  required>
                    </div>

                    <div class="col-lg-4">
                        <button class="btn btn-primary button-decor" type="submit" name="ajouter">Ajouter</button> 
                    </div>
            </div>
            
        </form>
        <?php
                        if(isset($_POST['ajouter']) && $em!=""){
                            echo '<div class="alert alert-danger" role="alert">'.$em.'</div>';
                        }
                    ?>
        <table class="ccna">
                    <tr class="text-center">
                        <th>Images</th>
                        <th>Action</th>
                    </tr>
                    <?php $images = GalerieBaseDonnee::getAllImagees($_SESSION['id_album']);
                    foreach($images as $image):?>
                    <tr>
                        <td>
                        <div class="d-flex flex-row justify-content-center">
                                <img src="./images/galerie/<?php echo $image['images']?>" alt="img" width="60%" height="200">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-row justify-content-center">
                                <form action="" method="POST">
                                <button class="btn btn-primary btn-sm mb-1 button-decor-red" name="supprimer" value="<?php echo $image['id_image']?>">
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