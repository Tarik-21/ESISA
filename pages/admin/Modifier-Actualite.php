<?php
if(isset($_POST['modifier'])){
    $_SESSION['id']=$_POST['modifier'];
}
    $item = ActualiteBaseDonnee::getActualiteById($_SESSION['id']);
    if(isset($_POST['modifier_act'])){
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
                    $img_upload_path = './images/actualite/'.$new_img_name;
                    move_uploaded_file($tmp_name,$img_upload_path);

                
                    $data['img']=$new_img_name;
                    $data['titre']=$_POST['title'];
                    $data['date_article']=date("Y/m/d");
                    $data['description_actualite']=$_POST['desc'];
                    $data['article']=$_POST['artcile'];
                    $data['id']=$_SESSION['id'];

                    ActualiteBaseDonnee::updateActualite($data);
                    Redirect::toAdmin_Actualite();

                    

                
                }else{
                    $em = "jpg, jpeg ou png";
                }
            
        }else{
            $em = "erreur peut-etre la taille du ficher est grande";
        }
    
    }
?>
<section>
        <div class="card inscription-form mx-auto my-5" style="border-radius: 20px;">
            <div class="card-body my-3">
                <div class="card-text">
                    
                
                    <form action="" class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-5">
                                <div class="form-group">
                                    <label for="title" class="title" >Titre *</label>
                                    <input type="text" class="form-control form-control-sm" id="title" name="title" value="<?php echo $item[0]['titre']?>" required>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <div class="form-group">
                                    <label for="image" class="title" >Image *</label>
                                    <input type="file" class="form-control form-control-sm" id="image" name="image"  required>
                                </div>
                            </div>
                        </div>
    
        
                        <div class="row justify-content-center mt-3">
                            <div class="form-floating" style="width: 60%;">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="desc" required><?php echo $item[0]['description_actualite']?></textarea>
                                <label for="floatingTextarea2">description</label>
                            </div>
                        </div>
                        <div class="row justify-content-center my-3">
                            <div class="form-floating" style="width: 80%;">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px" name="artcile" required><?php echo $item[0]['article']?></textarea>
                                <label for="floatingTextarea2">Article</label>
                            </div>
                        </div>
        
        
                            
                        

                        <div class="row justify-content-center">
                            <button class="btn btn-primary" type="submit" name="modifier_act">Modifer</button> 
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </section>