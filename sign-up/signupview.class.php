<?php

class SignupView {

    public function showErrors($errorType){
        switch ($errorType){
            case "emptyInput":
                return "Please complete all the fields";
                break;
            case "invalidEmail":
                return "Email is invalid";
                break;
            case "invalidUsername":
                return "Username taken or invalid";
                break;
            case "takenEmail":
                return "This email was already used";
                break;
            case "none":
                return "User created successfully";
                break;
        }
    }

}