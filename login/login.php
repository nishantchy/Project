<?php
include "../databaseconnection/connect.php";

$email_error=$password_error=NULL;
$error = NULL;
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email)){
        $email_error = "Email field cannot be empty";
    }
    else if(empty($password)){
        $password_error =  "Password field cannot be empty";
    }
    else{
        $sql = "SELECT * FROM `project` WHERE Email='$email' AND Password='$password'";
        $result = mysqli_query($conn, $sql);
        if($result){
            if(mysqli_num_rows($result)==1){
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['email']=$email;
                header("Location: ../mainpage/home.php");
            }
            else{
                $error = "Invalid details";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="style.css">
    <?php
    if($email_error!=NULL){
        ?> <style> .email-error{display:block;color:red;}</style> <?php
    }
    if($password_error!=NULL){
        ?> <style> .password-error{display:block;color:red;}</style> <?php
    }
    if($error!=NULL){
        ?> <style> .detail-error{display:block;color:red;}</style> <?php
    }

?>
</head>
<body>
   <div class="container">
   <div class="logo"><img src="../Assets/mainlogo.png" alt=""></div>
   <div class="header"><h1>Login to your account</h1></div>
   </div>
   <div class="form">
    <form action="" method="post">
        <div class="email">
            <label for="" id="a">Email</label>
            <input type="email" name="email" id="b">
            <p class="error email-error"><?php echo $email_error ?></p>
        </div>
        <div class="password">
            <label for="" id="a">Password</label>
            <input type="password" name="password" id="b">
            <p class="error email-error"><?php echo $password_error ?></p>
        </div>
        <div class="submit">
            <input type="submit" name="submit" id="btn" value="Sign In">
        </div>
        <div class="display">
        <p class="error detail-error"><?php echo $error ?></p>
        </div>
        <div class="redirect">
            Don't have an account. <a href="../signup/index.php">Click here</a> to create one.
        </div>
    </form>
   </div>
</body>
</html>

