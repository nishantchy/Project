<?php
include "../databaseconnection/messageconn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer</title>
    <!-- <link rel="stylesheet" href="footer.css"> -->
    <style>
        <?php
        include "footer.css";
        ?>
    </style>
</head>
<body>
   <div class="container">
    <footer>
        <div class="blackfield">
            <div class="socials">
                <div class="img2">
                  <a href="https://www.facebook.com/profile.php?id=100011083328081"><img src="../assets/icons8-facebook (1).svg" alt="" /></a>
                </div>
                <div class="img2">
                  <a href="https://www.instagram.com/cakeyy_e/"><img src="../assets/icons8-instagram.svg" alt="" /></a>
                </div>
                <div class="img2">
                    <a href=""><img src="../assets/icons8-google.svg" alt="" /></a>
                </div>
              </div>
        </div>
        <h1>Send a Message</h1>
        <div class="form">
            <form action="" method="post">
                <div class="name">
                    <label for="" id="a">Name</label>
                    <input type="text" name="name" id="b">
                </div>
                <div class="message">
                    <label for="" id="a">Message</label>
                    <!-- <input type="text" name="msg" id="b"> -->
                    <textarea name="msg" id="" cols="10" rows="3"></textarea>
                </div>
                <div class="send">
                    <input type="submit" name="submit" id="btn" value="Send Message">
                </div>
            </form>
        </div>
        
      </footer> 
   </div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $message = $_POST['msg'];

    $sql = "INSERT INTO `message` (`Name`, `Message`, `date`) VALUES ( '$name', '$message', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "Message sent";
    }
    else{
        die("Error". mysqli_connect_error());
    }
}
?>