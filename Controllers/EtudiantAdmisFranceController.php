<?php
class EtudiantAdmisFranceController{
    public function getAllEtudiant(){
        $Etudiant = EtudiantAdmisFranceDB::getAll();
        return $Etudiant;
    }
    public function DeleteEtudiant($data){
        $msg = EtudiantAdmisFranceDB::deleteEtudiant($data);
        return $msg;
    }
}