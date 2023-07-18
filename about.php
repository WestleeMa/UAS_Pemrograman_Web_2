<?php
session_start();
if(isset($_SESSION['autentikasi'])){
  $terlogin = $_SESSION['autentikasi'];
}else{
  $terlogin = '';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="about.css" />
    <script src="javas.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>

    <title>Toko Komputer</title>
    <link rel="icon" href="img/icon web.png" />
  </head>
  <body>
    <!--nav bar-->
    <?php include 'navbar.php';?>
    <!--heading-->
    <div>
      <h1 class="white padding abouthead">About</h1>
    </div>

    <div class="container">
      <img src="img/Westlee_-14.jpg" />
      <h1 class="title">Westlee Matthew Agustinus</h1>
      <h6>NIM:</h6>
      <p>412021012</p>

      <h6>Email:</h6>
      <p>
        <a href="mailto:westlee.412021012@civitas.ukrida.ac.id"
          >westlee.412021012@civitas.ukrida.ac.id</a
        >
      </p>

      <h6>Description:</h6>
      <p>
        Informatics Student from Universitas Kristen Krida Wacana who currently
        studying web programming.
      </p>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>

  <div class="jarakfooter">
  <?php include 'footer.php';?>
  </div>
</html>
