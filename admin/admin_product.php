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
    <title>Portal Admin - Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="AoU_Style.css" />
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-5">Portal Admin - Product</h1>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Nama barang</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Edit or Delete</th>
                </tr>
            </thead>
            <tbody id="content">
            </tbody>
        </table>
        <button class="btn btn-success" id="addProduct"> <i class="bi bi-plus-lg"></i>Add Product</button>
        <a href="admin.php"><button type="button" class="btn btn-outline-secondary">Back to Portal</button></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <?php
    include '../element_frontend/modal_addProduct.php';
    include '../element_frontend/modal.php';
    ?>
</body>
<script>
    $(document).ready(function () {
        var html = "";
        const backend = "../backend/product_backend.php"
        function dataproduk() {
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
                        html += `<tr>
                                <td>${response[i]['id_produk']}</td>
                                <td>${response[i]['Nama_barang']}</td>
                                <td class="shortcontent">${response[i]['Deskripsi']}</td>
                                <td>
                                <img
                                src="../${response[i]['gambar']}"
                                class="card-img-top"
                                alt="Gambar"
                                />
                                </td>
                                <td>Rp. ${response[i]['Harga']},00</td>
                                <td>${response[i]['tipe']}</td>
                                <td>${response[i]['tanggal']}</td>
                                <td>${response[i]['stok']}</td>
                                <td>
                                <button class='btn btn-outline-warning' data-id='${response[i]['id_produk']}'id='editModal'>Edit</button>
                                <button class='btn btn-outline-danger' data-id='${response[i]['id_produk']}' id='deleteProduct'>Delete</button>
                                </td>
                            </tr>`
                    }
                    $('#content').html(html);
                }
            })
        }
        dataproduk();

        $('#addProduct').on('click', function () {
            $('#inimodalproduk').modal('show');
            $('#Nama').val('')
            $('#Deskripsi').val('')
            $('#gambarlama').val('')
            $('#previewlama').hide()
            $('#Konten').val('')
            $('#Harga').val('')
            $('#hidden-id').val('')
            $('#tipe').val('')
            $('#Stok').val('')
            $('#judulmodalproduk').html('Tambahkan produk');
        })

        $('#modalAdd').on('click', function (e) {

            let form_data = new FormData($('#produkForm')[0]);

            $.ajax({
                url: backend,
                type: 'POST',
                data: form_data,
                contentType: false,
                processData: false,
                success: function (response) {
                    alert(response);
                    dataproduk();
                }
            })
        })

        $(document).on('click', '#editModal', function () {
            var id_product = $(this).data('id');
            $('#hidden-id').val(id_product);
            var dataedit = {
                id_product: id_product,
                request: 'spesifik',
            }

            $('#judulmodalproduk').html('Edit Produk');
            $('#modalAdd').html('Simpan');
            $.ajax({
                url: backend,
                type: 'GET',
                data: dataedit,
                dataType: "JSON",
                success: function (response) {
                    $.each(response, function (index, key) {
                        $('#Nama').val(key.Nama_barang)
                        $('#Deskripsi').val(key.Deskripsi)
                        $('#gambarlama').val(key.gambar)
                        $('#previewlama').show()
                        $('#previewlama').attr("src", "../" + key.gambar)
                        $('#Harga').val(key.Harga)
                        $('#tipe').val(key.tipe)
                        $('#Stok').val(key.stok)
                    })
                }
            })
            $('#inimodalproduk').modal('show');
        })

        $(document).on('click', '#deleteProduct', function () {
            var id_product = $(this).data('id');
            var deleteini = {
                produk_id: id_product,
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
            <p id="pesanmodal">Produk yang sudah didelete tidak dapat dikembalikan</p>
            `
            let titleberhasildelete = `
            <h1 class="modal-title fs-5" id="inimodalLabel"> <p id="judulmodal">Produk terhapus</p> </h1>
            `
            let postbuttonmodal = `
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="OKAY">OK</button>
            `
            let titlegagaldelete = `
            <h1 class="modal-title fs-5" id="inimodalLabel"> <p id="judulmodal">Produk Gagal terhapus</p> </h1>
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
                        if (response == 'Berhasil Menghapus Data Produk') {
                            $('#headermodal').html(titleberhasildelete);
                            $('#bodymodal').html(response);
                            $('#footermodal').html(postbuttonmodal);
                        } else {
                            $('#headermodal').html(titlegagaldelete);
                            $('#bodymodal').html(response);
                            $('#footermodal').html(postbuttonmodal);
                        }
                        dataproduk();
                    }
                })
            })
        })
    })
</script>

</html>