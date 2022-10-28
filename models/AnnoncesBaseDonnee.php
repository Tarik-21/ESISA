<?php
class AnnoncesBaseDonnee{
    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM annonce ORDER BY id DESC');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt =null;
    }

    static public function addAnnonce($data){
        $stmt = DB::connect()->prepare('INSERT INTO annonce (Title,image_path) VALUES
                                        (:title,:image_path)');
        $stmt->bindParam(':title',$data['title']);
        $stmt->bindParam(':image_path',$data['image_path']);
        $stmt->execute();                            
    }
    static public function deleteAnnonce($id){
        try{
            $stmt = DB::connect()->prepare('DELETE FROM annonce WHERE id = :id');
            $stmt->execute(array(":id" => $id));
        }catch(PDOException $ex){
            echo "erreur " .$ex->getMessage();
        }
    }
    static public function updateAnnonce($data){
        $stmt = DB::connect()->prepare('UPDATE annonce set
                                        title = :title,
                                        image_path = :image_path,
                                        WHERE id = :id
                                        ');
        $stmt->bindParam(':title',$data['title']);
        $stmt->bindParam(':image_path',$data['image_path']);
        $stmt->bindParam(':id',$data['id']);
        $stmt->execute();
    }
    static public function getAnnoncesById($id){
        $stmt = DB::connect()->prepare('SELECT * FROM annonce WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt =null;
    }
}