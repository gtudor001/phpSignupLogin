<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    include "../classes/dbconnect.php"; // db e prima , pentru ca model are nevoie de DB 
    include "signupmodel.class.php"; //model e a doua pentru ca controller foloseste clasa din model
    include "signupcontrl.class.php";

    $data = new SignupController($username,$pwd,$email);
    
    $data -> signupCheck();

    header("Location:../index-signup.php?error=none");


}
else
{
    header("Location:../index-signup.php");
}