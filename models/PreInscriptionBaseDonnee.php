<?php
    class PreInscriptionBaseDonnee{
        static public function createInsciption($data){
            $stmt=DB::connect()->prepare('INSERT INTO pre_inscription (Nom,Prenom,Date_de_Naissance,Genre,Email,Cin,Telephone,Adresse,Lycee,Baccalaureat_Num,Baccalaureat_Type,Filiere,Moyenne_Mathematiques,Moyenne_Francais,Moyenne_2eme_langue)
                                        VALUES (:Nom,:Prenom,:Date_de_Naissance,:Genre,:Email,:Cin,:Telephone,:Adresse,:Lycee,:Baccalaureat_Num,:Baccalaureat_Type,:Filiere,:Moyenne_Mathematiques,:Moyenne_Francais,:Moyenne_2eme_langue)');
            $stmt->bindParam(':Nom',$data['nom']);
            $stmt->bindParam(':Prenom',$data['prenom']);
            $stmt->bindParam(':Date_de_Naissance',$data['date_naissance']);
            $stmt->bindParam(':Genre',$data['genre']);
            $stmt->bindParam(':Email',$data['email']);
            $stmt->bindParam(':Cin',$data['cin']);
            $stmt->bindParam(':Telephone',$data['telephone']);
            $stmt->bindParam(':Adresse',$data['adresse']);
            $stmt->bindParam(':Lycee',$data['lycee']);
            $stmt->bindParam(':Baccalaureat_Num',$data['bac_num']);
            $stmt->bindParam(':Baccalaureat_Type',$data['type_bac']);
            $stmt->bindParam(':Filiere',$data['filiere']);
            $stmt->bindParam(':Moyenne_Mathematiques',$data['mm']);
            $stmt->bindParam(':Moyenne_Francais',$data['mf']);
            $stmt->bindParam(':Moyenne_2eme_langue',$data['ml']);

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