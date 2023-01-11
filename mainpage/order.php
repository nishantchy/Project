<?php
include "../databaseconnection/orderconn.php";

$error1=$error2=$error3=$error4=$error5=$error6=NULL;
$total=NULL;
if(isset($_POST['submit'])){
  $items = $_POST['items'];
  $quantity = $_POST['quantity'];
  $pound = $_POST['pound'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $address = $_POST['address'];
  $sum = 0;
  if(!in_array($items, array("vanilla", "chocolate", "strawberry"))){
      $error1 = "Select one option";
  }
  else if(empty($quantity)){
    $error2 = 'Please choose quantity';
  }
  else if($quantity < 1){
    echo "Quantity cannot be in negative";
  }
  else if(empty($pound)){
    $error3 = "Please choose pound";
  }
  else if($pound < 1){
    echo "Pound cannot be negative";
  }
  else if(empty($date)){
    $error4 = "Please choose date";
  }
  else if(empty($time)){
    $error5 = "Please choose time";
  }
  else if(empty($address)){
    $error6 = "Please provide your address";
  }
else{
  $sql = "INSERT INTO `orderdetails` (`Flavour`, `Quantity`, `Pound`, `OrderDate`, `OrderTime`, `Address`, `Date`) VALUES ('$items', '$quantity', '$pound', '$date', '$time', '$address', current_timestamp())";
  $result = mysqli_query($conn, $sql);
  if($result){
    $sum = 650 * $quantity *$pound;
    $total = $sum;
    // echo "Connected";
  }
  else{
    die ("erro". mysqli_connect_error());
  }
}

}


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
    <?php
    if($error1!=NULL){
      ?><style> .cake-error{display:block;color:red}</style> <?php
    }
    if($error2!=NULL){
      ?><style> .quantity-error{display:block;color:red}</style> <?php
    }
    if($error3!=NULL){
      ?><style> .pound-error{display:block;color:red}</style> <?php
    }
    if($error4!=NULL){
      ?><style> .date-error{display:block;color:red}</style> <?php
    }
    if($error5!=NULL){
      ?><style> .time-error{display:block;color:red}</style> <?php
    }
    if($error6!=NULL){
      ?><style> .address-error{display:block;color:red}</style> <?php
    }
    if($total!=NULL){
      ?> <style> .total{display:block;text-align:center} </style>  <?php
    }
  
    ?>
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
            <option value="vanilla">Vanilla Cake</option>
            <option value="chocolate">chocolate Cake</option>
            <option value="strawberry">Strawberry Cake</option>
          </select>
          <p class="error cake-error"><?php echo $error1  ?></p>
          </div>
          <div class="quantity">
            <label for="" id="b">Quantity</label>
            <input type="text" name="quantity" id="a">
            <p class="error quantity-error"><?php echo $error2  ?></p>
          </div>
          <div class="pound">
            <label for="" id="b">Pound</label>
            <input type="text" name="pound" id="a">
            <p class="error pound-error"><?php echo $error3  ?></p>
          </div>
          <div class="date">
            <label for="" id="b">Choose Date</label>
            <input type="date" name="date" id="a">
            <p class="error date-error"><?php echo $error4  ?></p>
          </div>
          <div class="period">
            <label for="" id="b">Choose Time</label>
            <input type="time" name="time" id="a">
            <p class="error time-error"><?php echo $error5  ?></p>
          </div>
          <div class="address">
            <label for="" id="b">Address</label>
            <input type="text" name="address" id="a">
            <p class="error address-error"><?php echo $error6  ?></p>
          </div>
          <div class="buy">
            <input type="submit" name="submit" id="buy" value="Order Now">
          </div>
        </form>
      </div>
      <div class="payment">
        <h2 class="total">Your Total is Rs.<?php echo $total ?></h2>
      </div>
    </div>
  </body>
</html>

