<?php
session_start();
if (isset($_SESSION['autentikasi'])) {
  $terlogin = $_SESSION['autentikasi'];
} else {
  $terlogin = '';
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>

  <link rel="icon" href="img/icon web.png" />
  <link rel="stylesheet" href="gallery.css">
</head>

<body>

  <?php
  include 'navbar.php';
  ?>
  <div class="container">
    <div class="gallery">
      <div class="row">
        <div class="col-lg-12">
          <div class="heading">
            <h4>Images <em>Gallery</em></h4>
          </div>

          <div class="row" id="gambargambar">

          </div>
          
          <div class="col-lg-12">
            <button id="tombolmore" class="btn btn-outline-light">Show All</button>
          </div>

        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

  <?php
  include 'footer.php';
  ?>
</body>
<script>


  $(document).ready(function (e) {
    var html = "";
    function dataimage() {
      var html = "";
      var req = {
        request: 'tampilsemua',
      }
      $.ajax({
        type: "GET",
        url: "backend/news_backend.php",
        data: req,
        dataType: "JSON",
        success: function (response) {
          const index = response
          for (i in index) {
            html += `
              <div class="col-lg-3 col-sm-6 gambarnya">
              <a href="${response[i]['Gambar']}" target="_blank" class="imglink">
                <div class="item">
                  <img src="${response[i]['Gambar']}" alt="" class="img">
                  <h3 id="judulgambar">${response[i]['Judul']}</h3>
                  <ul>
                    <li id="tanggal">Terakhir update: ${response[i]['tanggal']}</li>
                    <li>Dari laman News</li>
                  </ul>
                </div>
                </a>
              </div>
              `
          }

        }
      })

      var req2 = {
        request: 'produksemua',
      }
      $.ajax({
        type: "GET",
        url: "backend/product_backend.php",
        data: req2,
        dataType: "JSON",
        success: function (response) {
          const index2 = response
          for (x in index2) {
            html += `
              <div class="col-lg-3 col-sm-6 gambarnya">
              <a href="${response[x]['gambar']}" target="_blank" class="imglink">
                <div class="item">
                  <img src="${response[x]['gambar']}" alt="" class="img">
                  <h3 id="judulgambar">${response[x]['Nama_barang']}</h3>
                  <ul>
                    <li id="tanggal">Terakhir update: ${response[x]['tanggal']}</li>
                    <li>Dari gambar produk pada toko ini</li>
                  </ul>
                </div>
                </a>
              </div>
              `
          }
          $('#gambargambar').html(html);

          if ($('.gambarnya').length > 8) {
            $('.gambarnya:gt(7)').hide();
            $('#tombolmore').show();
          }
          else {
            $('#tombolmore').hide();
          }

          $('#tombolmore').on('click', function () {
            $('.gambarnya:gt(7)').toggle();
            $(this).text() === 'Show All' ? $(this).text('Show less') : $(this).text('Show All');
          });
        }
      })

    }

    dataimage();
  })
</script>


</html>