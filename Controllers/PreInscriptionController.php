<?php
    class PreInscriptionController{
        public function addPreInscription($data){
            $result=PreInscriptionBaseDonnee ::createInsciption($data);
        }
    }
?>