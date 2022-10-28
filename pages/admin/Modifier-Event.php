
<?php
if(isset($_POST['modifier'])){
    $_SESSION['id']=$_POST['modifier'];
}
    $event = EventBaseDonnee::getEventById($_SESSION['id']);
if(isset($_POST['modifier_event'])){
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
                    $img_upload_path = './images/event/'.$new_img_name;
                    move_uploaded_file($tmp_name,$img_upload_path);

                
                    $data['img']=$new_img_name;
                    $data['title']=$_POST['title'];
                    $data['date_event']=$_POST['date'];
                    $data['time_event']=$_POST['time'];
                    $data['local_event']=$_POST['location'];
                    $data['description_event']=$_POST['dsc'];
                    

                    

                    EventBaseDonnee::modifierEvent($_SESSION['id'],$data);
                    Redirect::toAdmin_Calendrier();
                
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
        <div class="card evenement-form mx-auto my-5" style="border-radius: 20px;">
            <div class="card-body my-3">
                <div class="card-text">
                    <form action="" class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
                            <div class="head">
                                <h1 class="text-center fw-bold">Modifier une événement</h1>
                            </div>
                            <div class="inputs">
                                    <div class="side1">
                                            <div class="form-group">
                                                <label for="title" class="title" >Title *</label>
                                                <input type="text" class="form-control form-control-sm" id="title" name="title" value="<?php echo $event[0]['title']?>" required>
                                            </div>
                                       
                                            <div class="form-group">
                                                <label for="date" class="title" >Date *</label>
                                                <input type="date" class="form-control form-control-sm" id="date" name="date" value="<?php echo $event[0]['date_event']?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="time" class="title" >Time *</label>
                                                <input type="text" class="form-control form-control-sm" id="time" name="time" value="<?php echo $event[0]['time_event']?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="location" class="title" >Location *</label>
                                                <input type="text" class="form-control form-control-sm" id="location" name="location" value="<?php echo $event[0]['local_event']?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="image" class="title" >Image *</label>
                                                <input type="file" class="form-control form-control-sm" id="image" name="image"  required>
                                            </div>
   
                                    </div>
                                    <div class="side2 mt-3">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"  name="dsc" required><?php echo $event[0]['description_event']?></textarea>
                                                <label for="floatingTextarea2">description</label>
                                            </div>
                                    </div>
                            </div>
                            
                            
                            

                            <div class="row justify-content-center mt-4">
                                <button class="btn btn-primary" type="submit" name="modifier_event">Modifier</button> 
                            </div>
                            
        
                            
                        

                        
                        
                    </form>
                </div>
            </div>
        </div>
        </div>
</section>