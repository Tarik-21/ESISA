<?php
class UsersController{
    public function auth(){
        if(isset($_POST["submit"])){
            $data["username"] = $_POST["username"];
            $result = User::login($data);
                if($result->username === $_POST["username"] && $_POST["password"]===$result->password){
                    //$_SESSION["logged"] = 1;
                    //$_SESSION["username"] = $result->username;
                    Redirect::toAdmin_Actualite();
                }else{
                    return 1;
                }

        }
    }
}
