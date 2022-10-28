<?php
class ActualiteBaseDonnee{
    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM actualitee ORDER BY id DESC');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt =null;
    }

    static public function addActualite($data){
        $stmt = DB::connect()->prepare('INSERT INTO actualitee (date_article,titre,description_actualite,img,article) VALUES
                                        (:date_article,:titre,:description_actualite,:img,:article)');
        $stmt->bindParam(':date_article',$data['date_article']);
        $stmt->bindParam(':titre',$data['titre']);
        $stmt->bindParam(':description_actualite',$data['description_actualite']);
        $stmt->bindParam(':img',$data['img']);
        $stmt->bindParam(':article',$data['article']);
        $stmt->execute();                            
    }
    static public function deleteActualite($id){
        try{
            $stmt = DB::connect()->prepare('DELETE FROM actualitee WHERE id = :id');
            $stmt->execute(array(":id" => $id));
        }catch(PDOException $ex){
            echo "erreur " .$ex->getMessage();
        }
    }
    
    static public function updateActualite($data){
        $stmt = DB::connect()->prepare('UPDATE actualitee set
                                        date_article = :date_article,
                                        titre = :titre,
                                        description_actualite = :description_actualite,
                                        img = :img,
                                        article = :article
                                        WHERE id = :id
                                        ');
        $stmt->bindParam(':date_article',$data['date_article']);
        $stmt->bindParam(':titre',$data['titre']);
        $stmt->bindParam(':description_actualite',$data['description_actualite']);
        $stmt->bindParam(':img',$data['img']);
        $stmt->bindParam(':article',$data['article']);
        $stmt->bindParam(':id',$data['id']);
        $stmt->execute();
    }
    static public function getActualiteById($id){
        $stmt = DB::connect()->prepare('SELECT * FROM actualitee WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt =null;
    }
}