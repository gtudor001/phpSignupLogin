<?php


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    include "../classes/dbconnect.php"; // db e prima , pentru ca model are nevoie de DB 
    include "loginmodel.class.php"; //model e a doua pentru ca controller foloseste clasa din model
    include "logincontroller.class.php";

    $data = new LoginController($username,$pwd);
    $data -> loginCheck();

    header("Location:../index.php");
    session_start();
}
else
{
    header("Location:../index-login.php");
}