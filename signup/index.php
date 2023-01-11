<?php
$username_error=$email_error=$password_error=Null;
$username_error1=$password_error1=$email_error1=NULL;
$username1=$email=$password= NULL;
$password_error2= NULL;
include "../databaseconnection/connect.php";



if(isset($_POST['submit'])){
    $username1 = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $reg = "/^[a-zA-z ]+$/";
    
    if(empty($username1)){
        $username_error = "Username cannot be empty";
    }
    else if(!preg_match($reg, $username1)){
        $username_error1 = "Only alphabets are allowed";
    }
    else if(empty($email)){
        $email_error = "email field cannot be empty";
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_error1 = "Invalid Email";
    }
    else if(empty($password)){
        $password_error =  "Password field cannot be empty";
    }
    else if(strlen($password) < 8){
        $password_error1 = "Password should be greater than 8 characters";
    }
    else if($password!==$cpassword){
        $password_error2 = "Passwords do not match";
    }
    else {
        $sql = "INSERT INTO `project` (`Username`, `Email`, `Password`, `Date`) VALUES ('$username1', '$email', '$password', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                if($result){
                    header("Location: ../login/login.php");
                }
                else{
                    die("Error" . mysqli_connect_error());
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
    <?php
    if($username_error!= NULL){
        ?> <style>.name-error{display: block;color:red;}</style> <?php
    }
    if($email_error!= NULL){
        ?> <style>.email-error{display: block;color:red;}</style> <?php
    }
    if($password_error!= NULL){
        ?> <style>.password-error{display: block;color:red;}</style> <?php
    }
    ?>
    <?php
    if($username_error1!=NULL){
        ?> <style>.name-error1{display: block;color:red;}</style> <?php
    }
    if($email_error1!=NULL){
        ?> <style>.email-error1{display: block;color:red;}</style> <?php
    }
    if($password_error1!=NULL){
        ?> <style>.password-error1{display: block;color:red;}</style> <?php
    }

?>
<?php
if($password_error2!=NULL){
    ?><style>.password-error2{display: block;color:red;}</style> <?php
}
?>
</head>
<body>
   <div class="main-container">
   <div class="container">
   <div class="logo"><img src="../Assets/mainlogo.png" alt=""></div>
   <div class="header"><h1>Get Started with Your account</h1></div>
   </div>
   <div class="form">
    <form action="" method="post">
        <div class="name">
            <label for="" id="a">Full Name</label>
            <input type="text" name="name" id="b" value="<?php echo $username1 ?>">  
            <p class="error name-error"><?php echo $username_error ?></p>  
            <p class="error1 name-error1"><?php echo $username_error1 ?></p>  
        </div>
        <div class="email">
            <label for="" id="a">Email</label>
            <input type="text" name="email" id="b" values="<?php echo $email ?>">
            <p class="error email-error"><?php echo $email_error ?></p>
            <p class="error1 email-error1"><?php echo $email_error1 ?></p>
        </div>
        <div class="password">
            <label for="" id="a">Password</label>
            <input type="password" name="password" id="b" values="<?php echo $password ?>">
            <p class="error password-error"><?php echo $password_error ?></p>
            <p class="error1 password-error1"><?php echo $password_error1 ?></p>
        </div>
        <div class="cpassword">
            <label for="" id="a">Confirm Password</label>
            <input type="password" name="cpassword" id="b">
            <p class="error2 password-error2"><?php echo $password_error2 ?></p>
        </div>
        <div class="submit">
            <input type="submit" name="submit" id="btn" value="Sign Up">
        </div>
        <div class="foot"><a href="../login/login.php">Click here</a> to go to login page.</div>
    </form>
   </div>
   </div>
</body>
</html>

