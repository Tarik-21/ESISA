<?php
    class ContactBaseDonnee{
        static public function createmessage($data){
            $stmt=DB::connect()->prepare('INSERT INTO contact (Nom,Prenom,Telephone,Genre,Email,Sujet,Msg)
                                        VALUES (:Nom,:Prenom,:Telephone,:Genre,:Email,:Sujet,:Msg)');
            $stmt->bindParam(':Nom',$data['nom']);
            $stmt->bindParam(':Prenom',$data['prenom']);
            $stmt->bindParam(':Telephone',$data['telephone']);
            $stmt->bindParam(':Genre',$data['genre']);
            $stmt->bindParam(':Email',$data['email']);
            $stmt->bindParam(':Sujet',$data['sujet']);
            $stmt->bindParam(':Msg',$data['msg']);
            

            if($stmt->execute()){
                return 'ok';
            }else{
                return 'error';
            }
            $stmt->close();
            $stmt = null;


        }
    }


?>