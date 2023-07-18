<?php
session_start();
if ($_SESSION['level'] !== 'Admin') {
  header("Location: ../index.php");
}
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Portal Admin - Pesan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="AoU_Style.css" />
</head>

<body>
  <div class="container">
    <h1 class="text-center mb-5">Portal Admin - Pesan</h1>
    <table class="table table-dark table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nama Pengirim</th>
          <th scope="col">Pesan</th>
          <th scope="col">Balasan Admin</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Balas/Delete</th>
        </tr>
      </thead>
      <tbody id="content">
      </tbody>
    </table>
    <a href="admin.php"><button type="button" class="btn btn-outline-secondary">Back to Portal</button></a>
  </div>
  <?php
  include '../element_frontend/modal_pesan.php';
  include '../element_frontend/modal.php';
    ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</body>
<script>
  $(document).ready(function () {
    var html = "";
    const backend = "../backend/contact_backend.php"
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
          console.log(response);
          const index = response
          for (i in index) {
            html += `
            <tr>
            <td>${response[i]['Con_id']}</td>
            <td>${response[i]['Con_name']}</td>
            <td class="shortcontent">${response[i]['Con_desc']}</td>
            <td>${response[i]['Con_reply']}</td>
            <td>${response[i]['Con_date']}</td>
            <td>
            <button class='btn btn-outline-warning' data-id='${response[i]['Con_id']}'id='replyModal'>Reply</button>
            <button class='btn btn-outline-danger' data-id='${response[i]['Con_id']}' id='deleteModal'>Delete</button>
            </td>
            </tr>
            `
          }
          $('#content').html(html);



        }
      })
    }
    datakomen();

    $(document).on('click', '#replyModal', function () {
      var komen_id = $(this).data('id');
      var req = {
        request: 'balas',
        komen_id: komen_id,
      }
      $.ajax({
        type: "GET",
        url: backend,
        data: req,
        dataType: "JSON",
        success: function (response) {
          $.each(response, function (index, key) {
            $('#Nama').val(key.Con_name)
            $('#Pesan').val(key.Con_desc)
            $('#hidden-id').val(key.Con_id)
          })
        }
      })

      $('#inimodalpesan').modal('show');
    })

    $(document).on('click', '#deleteModal', function () {
      var komen_id = $(this).data('id');
      var deleteMsg = {
        komen_id: komen_id,
        request: 'deleteMsg',
      }
      var deleteRep = {
        komen_id: komen_id,
        request: 'deleteRep',
      }

      let buttonmodal = `
            <button type="button" class="btn btn-primary" id="deleteMsg">Pesan</button>
            <button type="button" class="btn btn-warning" id="deleteReply">Reply</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="modalCancel">Batal</button>
            `
      let judulmodal = `
            <h1 class="modal-title fs-5" id="inimodalLabel"> <p id="judulmodal">Yakin?</p> </h1>
            `
      let kontenmodal = `
            <p>Delete keseluruhan pesan atau reply saja?</p>
            <small id="pesanmodal">Pesan/Reply yang sudah didelete tidak dapat dikembalikan</small>
            `
      let berhasildeletepesan = `
            <h1 class="modal-title fs-5" id="inimodalLabel"> <p id="judulmodal">Pesan terhapus</p> </h1>
            `
      let berhasildeletereply = `
            <h1 class="modal-title fs-5" id="inimodalLabel"> <p id="judulmodal">Reply terhapus</p> </h1>
            `
      let berhasilbuttonmodal = `
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="OKAY">OK</button>
            `
      $('#headermodal').html(judulmodal);
      $('#bodymodal').html(kontenmodal);
      $('#footermodal').html(buttonmodal);
      $('#inimodal').modal('show');

      $(document).on('click', '#deleteMsg', function () {
        $.ajax({
          url: backend,
          type: 'POST',
          data: deleteMsg,
          success: function (response) {
            $('#headermodal').html(berhasildeletepesan);
            $('#bodymodal').html(response);
            $('#footermodal').html(berhasilbuttonmodal);
            datakomen();
          }
        })
      })

      $(document).on('click', '#deleteReply', function () {
        $.ajax({
          url: backend,
          type: 'POST',
          data: deleteRep,
          success: function (response) {
            $('#headermodal').html(berhasildeletereply);
            $('#bodymodal').html(response);
            $('#footermodal').html(berhasilbuttonmodal);
            datakomen();
          }
        })
      })
    })


    $('#modalOK').on('click', function () {
      var req = {
        komen_id: $('#hidden-id').val(),
        balasan: $('#Balasan').val(),
      }
      $.ajax({
        type: "POST",
        url: backend,
        data: req,
        success: function (response) {
          if (response == "Berhasil mengirim balasan!") {
            alert(response);
            $('#inimodalpesan').modal('hide');
          } else {
            alert(response);
          }
          datakomen()
        }
      })
    })
  })
</script>

</html>