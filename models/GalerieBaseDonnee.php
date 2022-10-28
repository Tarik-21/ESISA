<?php
    class GalerieBaseDonnee{
        static public function getAllAlbum(){
            $stmt = DB::connect()->prepare('SELECT * FROM galerie');
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
            $stmt =null;
        }
        static public function Nombre_Album(){
            $stmt = DB::connect()->prepare('SELECT COUNT(id_album) FROM galerie');
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
            $stmt =null;
        }
        static public function createAlbum($data){
            try{
                $stmt = DB::connect()->prepare('INSERT INTO galerie (id_album,Title,Image_profiel) VALUES (:id_album,:title,:image_profiel)');
                $stmt->bindParam(':id_album',$data['id']);
                $stmt->bindParam(':title',$data['title']);
                $stmt->bindParam(':image_profiel',$data['image_profiel']);
                $stmt->execute();
                $stmt = DB::connect()->prepare('CREATE TABLE Album_'.$data['id'].' (id_image INT AUTO_INCREMENT PRIMARY KEY,images TEXT NOT NULL)');
                $stmt->execute();
            }catch(PDOException $e){
                echo  "<br>" . $e->getMessage();
            }
            
        }
        static public function deleteAlbum($id){
            
            try{
                $stmt = DB::connect()->prepare('DELETE from galerie where id_album = :id_album');
                $stmt->bindParam(':id_album',$id);
                $stmt->execute();
                $id=strtolower($id);
                $stmt = DB::connect()->prepare('DROP TABLE album_'.$id);
                $stmt->execute();
                
            }catch(PDOException $e){
                echo  "<br>" . $e->getMessage();
            }
        }

        static public function getAllImagees($id){
            $id=strtolower($id);
            try{
                $stmt = DB::connect()->prepare('SELECT * FROM album_'.$id);
                $stmt->execute();
                return $stmt->fetchAll();
                $stmt->close();
                $stmt =null;
            }catch(PDOException $e){
                echo  "<br>" . $e->getMessage();
            }
        }
        static public function addImage($id,$img){
            $id=strtolower($id);
            try{
                $stmt = DB::connect()->prepare('INSERT INTO album_'.$id.' (images) VALUES (:image)');
                $stmt->bindParam(':image',$img);
                $stmt->execute();
            }catch(PDOException $e){
                echo  "<br>" . $e->getMessage();
            }
        }
        static public function deleteImage($id_album,$id_image){
            try{
                $stmt = DB::connect()->prepare('DELETE FROM album_'.$id_album.' WHERE id_image = :id_image');
                $stmt->bindParam(':id_image',$id_image);
                $stmt->execute();
            }catch(PDOException $e){
                echo  "<br>" . $e->getMessage();
            }
        }
    }


?>