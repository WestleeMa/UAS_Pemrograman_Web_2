<?php
session_start();
  if($_SESSION['level'] !== 'Admin'){
    header("Location: ../index.php");
  }
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Admin - News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="AoU_Style.css" />
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-5">Portal Admin - News</h1>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">News ID</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Konten</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Sumber</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Edit or Delete</th>
                </tr>
            </thead>
            <tbody id="content">
            </tbody>
        </table>
        <button class="btn btn-success" id="addNews"> <i class="bi bi-plus-lg"></i> Add News </button>
        <a href="admin.php"><button type="button" class="btn btn-outline-secondary">Back to Portal</button></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <?php
    include '../element_frontend/modal_addnews.php';
    include '../element_frontend/modal.php';
    ?>
</body>
<script>
    $(document).ready(function () {
        var html = "";
        const backend = "../backend/news_backend.php"
        function databerita() {
            var html = "";
            var req = {
                request: 'tampilsemua',
            }
            $.ajax({
                type: "GET",
                url: backend,
                data: req,
                dataType: "JSON",
                success: function (response) {
                    const index = response
                    for (i in index) {
                        html += `<tr>
                                <td>${response[i]['news_id']}</td>
                                <td>${response[i]['Judul']}</td>
                                <td class="shortcontent">${response[i]['Konten']}</td>
                                <td>
                                <img
                                src="../${response[i]['Gambar']}"
                                class="card-img-top"
                                alt="Gambar"
                                />
                                </td>
                                <td class="shortcontent">${response[i]['Sumber']}</td>
                                <td>${response[i]['tanggal']}</td>
                                <td>
                                <button class='btn btn-outline-warning' data-id='${response[i]['news_id']}'id='editModal'>Edit</button>
                                <button class='btn btn-outline-danger' data-id='${response[i]['news_id']}' id='deleteNews'>Delete</button>
                                </td>
                            </tr>`
                    }
                    $('#content').html(html);
                }
            })
        }
        databerita();

        $('#addNews').on('click', function () {
            $('#inimodalnews').modal('show');
            $('#Judul').val('')
            $('#Konten').val('')
            $('#gambarlama').val('')
            $('#previewlama').hide()
            $('#Sumber').val('')
            $('#hidden-id').val('')
            $('#judulmodalberita').html('Tambahkan Berita');
        })

        $('#modalAdd').on('click', function (e) {

            let form_data = new FormData($('#newsForm')[0]);

            $.ajax({
                url: backend,
                type: 'POST',
                data: form_data,
                contentType: false,
                processData: false,
                success: function (response) {
                    alert(response);
                    databerita();
                }
            })
        })

        $(document).on('click', '#editModal', function () {
            var news_id = $(this).data('id');
            $('#hidden-id').val(news_id);
            var dataedit = {
                news_id: news_id,
                request: 'spesifik',
            }

            $('#judulmodalberita').html('Edit Berita');
            $('#modalAdd').html('Simpan');
            $.ajax({
                url: backend,
                type: 'GET',
                data: dataedit,
                dataType: "JSON",
                success: function (response) {
                    $.each(response, function (index, key) {
                        $('#Judul').val(key.Judul)
                        $('#Konten').val(key.Konten)
                        $('#gambarlama').val(key.Gambar)
                        $('#previewlama').show()
                        $('#previewlama').attr("src", "../" + key.Gambar)
                        $('#Sumber').val(key.Sumber)
                    })
                }
            })
            $('#inimodalnews').modal('show');
        })

        $(document).on('click', '#deleteNews', function () {
            var news_id = $(this).data('id');
            var deleteini = {
                news_id: news_id,
                request: 'delete',
            }

            let buttonmodal = `
            <button type="button" class="btn btn-primary" id="modalOK">Yakin?</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="modalCancel">Batal</button>
            `
            let judulmodal = `
            <h1 class="modal-title fs-5" id="inimodalLabel"> <p id="judulmodal">Yakin?</p> </h1>
            `
            let kontenmodal = `
            <p id="pesanmodal">Berita yang sudah didelete tidak dapat dikembalikan</p>
            `
            let titleberhasildelete = `
            <h1 class="modal-title fs-5" id="inimodalLabel"> <p id="judulmodal">Berita terhapus</p> </h1>
            `
            let titlegagaldelete = `
            <h1 class="modal-title fs-5" id="inimodalLabel"> <p id="judulmodal">Berita gagal terhapus</p> </h1>
            `
            let postbuttonmodal = `
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="OKAY">OK</button>
            `
            $('#headermodal').html(judulmodal);
            $('#bodymodal').html(kontenmodal);
            $('#footermodal').html(buttonmodal);
            $('#inimodal').modal('show');

            $(document).on('click', '#modalOK', function () {
                $.ajax({
                    url: backend,
                    type: 'POST',
                    data: deleteini,
                    success: function (response) {
                        if (response == 'Berhasil Menghapus Data Berita') {
                            $('#headermodal').html(titleberhasildelete);
                            $('#bodymodal').html(response);
                            $('#footermodal').html(postbuttonmodal);
                        } else {
                            $('#headermodal').html(titlegagaldelete);
                            $('#bodymodal').html(response);
                            $('#footermodal').html(postbuttonmodal);
                        }
                        databerita();
                    }
                })
            })
        })
    })
</script>

</html>