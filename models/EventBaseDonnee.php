<?php
    class EventBaseDonnee{
        static public function getAllEvent(){
            $stmt = DB::connect()->prepare('SELECT * FROM calendrier ORDER BY date_event ASC');
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
            $stmt =null;
        }
        static public function getEventById($id){
            $stmt = DB::connect()->prepare('SELECT * FROM calendrier WHERE id=:id');
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
            $stmt =null;

        }
        static public function modifierEvent($id,$data){
            $stmt = DB::connect()->prepare('UPDATE calendrier set
                                        title = :title,
                                        date_event = :date_event,
                                        time_event = :time_event,
                                        local_event = :local_event,
                                        description_event = :description_event,
                                        img = :img
                                        WHERE id = :id
                                        ');
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':title',$data['title']);
            $stmt->bindParam(':date_event',$data['date_event']);
            $stmt->bindParam(':time_event',$data['time_event']);
            $stmt->bindParam(':local_event',$data['local_event']);
            $stmt->bindParam(':description_event',$data['description_event']);
            $stmt->bindParam(':img',$data['img']);
            $stmt->execute();
        }
        
        static public function createEvent($data){
            try{
                $stmt = DB::connect()->prepare('INSERT INTO calendrier (title,date_event,time_event,local_event,description_event,img) VALUES (:title,:date_event,:time_event,:local_event,:description_event,:img)');
                $stmt->bindParam(':title',$data['title']);
                $stmt->bindParam(':date_event',$data['date']);
                $stmt->bindParam(':time_event',$data['time']);
                $stmt->bindParam(':local_event',$data['location']);
                $stmt->bindParam(':description_event',$data['desc']);
                $stmt->bindParam(':img',$data['img']);
                $stmt->execute();
    
            }catch(PDOException $e){
                echo  "<br>" . $e->getMessage();
            }
            
        }
        static public function deleteEvent($id){
            
            try{
                $stmt = DB::connect()->prepare('DELETE from calendrier where id = :id');
                $stmt->bindParam(':id',$id);
                $stmt->execute();
                
            }catch(PDOException $e){
                echo  "<br>" . $e->getMessage();
            }
        }
    }


?>