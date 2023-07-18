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

    <link rel="stylesheet" href="news.css" />
    <script src="javas.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>

    <title>Toko Komputer</title>
    <link rel="icon" href="img/icon web.png" />
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
  </head>
  </a>
  <body>
    <!--nav bar-->
    <?php include 'navbar.php';?>

    <!--heading-->
    <div>
      <h1 class="white padding newshead">Latest News</h1>
    </div>

    <!--cards-->
    <div id="news"></div>

    <?php
  include 'element_frontend/modal.php'
  ?>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>



  <script>
    $(document).ready(function(e){
      var html = "";
      var htmlspec = "";
      const backend = "backend/news_backend.php"
      function databerita(){
        var html = "";
        var req = {
          request: 'tampilsemua',
        }
        $.ajax({
          type: "GET",
          url: backend,
          data: req,
          dataType: "JSON",
          success: function(response){
            const index = response
            for (i in index){
              html += `

                  <div class="newscard" data-id="${response[i]['news_id']}" id="clickednews" data-bs-theme="dark">
                          <div class="card mb-3">
                            <img
                              src="${response[i]['Gambar']}"
                              class="card-img-top"
                              alt="..."
                            />

                            <div class="card-body">
                              <h5 class="card-title">
                                ${response[i]['Judul']}
                              </h5>
                              <p class="card-text">
                                <p class="shortcontent">${response[i]['Konten']}</p>
                              </p>
                              
                              <p class="card-text">
                                <small class="text-muted">Tanggal: ${response[i]['tanggal']}</small>
                              </p>
                              
                            </div>
                            
                          </div>
                      </div>

              `
            }
            $('#news').html(html);
          }
        })
      }
      databerita();

      $(document).on('click', "#clickednews", function(){
        var reqspecific = {
          news_id : $(this).data("id"),
          request : "spesifik",
        }
        const backend = "backend/news_backend.php"
        $.ajax({
          type: "GET",
          url: backend,
          data: reqspecific,
          dataType: "JSON",
          success: function(response){
            const index = response
            for (i in index){
              htmlspec = `
              <div class="modal-dialog modal-lg" id="modaldialog">
              <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="inimodalLabel"> ${response[i]['Judul']} </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <img
                src="${response[i]['Gambar']}"
                class="card-img-top"
                alt="..."
                />
                <p style="white-space: pre-line">${response[i]['Konten']}</p>
                <p>Sumber: <a href="${response[i]['Sumber']}" target="_blank" style="color: rgb(39, 78, 255);">${response[i]['Sumber']}</a></p>
                </div>
                <div class="modal-footer">
                <small class="text-muted">Tanggal: ${response[i]['tanggal']}</small>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="modalOK">OK</button>
                </div>
            </div>
            </div>
              `
            }
            $('#inimodal').html(htmlspec);
            $('#inimodal').modal('show');
          }
        })
      })
    })
  </script>
  <?php include 'footer.php';?>
</html>
