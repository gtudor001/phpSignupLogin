<?php

class LoginView{
    //verifica tipul de eroare si afiseaza mesajul potrivit
    public function showErrors($errorType){
        switch($errorType){
            case "emptyFields":
                return "Please fill in all the fields!";
                break;
            case "invalidCredentials":
                return "Username or password invalid!";
                break;
        }

    }
}