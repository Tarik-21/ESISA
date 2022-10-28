<?php
class EtudiantAdmisFranceDB{
    static public function getAllEcoles(){
        $stmt = DB::connect()->prepare('SELECT * FROM ecoles');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt =null;
    }
    static public function createEcole($data){
        try{
            $stmt = DB::connect()->prepare('INSERT INTO ecoles (id_ecole,ecole,annee) VALUES (:id_ecole,:ecole,:annee)');
            $stmt->bindParam(':id_ecole',$data['id_ecole']);
            $stmt->bindParam(':ecole',$data['ecole']);
            $stmt->bindParam(':annee',$data['annee']);
            $stmt->execute();
            $stmt = DB::connect()->prepare('CREATE TABLE ecole_'.$data['id_ecole'].' (id_etudiant INT AUTO_INCREMENT PRIMARY KEY,Nom TEXT NOT NULL,filiere TEXT NOT NULL)');
            $stmt->execute();
        }catch(PDOException $e){
            echo  "<br>" . $e->getMessage();
        }
        
    }

    static public function deleteEcole($id){
            
        try{
            $stmt = DB::connect()->prepare('DELETE from ecoles where id_ecole = :id_ecole');
            $stmt->bindParam(':id_ecole',$id);
            $stmt->execute();
            $id=strtolower($id);
            $stmt = DB::connect()->prepare('DROP TABLE ecole_'.$id);
            $stmt->execute();
            
        }catch(PDOException $e){
            echo  "<br>" . $e->getMessage();
        }
    }

    static public function getAllEtudiant($id){
        $id=strtolower($id);
        try{
            $stmt = DB::connect()->prepare('SELECT * FROM ecole_'.$id);
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
            $stmt =null;
        }catch(PDOException $e){
            echo  "<br>" . $e->getMessage();
        }
    }

    static public function addEtudiant($id,$data){
        $id=strtolower($id);
        try{
            $stmt = DB::connect()->prepare('INSERT INTO ecole_'.$id.' (Nom,filiere) VALUES (:nom,:filiere)');
            $stmt->bindParam(':nom',$data['nom']);
            $stmt->bindParam(':filiere',$data['filiere']);

            $stmt->execute();
        }catch(PDOException $e){
            echo  "<br>" . $e->getMessage();
        }
    }
    static public function deleteEtudiant($id_ecole,$id_etudiant){
        try{
            $stmt = DB::connect()->prepare('DELETE FROM ecole_'.$id_ecole.' WHERE id_etudiant = :id_etudiant');
            $stmt->bindParam(':id_etudiant',$id_etudiant);
            $stmt->execute();
        }catch(PDOException $e){
            echo  "<br>" . $e->getMessage();
        }
    }
    
}