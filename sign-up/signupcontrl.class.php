<?php
class SignupController extends SignupModel{

    private $username ;
    private $pwd;
    private $email;
    //constructor
    public function __construct($username,$pwd,$email)
    {
        $this->username = $username;
        $this->pwd = $pwd;
        $this->email = $email;

    }
    public function showData(){
        echo $this->username . "<br>" . $this->pwd . "<br>" . $this->email;
    }
    //error handlers
    public function signupCheck(){
        if($this->isEmpty()) {
            header("Location:../index-signup.php?error=emptyInput");
            die();
        }
        
        if(!$this->isEmailValid())
        {
            header("Location:../index-signup.php?error=invalidEmail");
            die();
        }

        $a = new SignupModel;
/*         $data = $a -> getUsers();
        for($i = 0 ; $i <= count($data) - 1 ; $i++)
        {
            echo $data[$i]["username"] . "<br>"; 
        } */
        if(!empty($a->checkUsername($this->username))){   //daca exista username deja , redirectioneaza si scrie in url eroarea
            header("Location:../index-signup.php?error=invalidUsername");
            die();
        }

        if(!empty($a->checkEmail($this->email))){
            header("Location:../index-signup.php?error=takenEmail");
            die();
        }

        $a -> createUser($this->username,$this->pwd,$this->email);
        echo "User Created Successfully";

        

    }

    private function isEmpty(){
        if(empty($this->username) || empty($this->pwd) || empty($this->email))
        {
            return true;
        }
        else return false;
    }

    private function isEmailValid(){
        if(filter_var($this->email,FILTER_VALIDATE_EMAIL))
        {
            return true;
        }
        else return false;
    }


}