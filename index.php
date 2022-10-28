<?php
    session_start();
    require_once './Controllers/UsersController.php';
    require_once './models/users.php';
    require './PHPMailer/PHPMailerAutoload.php';
    require './compte.php';  
    require_once './models/ContactBaseDonnee.php';
    require_once './Controllers/ContactController.php';
    require_once './database/db.php';
    require_once './models/PreInscriptionBaseDonnee.php';
    require_once './Controllers/HomeController.php';
    require_once './Controllers/PreInscriptionController.php';
    require_once './Classes/Redirect.php';
    require_once './Controllers/AdminController.php';
    require_once './Controllers/EtudiantAdmisFranceController.php';
    require_once './models/EtudiantAdmisFranceDB.php';
    require_once './models/AnnoncesBaseDonnee.php';
    require_once './models/GalerieBaseDonnee.php';
    require_once './models/EventBaseDonnee.php';
    require_once './models/ActualiteBaseDonnee.php';

    $home =new HomeController();
    $logout=new UsersController();
        
    require_once("./pages/includes/header.php");
    if(isset($_GET['page'])){
        $page=$_GET['page'];
        if($page=='Admin-Actualite' || $page=='Admin-EtudiantAdmisEnFrance' || $page=='Modifier-Etudiant' || $page=='Ajouter-Etudiant'||$page=='Admin-Annoces'

            || $page=='Ajouter-Annoce' || $page=='Admin-Galerie' || $page=='Ajouter-Album' || $page=='Admin-Album' || $page=='Ajouter-Ecole' || $page=='Admin-Etudiant'
            || $page=='Admin-Calendrier' || $page=='Ajouter-evenement' || $page=='Modifier-Event' || $page=='Ajouter-Actualite' || $page=='Modifier-Actualite'){
                //if($_SESSION["logged"]== 1){
                    require_once("./pages/admin/SideBar.php");
                    $admin = new AdminController();
                    $admin->index($page);
                    require_once("./pages/admin/scripts.php");
                //}else{
                  //  Redirect::toEspace_Admin();
                //}
            
        }else{
            
            include("./pages/includes/navbar.php");
            $home->index($page);
            require_once("./pages/includes/footer.php");
            
        }
    }else{
        include("./pages/includes/navbar.php");
        $home->index('home');
        
        require_once("./pages/includes/footer.php");
    }
    
