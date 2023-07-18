<?php
session_start();
if (isset($_SESSION['autentikasi'])) {
  $terlogin = $_SESSION['autentikasi'];
} else {
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

  <link rel="stylesheet" href="style.css" />
  <script src="javas.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
  <title>Toko Komputer</title>
  <link rel="icon" href="img/icon web.png" />
</head>

<body>
  <!--nav bar-->
  <?php include 'navbar.php'; ?>

  <!-- carousel-->
  <div id="capt" class="carousel slide margincarousel" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#capt" data-bs-slide-to="0" class="active" aria-current="true"
        aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#capt" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#capt" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#capt" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href="Hardware.php">
          <img src="img/scaled/geforce-rtx-4090-product-gallery-full-screen-3840-3.png" class="d-block w-100"
            alt="RTX 4090" />
        </a>
        <div class="carousel-caption d-none d-md-block shading">
          <h5>Graphical Processing Unit</h5>
          <p>Check for the latest GPU(s) in stock!</p>
        </div>
      </div>
      <div class="carousel-item">
        <a href="Hardware.php">
          <img src="img/scaled/01-gskill-trident-z5-rgb-black-apex-1.png" class="d-block w-100" alt="Raptor Lake" />
        </a>
        <div class="carousel-caption d-none d-md-block shading">
          <h5>Memory</h5>
          <p>Check for the latest RAM modules in stock!</p>
        </div>
      </div>
      <div class="carousel-item">
        <a href="Hardware.php">
          <img src="img/scaled/intelraptoplake.png" class="d-block w-100" alt="G.SKILL & MB" />
        </a>
        <div class="carousel-caption d-none d-md-block shading">
          <h5>Central Processing Unit</h5>
          <p>Check for the latest CPU(s) in stock!</p>
        </div>
      </div>
      <div class="carousel-item">
        <a href="Hardware.php">
          <img src="img/Pengertian-Power-Supply-jenis-jenis-dan-fungsinya-1.jpg" class="d-block w-100"
            alt="Be-Quiet! PSU" />
        </a>
        <div class="carousel-caption d-none d-md-block shading">
          <h5>Power Supply</h5>
          <p>Check for the latest PSU(s) in stock!</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#capt" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#capt" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="paddingtengah">

    <!--heading-->
    <h1 class="white padding">Category</h1>
    <div class="d-flex flex-row flex-wrap">
      <ul>
        <a href="Hardware.php">
          <div class="p-2 hardsoftcontain" id="kotakhard">
            <img src="img/962028.png" class="ctgimg" />
            <h2>Hardware</h2>
          </div>
        </a>
      </ul>

      <ul>
        <a href="software.php">
          <div class="p-2 hardsoftcontain" id="kotaksoft">
            <img src="img/150332.png" class="ctgimg" />
            <h2>Software</h2>
          </div>
        </a>
      </ul>
    </div>

    <!--heading-->
    <h1 class="white padding">Produk</h1>

    <!--Cards-->
    <div class="d-flex flex-row mb-3 flex-wrap" id="produknya">
    </div>

  
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

<?php
include 'footer.php';
include 'element_frontend/modal.php';
?>

<script>
  $(document).ready(function () {
    $('#kotakhard').hover(function () {
      $(this).html(`
      <img src="img/962028.png" class="ctgimg" />
      <h2>Hardware</h2>
      <p>Perangkat Keras</p>`)
    }, function () {
      $(this).html(`
      <img src="img/962028.png" class="ctgimg" />
      <h2>Hardware</h2>`)
    })

    $('#kotaksoft').hover(function () {
      $(this).html(`
      <img src="img/150332.png" class="ctgimg" />
      <h2>Software</h2>
      <p>Perangkat Lunak</p>`)
    }, function () {
      $(this).html(`
      <img src="img/150332.png" class="ctgimg" />
      <h2>Software</h2>`)
    })

    var html = "";
    var htmlspec = "";
    const backend = "backend/product_backend.php"
    function dataproduct() {
      var html = "";
      var req = {
        request: 'produksemua',
      }
      $.ajax({
        type: "GET",
        url: backend,
        data: req,
        dataType: "JSON",
        success: function (response) {
          const index = response
          for (i in index) {
            html += `
            <div class="p-2">
            <ul>
            <div class="card cardsize">
            <img class="cardimage" src="${response[i]['gambar']}" class="card-img-top" />
            <div class="card-body">
              <h5 class="card-title titlelimit">${response[i]['Nama_barang']}</h5>
              <p class="card-text">${response[i]['tipe']}</p>
              <p class="card-text">Stok: ${response[i]['stok']}</p>
              <small class="card-text">Last updated: ${response[i]['tanggal']}</small>
              <h5 class="card-text"><b>Rp. ${response[i]['Harga']},00</b></h5>
              <a class="btn btn-secondary btn-sm" data-idprod="${response[i]['id_produk']}" id="seedetails">See details</a>
              <a class="btn btn-primary" data-idprod="${response[i]['id_produk']}" id="addtocart">Add to cart</a>
            </div>
            </div>
            </ul>
            </div>
              `
          }
          $('#produknya').html(html);
        }
      })
    }
    dataproduct();

    $(document).on('click', '#seedetails', function () {
      var id_product = $(this).data("idprod")
      var dataproduk = {
        id_product: id_product,
        request: 'spesifik',
      }

      $.ajax({
        type: "GET",
        url: backend,
        data: dataproduk,
        dataType: "JSON",
        success: function (response) {
          const index = response
          for (i in index) {
            htmlspec = `
          <p style="white-space: pre-line">${response[i]['Deskripsi']}</p>
          `
          }
          $('#bodymodal').html(htmlspec)
          $('#inimodal').modal('show')
        }

      })

    })

    $(document).on('click', '#addtocart', function () {
      var id_product = $(this).data("idprod")
      var dataproduk = {
        id_product: id_product,
        request: 'cart',
      }

      $.ajax({
        type: "POST",
        url: "backend/transaksi_backend.php",
        data: dataproduk,
        success: function (response) {
          console.log(response);
          $('#bodymodal').html(response)
          $('#inimodal').modal('show')
        }

      })

    })
  })


</script>

</html>