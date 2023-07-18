<?php
session_start();
if($_SESSION['level'] !== 'Admin'){
  header("Location: ../index.php");
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="AoU_Style.css">
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
</head>

<body>
  <div class="buttondashboard">
    <a id="dashboard" href="../index.php"><button type="button" class="btn btn-secondary btn-lg">Back to Dashboard</button></a>
    <p id="descdashboard"></p>
  </div>

  <div class="adminbuttons">
    <a id="message" href="admin_message.php"><button type="button" class="btn btn-primary btn-lg">Check
        Messages</button></a>
    <a id="news" href="admin_News.php"><button type="button" class="btn btn-warning btn-lg">Modify News</button></a>
    <a id="products" href="admin_product.php"><button type="button" class="btn btn-success btn-lg">Modify Products</button></a>
    <p id="desc"></p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</body>

<script>
  $('#message').hover(function () {
    $('#desc').html("Cek pesan yang masuk.");
  }, function () {
    $('#desc').html("");
  })

  $('#news').hover(function () {
    $('#desc').html("Tambahkan, Edit, Delete atau Cek Berita.");
  }, function () {
    $('#desc').html("");
  })

  $('#products').hover(function () {
    $('#desc').html("Tambahkan, Edit, Delete atau Cek Produk.");
  }, function () {
    $('#desc').html("");
  })

  $('#dashboard').hover(function () {
    $('#descdashboard').html(`Kembali ke Halaman Utama.`);
  }, function () {
    $('#descdashboard').html("");
  })
</script>

</html>