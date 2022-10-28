<?php
    if(isset($_POST['submit'])){
        $data= array("nom"=>$_POST['nom'],"prenom"=>$_POST['prenom'],"date_naissance"=>$_POST['date_naissance'],"genre"=>$_POST['genre'],
                    "email"=>$_POST['email'],"cin"=>$_POST['cin'],"telephone"=>$_POST['telephone'],"adresse"=>$_POST['adresse'],"lycee"=>$_POST['lycee'],
                    "bac_num"=>$_POST['bac_num'],"type_bac"=>$_POST['type_bac'],"filiere"=>$_POST['filiere'],"mm"=>$_POST['mm'],"mf"=>$_POST['mf'],"ml"=>$_POST['ml']);
                    $to= "tarikmouhouch9@gmail.com";
                    $subject="nouveau Pre-inscription";
                    $nom=$_POST['nom'];
                    $prenom=$_POST['prenom'];
                    $date_naissance = $_POST['date_naissance'];
                    $cin=$_POST['cin'];
                    $adresse = $_POST['adresse'];
                    $lycee=$_POST['lycee'];
                    $baccalaureat_num=$_POST['bac_num'];
                    $baccalaureat_type=$_POST['type_bac'];
                    $filiere=$_POST['filiere'];
                    $mm=$_POST['mm'];
                    $mf=$_POST['mf'];
                    $ml=$_POST['ml'];
                    $telephone=$_POST['telephone'];
                    $email=$_POST['email'];

                    //sent to mail
                $mail = new PHPMailer;
                
                //$mail->SMTPDebug = 3;                               // Enable verbose debug output
                
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = EMAILID;                // SMTP username
                $mail->Password = PASSWORD;                           // SMTP password
                $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465;                                    // TCP port to connect to
                
                $mail->setFrom(EMAILID, 'Mailer');
                $mail->addAddress($to);     // Add a recipient
                //$mail->addAddress('ellen@example.com');               // Name is optional
                $mail->addReplyTo(EMAILID, 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');
                
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                $mail->isHTML(true);                                  // Set email format to HTML
                
                $mail->Subject = $subject;
                $mail->Body    = '<h2 style="color : blue;">Nouveau Pré-inscription  : </h2>
                                <p style="font-weight: 500;">Nom et Prènom : '.$nom.' '.$prenom.'<br>
                                Date de Naissance : '.$date_naissance.'<br>
                                Email : '.$email.'<br>
                                Cin ou Passport : '.$cin.'<br>
                                Téléphone : '.$telephone.'<br>
                                Adresse : '.$adresse.'<br>
                                Lycée : '.$lycee.'<br>
                                Baccalauréat N° : '.$baccalaureat_num.'<br>
                                Type de Baccalauréat : '.$baccalaureat_type.'<br>
                                Filiere : '.$filiere.'<br>
                                Moyenne Mathématiques : '.$mm.'<br>
                                Moyenne Francais : '.$mf.'<br>
                                Moyenne 2ème langue étrangère : '.$ml.'<br>
                                </p>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                
                if(!$mail->send()) {
                    $msg= 'Message could not be sent.';
                    $msg= 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    $msg ='Message has been sent';
                }

                $pre_inscription=new PreInscriptionController();
                $pre_inscription->addPreInscription($data);
    }


?>
    
    
    
    
    <section class="header">
      <div class="title">
        <h1 class="heading mb-3">PRE-INSCRIPTION</h1>
      </div>
    </section>

    <section>
        <div class="card inscription-form mx-auto my-5" style="border-radius: 20px;">
            <div class="card-body my-3">
                <div class="card-text">
                    <?php
                            if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['date_naissance']) && isset($_POST['genre']) 
                            && isset($_POST['email']) && isset($_POST['cin']) && isset($_POST['telephone']) && isset($_POST['adresse']) && isset($_POST['lycee'])
                            && isset($_POST['bac_num']) && isset($_POST['type_bac']) && isset($_POST['filiere']) && isset($_POST['mm']) && isset($_POST['mf']) && isset($_POST['ml'])){
                                echo '<div class="alert alert-primary" role="alert">
                                <i class="fas fa-check"></i> Pre-inscription est bien effectuer
                                </div>';
                            }
                    ?>
                    <form action="" class="needs-validation" novalidate method="POST">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-5"> 
                                <div class="form-group">
                                    <label for="nom" class="title" >Nom *</label>
                                    <input type="text" class="form-control form-control-sm" id="nom" name="nom" required>
                                    
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <div class="form-group">
                                    <label for="prenom" class="title" >Prénom *</label>
                                    <input type="text" class="form-control form-control-sm" id="prenom" name="prenom" required>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-5">
                                <div class="form-group">
                                    <label for="date_naissance" class="title" >Date de Naissance *</label>
                                    <input type="text" class="form-control form-control-sm" id="date_naissance" name="date_naissance" placeholder="01-01-2000" required>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <label class="title">Genre *</label>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="form-check me-2">
                                            <input class="form-check-input" type="radio" name="genre" id="homme" value="Homme">
                                            <label class="form-check-label" for="homme">
                                                Homme
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="genre" id="femme" value="Femme" checked>
                                            <label class="form-check-label" for="femme">
                                                Femme
                                            </label>
                                        </div>
                                    </div> 
                                </div> 
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-5">
                                <div class="form-group">
                                    <label for="email" class="title" >Email *</label>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email" required>
                                    
                                    
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <div class="form-group">
                                    <label for="cin" class="title" >Cin ou Passport *</label>
                                    <input type="text" class="form-control form-control-sm" id="cin"  name="cin" required>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-5">
                                <div class="form-group">
                                    <label for="telephone" class="title" >Téléphone *</label>
                                    <input type="text" class="form-control form-control-sm" id="telephone" name="telephone" required>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <div class="form-group">
                                    <label for="adresse" class="title">Adresse</label>
                                    <input type="text" class="form-control form-control-sm" id="adresse" name="adresse">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-5">
                                <div class="form-group">
                                    <label for="lycee" class="title" >Lycée </label>
                                    <input type="text" class="form-control form-control-sm" id="lycee" name="lycee">
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <div class="form-group">
                                    <label for="numBac" class="title" >Baccalauréat N° (s'il existe)</label>
                                    <input type="text" class="form-control form-control-sm" id="numBac" name="bac_num">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-5">
                                        <div class="form-group">
                                            <label class="title" for="type">Type de Baccalauréat *</label>
                                            <input type="text" class="form-control form-control-sm" id="type" name="type_bac">
                                        </div>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <label class="title" >Choisissez une filiere *</label>
                                <select class="form-select" aria-label="Default select example" name="filiere">
                                    <option selected value="IL">Bac +3 Ingénierie Logicielle</option>
                                    <option value="ISI">Bac +5 Ingénierie des Systèmes d'Information</option>
                                    <option value="ISD">Bac +5 Ingénierie des Systèmes Distribués</option>
                                </select>
                            </div>


                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-5">
                                <div class="form-group">
                                    <label for="mm" class="title">Moyenne Mathématiques * </label>
                                    <input type="text" class="form-control form-control-sm" id="mm" placeholder="ex: 14.25" name="mm" required>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <div class="form-group">
                                    <label for="mf" class="title">Moyenne Francais * </label>
                                    <input type="text" class="form-control form-control-sm" id="mf" placeholder="ex: 14.25" name="mf" required>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-5">
                                <div class="form-group">
                                    <label for="ml" class="title">Moyenne 2ème langue étrangère * </label>
                                    <input type="text" class="form-control form-control-sm" id="ml" placeholder="ex: 14.25" name="ml" required>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <!--<div class="g-recaptcha mx-auto" data-sitekey="6Lf9F-kbAAAAAOYHQ0lBNi7NwqpvdMRbh1zi6M0G"></div>-->
                            </div> 
                        </div>
                            
                        
                        <div class="row justify-content-center">
                            <button class="btn btn-primary mt-3" type="submit" name="submit">Envoyer</button> 
                        </div>
                        
                        
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        var forms = document.querySelectorAll(".needs-validation");
        Array.prototype.slice.call(forms).forEach( function(form)
        {
            form.addEventListener('submit', function (event) 
            {
                if (!form.checkValidity()) 
                {
                    event.preventDefault()
                    event.stopPropagation()
                }

            form.classList.add('was-validated')
            }, false);
        });
    </script>