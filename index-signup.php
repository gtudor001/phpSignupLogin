<?php
include "sign-up/signupview.class.php";
$errors = new SignupView;
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
    <form action = "sign-up/signuphandle.php" method = "post">
        <label>Username</label><br>
        <input type="text" name ="username"> <br>
        <label>Password</label><br>
        <input type="password" name ="pwd"><br>
        <label>Email</label><br>
        <input type="email" name ="email"><br>
        <button type = "submit" name ="submit" >Submit</button>
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


