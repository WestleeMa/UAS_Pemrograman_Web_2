<?php
require_once '../connect/dbcon.php';
session_start();

$kumpulbarang = array();
$msg = "";

if (isset($_SESSION['id'])) {
    $id_user = $_SESSION['id'];

    if ($_SERVER['REQUEST_METHOD'] == "GET") {

        if (isset($_GET['request'])) {
            $request = $_GET['request'];
        }

        if ($request == '') {
            $querySelectbarang = $conn->query("SELECT COUNT(t.id_produk) kuantitas, 
            t.id_produk,
            t.id_transaksi,
            p.Nama_barang,
            p.Deskripsi,
            p.Harga,
            p.gambar
            FROM transaksi t 
            JOIN product p ON p.id_produk = t.id_produk
            WHERE User_ID = '$id_user' AND Status = 'Pending'
            GROUP BY id_produk, User_ID");

            while ($barang = $querySelectbarang->fetch_assoc()) {
                $kumpulbarang[] = $barang;
            }
        } else if ($request = 'terbayar') {
            $querySelectbarang = $conn->query("SELECT COUNT(t.id_produk) kuantitas, 
            t.id_produk,
            t.id_transaksi,
            p.Nama_barang,
            p.Deskripsi,
            p.Harga,
            p.gambar
            FROM transaksi t 
            JOIN product p ON p.id_produk = t.id_produk
            WHERE User_ID = '$id_user' AND Status = 'Purchased'
            GROUP BY id_produk, User_ID");

            while ($barang = $querySelectbarang->fetch_assoc()) {
                $kumpulbarang[] = $barang;

            }
        }
        echo json_encode($kumpulbarang);


    } else if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (isset($_POST['request'])) {
            $req = $_POST['request'];
            if (isset($_POST['id_product'])) {
                $id_produk = $_POST['id_product'];
                if ($req == 'cart' && $id_produk !== '') {
                    $queryInsertcart = $conn->prepare("INSERT INTO `transaksi` (User_ID, id_produk, Status) VALUES (?, ?, 'Pending')");
                    $queryInsertcart->bind_param("si", $id_user, $id_produk);
                    if ($queryInsertcart->execute()) {
                        $msg = 'Berhasil Menambahkan ke Keranjang!';
                    } else {
                        $msg = 'Gagal Menambahkan ke Keranjang';
                    }

                } else if ($req == 'delete' && $id_produk !== '') {
                    $queryInsertcart = $conn->prepare("DELETE FROM `transaksi` WHERE id_produk = ? AND User_ID = ? AND Status = 'Pending'");
                    $queryInsertcart->bind_param("is", $id_produk, $id_user);
                    $queryInsertcart->execute();
                }
            }
            
            if ($req == 'checkout') {
                $Status = 'Purchased';
                $Statuspost = 'Pending';
                $queryUpdateCart = $conn->prepare("UPDATE `transaksi` SET Status = ? WHERE User_ID = ? AND Status = ?");

                $queryUpdateCart->bind_param("sss", $Status, $id_user, $Statuspost);

                if ($queryUpdateCart->execute()) {
                    $msg = "Terima Kasih!";
                } else {
                    $msg = "<sub>" . "Error: " . $queryUpdateCart->error . "</sub>" . "</br></br> <b>Gagal Membeli Produk</b>";
                }
            }

        }
    }

} else {
    $msg = "Silahkan login terlebih dahulu";
}

echo $msg;
?>