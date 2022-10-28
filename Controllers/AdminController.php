<?php

class AdminController{
    public function index($page){
        include('pages/admin/'.$page.'.php');
    }
}