<?php

class LoginModel extends DB{
    //luam parola din baza de data coresp username-ului  si o comparam cu parola primita de la utilizator
    protected function checkCredentials($user,$pwd){
        $query = "SELECT pwd FROM users WHERE username = ?;";
        $statement = $this->dbconnection()->prepare($query);

        $statement -> execute([$user]);
        $result = $statement->fetchAll();
        $hashed_pwd = $result[0]["pwd"];

        if(password_verify($pwd,$hashed_pwd))
        {
            return true;
        }
        else return false;
    }
}