<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CakeYY</title>
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
      <div class="img-section">
        <div class="fa-img"></div>
        <div class="fa-content">
          <h3>Cake.YY Est.2021</h3>
          <h1>Welcome to Cake.YY</h1>
          <h1>Delicious Cakes & Coffee</h1>
          <div class="btns">
            <div class="btn1"><button><a href="../mainpage/order.php">Order Now</a></button></div>
          </div>
        </div>
      </div>
      <div class="time">
        <p>10am to 7am</p>
        <p>Sunday to Friday</p>
      </div>
      <div class="container">
        <div class="eat">
          <div class="left">
            <h1>Eat.</h1>
            <p>
              Delicious cakes and prestiges are available with great prices.
              Check out now! Lorem ipsum dolor sit amet consectetur adipisicing
              elit. Quis aspernatur sequi impedit sapiente, ea eligendi iste
              ipsum optio iusto eos!
            </p>
          </div>
          <div class="right"><img src="../assets/eat.jpg" alt="" /></div>
        </div>
        <div class="drink">
          <div class="left"><img src="../assets/drink.jpg" alt="" /></div>
          <div class="right">
            <h1>Drink.</h1>
            <p>
              Great coffee are available just at great prices. Check out now!
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint
              quaerat corrupti illo quam quasi neque similique mollitia iusto
              aliquid amet!
            </p>
          </div>
        </div>
        <div class="enjoy">
          <div class="left">
            <h1>Enjoy.</h1>
            <p>
              Make yourself at home. Enjoy our delicious cakes and coffee with
              friends and family. Lorem ipsum dolor sit amet consectetur
              adipisicing elit. Earum illum laboriosam deleniti nemo quo placeat
              consequatur eius in distinctio accusamus?
            </p>
          </div>
          <div class="right"><img src="../assets/enjoy.jpg" alt="" /></div>
        </div>
      </div>
      <div class="drop">
        <h1>Drop By for a bite!</h1>
        <div class="fa-add">
          <div class="address">
            <h2>Address</h2>
            <p>Sankhu, Kathmandu</p>
          </div>
          <div class="timing">
            <h2>Opening Hours</h2>
            <p>Sunday to Friday</p>
            <p>10am to 7pm</p>
          </div>
        </div>
      </div>
      <div class="cakes">
        <div class="img1"><img src="../assets/1.jpg" alt="" /></div>
        <div class="img1"><img src="../assets/2.jpg" alt="" /></div>
        <div class="img1"><img src="../assets/3.jpg" alt="" /></div>
        <div class="img1"><img src="../assets/4.jpg" alt="" /></div>
        <div class="img1" id="imgd"><img src="../assets/5.jpg" alt="" /></div>
      </div>
      <div class="blank">
        psdfsfdsf
      </div>
      <?php
require('../footer/index.php');
?>
    </div>
  </body>
</html>
