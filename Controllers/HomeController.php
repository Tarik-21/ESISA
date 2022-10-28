<?php 

    class HomeController{
        public function index($page){
            $_SESSION["logged"]=0;
            include('pages/'.$page.'.php');
        }
    }