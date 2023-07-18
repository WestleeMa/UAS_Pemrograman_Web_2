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

  <link rel="stylesheet" href="info.css" />
  <script src="javas.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
  <title>Toko Komputer</title>
  <link rel="icon" href="img/icon web.png" />
</head>

<body>
  <!--nav bar-->
  <?php include 'navbar.php'; ?>

  <!--heading-->
  <div class="contain">
    <div class="center">
      <h1>Contacts</h1>

      <h5>Email</h5>
      <p>
        <a href="mailto:westlee.412021012@civitas.ukrida.ac.id">westlee.412021012@civitas.ukrida.ac.id</a>
      </p>

      <h5 style="color: purple">Instagram</h5>
      <p>
        tokokomp.id
      </p>

      <h5 style="color: red">YouTube</h5>
      <p>
        TK Review
      </p>

      <h5 style="color: blue">Twitter</h5>
      <p>
        TK Update
      </p>
    </div>

    <div>
      <h1>Langsung Hubungi Kami Sekarang</h1>
      <form method="POST" id="newsForm" enctype="multipart/form-data">
        <input type="hidden" id="hidden-id" name="news_id">
        <div class="form-outline form-dark mb-4">
          <input type="text" name="Nama" id="Nama" class="form-control form-control" placeholder="Nama..." />
        </div>
        <div class="form-outline form-dark mb-4">
          <textarea name="Pesan" id="Pesan" cols="30" rows="10" class="form-control form-control"
            placeholder="Pesan anda..."></textarea>
        </div>
        <button type="button" class="btn btn-success" id="kirimpesan">Kirim Pesan</button>
      </form>
    </div>

    <div class="pesan">
      <h3>Pesan-pesan</h3>
      <div class="list-group" id="pesanterkini">
      </div>
    </div>

    <div class="d-flex flex-row">



    </div>


  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

<div class="footer">
  <?php include 'footer.php'; ?>
</div>

<script>
  $(document).ready(function () {
    const backend = "backend/contact_backend.php"
    $('#kirimpesan').on('click', function () {

      var isipesan = {
        Nama: $('#Nama').val(),
        Pesan: $('#Pesan').val(),
      }

      $.ajax({
        type: "POST",
        data: isipesan,
        url: backend,
        success: function (response) {
          alert(response)
          datakomen()
        }
      })


    })

    var html = "";

    function datakomen() {
      var html = "";
      var req = {
        request: '',
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
            <div class="list-group-item">
            <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">${response[i]['Con_name']}</h5>
            <small>${response[i]['Con_date']}</small>
            </div>
            <p class="mb-1">${response[i]['Con_desc']}</p>
            <p class="balasan" id="reply">${response[i]['Con_reply']}</p>
            </div>
            `
          }
          $('#pesanterkini').html(html);
        }
      })
    }
    datakomen();
  })

</script>

</html>