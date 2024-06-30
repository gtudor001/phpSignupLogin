<?php


class LoginController extends LoginModel{

    private $username;
    private $pwd;

    public function __construct($user,$pwd)
    {
        $this->username = $user;
        $this->pwd = $pwd;
    }
    //index-login.php?error= , transmitem prin URL prin GET erorile 
    public function loginCheck(){

        if($this->isEmpty())   //verifica ca toate campurile sunt completate
        {
            header("Location:../index-login.php?error=emptyFields");
            die();
        }

        $loginObj = new LoginModel;
        if(!$loginObj->checkCredentials($this->username,$this->pwd)) //metoda din loginmodel , return true daca $this->pwd = hashed_pwd din baza de date
        {
            header("Location:../index-login.php?error=invalidCredentials"); 
            die();
        }
        
        
    }

    private function isEmpty(){
        if(empty($this->username) || empty($this->pwd))
        {
            return true;
        }
        else return false;
    }


    

}