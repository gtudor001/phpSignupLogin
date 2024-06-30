<?php
include "login/loginview.class.php";
$errors = new LoginView;
if(!empty($_GET["error"]))
{
    $error_message = htmlspecialchars($errors -> showErrors($_GET["error"]));
    //echo $error_message;
    
}
?>

<html>
<head>
<link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class ="signup">
    <form action = "login/loginhandle.php" method = "post">
        <label>Username or email</label><br>
        <input type="text" name ="username"> <br>
        <label>Password</label><br>
        <input type="password" name ="pwd"><br>
        <button type = "submit" name ="submit" >Log In</button>
    </form>
    <p><?php if(isset($error_message)){
    echo $error_message ; 
    }
    ?>
    </p>
    </div>
</body>
</html>
<?php


