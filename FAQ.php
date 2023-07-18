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

    <link rel="stylesheet" href="info.css" />
    <script src="javas.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>

    <title>Toko Komputer</title>
    <link rel="icon" href="img/icon web.png" />
  </head>
  <body>
    <!--nav bar-->
    <?php include 'navbar.php';?>

    <!--heading-->
    <div class="contain">
      <h1>Frequently Asked Questions</h1>

      <h5>Apakah barang-barang disini bergaransi?</h5>
      <p>
        Tentu, kami menyediakan barang-barang bergaransi resmi, dengan tambahan
        garansi toko jika barang bermasalah dalam 3 hari dapat langsung ditukar
        dengan unit baru.
      </p>

      <h5>Dimanakah lokasi toko?</h5>
      <p>
        Jl. Duren mangga raya No.10, RT.6/RW.9.
      </p>

      <h5>Bagaimana proses pengembalian barang?</h5>
      <p>
        Untuk proses return dapat langsung menghubungi CS kita pada email
        <a href="mailto:westlee.412021012@civitas.ukrida.ac.id">westlee.412021012@civitas.ukrida.ac.id</a>.
      </p>

      <br>

      <small>Jika memiliki pertanyaan lebih lanjut
         dapat langsung hubungi kami: <a href="contact.php" class="btn btn-primary btn-sm">Contact Us</a> </small>
      
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>

  <div class="footer">
  <?php include 'footer.php';?>
  </div>
</html>
