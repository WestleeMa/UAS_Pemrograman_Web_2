<?php
session_start();
if (!isset($_SESSION['autentikasi'])) {
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
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="AoU_Style.css" />
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-5">Keranjang Anda</h1>
        <a href="../index.php" class="btn btn-outline-secondary">Back to Dashboard</a>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama barang</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody id="content">
            </tbody>
        </table>
        <h4 id="totalharga"></h4>
        <h5 id="pesan"></h5>
        <a class="btn btn-primary btn-lg" id="checkout">Checkout</a>
    </div>

    <div class="container">
        <h1 class="text-center mb-5">History Belanja</h1>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama_barang</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Kuantitas</th>
                </tr>
            </thead>
            <tbody id="history">
            </tbody>
        </table>
        <h5 id="pesan2"></h5>
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

        const backend = "../backend/transaksi_backend.php"
        function datacart() {
            var html = "";
            var x = 0;
            var total = 0;
            var htmltotal = "";
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
                        x += 1
                        total += parseInt(response[i]['Harga']) * parseInt(response[i]['kuantitas'])
                        html += `
            <tr id="barangpending">
            <td>${x}</td>
            <td>${response[i]['Nama_barang']}</td>
            <td class="shortcontent">${response[i]['Deskripsi']}</td>
            <td>Rp. ${response[i]['Harga']},00</td>
            <td><img src="../${response[i]['gambar']}" alt=""></td>
            <td>${response[i]['kuantitas']}</td>
            <td>
            <button class='btn btn-outline-danger' data-id='${response[i]['id_produk']}' id='deleteModal'>Delete</button>
            </td>
            </tr>
            `
                        htmltotal = `
            Total Harga: Rp. ${total},00
            `
                    }
                    $('#totalharga').html(htmltotal);
                    $('#content').html(html);

                    if($('#barangpending').length <= 0){
                        $('#pesan').show();
                        $('#pesan').html('Belum ada barang di keranjang.');
                        $('#checkout').hide();
                    }else{
                        $('#pesan').hide();
                        $('#checkout').show();
                    }
                }
            })
        }

        function datapurchased() {
            var html = "";
            var x = 0;
            var req = {
                request: 'terbayar',
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
                        x += 1
                        html += `
            <tr id="barangterbeli">
            <td>${x}</td>
            <td>${response[i]['Nama_barang']}</td>
            <td class="shortcontent">${response[i]['Deskripsi']}</td>
            <td>Rp. ${response[i]['Harga']},00</td>
            <td><img src="../${response[i]['gambar']}" alt=""></td>
            <td>${response[i]['kuantitas']}</td>
            </tr>
            `
                    }
                    $('#history').html(html);
                    if($('#barangterbeli').length <= 0){
                        $('#pesan2').show();
                        $('#pesan2').html('Belum ada pembelian.');
                    }else{
                        $('#pesan2').hide();
                    }
                }
            })
        }
        datacart();
        datapurchased();

        $(document).on('click', '#deleteModal', function () {
            var produk_id = $(this).data('id');
            var deleteini = {
                id_product: produk_id,
                request: 'delete',
            }
            $('#bodymodal').html('Yakin untuk menghapus produk dari keranjang?');
            $('#inimodal').modal('show')

            $(document).on('click', '#modalOK', function () {
                $.ajax({
                    url: backend,
                    type: 'POST',
                    data: deleteini,
                    success: function (response) {
                        $('#bodymodal').html(response);
                        $('#inimodal').modal('show')
                        datacart();
                        datapurchased();
                    }
                })
            })
        })

        $('#checkout').on('click', function () {
            var datanya = {
                request: 'checkout',
            }
            var nodismiss = '<button type="button" class="btn btn-primary" id="modalOK">OK</button>';
            var dismiss = '<button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="modalClose">Sama-sama</button>';

            $('#bodymodal').html('Yakin untuk beli?');
            $('#footermodal').html(nodismiss);
            $('#inimodal').modal('show')


            $(document).on('click', '#modalOK', function () {
                $.ajax({
                    url: backend,
                    type: 'POST',
                    data: datanya,
                    success: function (response) {
                        $('#bodymodal').html(response);
                        $('#footermodal').html(dismiss);
                        $('#inimodal').modal('show')
                        datacart();
                        datapurchased();
                    }
                })
            })
        })
    })
</script>

</html>