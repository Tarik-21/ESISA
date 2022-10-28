<?php
    class ContactController{
        public function addmessage($data){
            $result=ContactBaseDonnee ::createmessage($data);
        }
    }
?>