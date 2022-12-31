<?php
include "../databaseconnection/orderconn.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order Now </title>
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <style>
      <?php
      include "style.css";
      ?>
    </style>
  </head>
  <body>
   <?php
require('../navbar/index.php');
?> 
    <div class="main-container">
      <div class="form">
        <form action="" method="post">
          <div class="select">
            <label for="" id="b">Choose Flavour</label>
          <select name="items" id="a">
          <option value="">Choose Flavour</option>
            <option value="vanila">Vanilla Cake</option>
            <option value="chocolate">chocolate Cake</option>
            <option value="strawberry">Strawberry Cake</option>
          </select>
          </div>
          <div class="quantity">
            <label for="" id="b">Quantity</label>
            <input type="number" name="quantity" id="a">
          </div>
          <div class="pound">
            <label for="" id="b">Pound</label>
            <input type="number" name="pound" id="a">
          </div>
          <div class="date">
            <label for="" id="b">Choose Date</label>
            <input type="date" name="date" id="a">
          </div>
          <div class="period">
            <label for="" id="b">Choose Time</label>
            <input type="time" name="time" id="a">
          </div>
          <div class="address">
            <label for="" id="b">Address</label>
            <input type="text" name="address" id="a">
          </div>
          <div class="buy">
            <input type="submit" name="submit" id="buy" value="Order Now">
          </div>
        </form>
      </div>
      <?php
      
    echo '<h1>Total payment : </h1>';
  
    ?>
      <div class="blank">
        psdfsfdsf
      </div>
    </div>
    
     <?php
require('../footer/index.php');
?>
  </body>
</html>

<?php
if(isset($_POST['submit'])){
  $items = $_POST['items'];
  $quantity = $_POST['quantity'];
  $pound = $_POST['pound'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $address = $_POST['address'];
  $sum = 0;
  if(!in_array($items, array("vanilla", "chocolate", "strawberry"))){
      echo "Select one option";
  }
  else if(empty($quantity)){
    echo 'Please choose quantity';
  }
  else if($quantity < 1){
    echo "Quantity cannot be in negative";
  }
  else if(empty($pound)){
    echo "Please choose pound";
  }
  else if(empty($date)){
    echo "Please choose date";
  }
  else if(empty($time)){
    echo "Please choose time";
  }
else{
  $sql = "INSERT INTO `orderdetails` (`Flavour`, `Quantity`, `Pound`, `OrderDate`, `OrderTime`, `Address`, `Date`) VALUES ('$items', '$quantity', '$pound', '$date', '$time', '$address', current_timestamp())";
  $result = mysqli_query($conn, $sql);
  if($result){
    $sum = 650 * $quantity *$pound;
    echo $sum;
    // echo "Connected";
  }
  else{
    die ("erro". mysqli_connect_error());
  }
}

}

?>
