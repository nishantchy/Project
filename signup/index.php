

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
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
            <input type="text" name="name" id="b">
            <?php
           if($usernameErr='0'){
            echo '<small>error</small>';
           }
           else if($usernameErr){
            echo "ada";
           }
           ?>
        </div>
        <div class="email">
            <label for="" id="a">Email</label>
            <input type="text" name="email" id="b">
        </div>
        <div class="password">
            <label for="" id="a">Password</label>
            <input type="password" name="password" id="b">
        </div>
        <div class="cpassword">
            <label for="" id="a">Confirm Password</label>
            <input type="password" name="cpassword" id="b">
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
<?php
include "../databaseconnection/connect.php";


if(isset($_POST['submit'])){
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $reg = "/^[a-zA-z ]+$/";
    
    if(empty($username)){
        echo "Username cannot be empty";
    }
    else if(!preg_match($reg, $username)){
        echo "Only alphabets are allowed";
    }
    else if(empty($email)){
        echo "email field cannot be empty";
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Invalid Email";
    }
    else if(empty($password)){
        echo "Password field cannot be empty";
    }
    else if(strlen($password) < 8){
        echo "Password should be greater than 8 characters";
    }
    else if($password!==$cpassword){
        echo "Passwords do not match";
    }
    else {
        $sql = "INSERT INTO `project` (`Username`, `Email`, `Password`, `Date`) VALUES ('$username', '$email', '$password', current_timestamp())";
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

