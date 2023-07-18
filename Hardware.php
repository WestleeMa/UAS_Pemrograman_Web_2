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

  <div class="paddingtengah">


    <!--heading-->
    <h1 class="white padding">Hardware</h1>

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
    var html = "";
    var htmlspec = "";
    const backend = "backend/product_backend.php"
    function dataproduct() {
      var html = "";
      var req = {
        request: 'hardware',
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