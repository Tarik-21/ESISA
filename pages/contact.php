<?php
    if(isset($_POST['submit'])){
           $data= array("nom"=>$_POST['nom'],"prenom"=>$_POST['prenom'],"telephone"=>$_POST['telephone'],"genre"=>$_POST['genre'],
                    "email"=>$_POST['email'],"sujet"=>$_POST['sujet'],"msg"=>$_POST['msg']);
            $to= "tarikmouhouch9@gmail.com";
            $subject=$_POST['sujet'];
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $telephone=$_POST['telephone'];
            $email=$_POST['email'];
            $message=$_POST['msg'];

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
                $mail->Body    = '<h2 ><span style="color : blue;">'.$nom.' '.$prenom.'</span> à envoyer un message :</h2>
                                <p style="font-weight: 500;">'.$message.'</p>
                                <p><span style="font-weight: bold;">Téléphone :</span>'.$telephone.'</p>
                                <p><span style="font-weight: bold;">Email :</span>'.$email.'</p>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                
                if(!$mail->send()) {
                    $msg= 'Message could not be sent.';
                    $msg= 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    $msg ='Message has been sent';
                }
                //sent to base donnee
                $message=new ContactController();
                $message->addmessage($data);

        
    }
    

?>
<section class="header">
      <div class="title">
        <h1 class="heading mb-3">CONTACTEZ-NOUS</h1>
      </div>
</section>
<section class="content my-5">
        <div class="container">
            <div class="row">
                <h2 class="text-center">Informations</h2>
                <p class="text-center"><span class="fw-bold">Adresse :</span>  29 bis Av Ibn Khatib Route d'Immouzzer Fès - Maroc.</p>
                <p class="text-center"><span class="fw-bold">Téléphone :</span> +212 (0)5 35 65 70 95</p>
                <p class="text-center"><span class="fw-bold">Fax :</span> +212 (0)5 35 65 97 90</p>
                <p class="text-center"><span class="fw-bold">Mail :</span> info@esisa.ma</p>
            </div>

        </div>
    </section>
<section>
        <div class="card inscription-form mx-auto my-5" style="border-radius: 20px;">
            <div class="card-body my-3">
                <div class="card-text">
                    <?php
                        if(isset($_POST['submit'])){
                            echo '<div class="alert alert-primary" role="alert">'.$msg.'</div>';
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
                                    <label for="telephone" class="title" >Téléphone *</label>
                                    <input type="text" class="form-control form-control-sm" id="telephone" name="telephone" required>
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
                                    <label for="sujet" class="title" >Sujet *</label>
                                    <input type="text" class="form-control form-control-sm" id="sujet"  name="sujet" required>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2">
                            <div class="form-floating" style="width: 80%;">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="msg" required></textarea>
                                <label for="floatingTextarea2">Message</label>
                            </div>
                        </div>
        
        
                            
                        

                        <div class="row justify-content-center mt-2">
                            <button class="btn btn-primary" type="submit" name="submit">Envoyer</button> 
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </section>

<section class="map my-3">  
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3306.7440541332335!2d-4.997691084936051!3d34.02478018061346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd9f8b6b7ad8d659%3A0x17b883b0340ac6fc!2sESISA!5e0!3m2!1sfr!2sma!4v1628544723692!5m2!1sfr!2sma" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</section>


