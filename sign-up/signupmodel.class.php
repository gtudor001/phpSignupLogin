<?php
class SignupModel extends DB{

    protected function getUsers(){
        $query = "SELECT * FROM users;";
        $statement = $this->dbconnection()->query($query); //PDOStatement object
        $results = $statement->fetchAll();
        return $results;
    }
    protected function checkUsername($username){
        $query = "SELECT * FROM users WHERE username = ? ;";
        $statement = $this->dbconnection()->prepare($query);
        $statement->execute([$username]);

        $result = $statement->fetchAll();
        return $result;
    }

    protected function checkEmail($email){
        $query = "SELECT * FROM users WHERE email = ? ;";
        $statement = $this->dbconnection()->prepare($query);
        $statement->execute([$email]);

        $result = $statement->fetchAll();
        return $result;
    }

    protected function createUser($username,$pwd,$email)
    {
        $query = "INSERT INTO users(username,pwd,email) VALUES(?,?,?);" ;
        $statement  = $this->dbconnection()->prepare($query);

        $hashed_pwd = password_hash($pwd,PASSWORD_BCRYPT);
        $statement -> execute([$username,$hashed_pwd,$email]);
    }
}