<?php
require_once '../connect/dbcon.php';

$kumpulProduk = array();
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    if (isset($_GET['request'])) {
        $request = $_GET['request'];
    }

    if (isset($_GET['id_product'])) {
        $id_product = $_GET['id_product'];
    }

    if ($request == 'produksemua') {
        $querySelectProduk = $conn->query("SELECT * FROM product ORDER BY tanggal DESC");
        while ($Produk = $querySelectProduk->fetch_assoc()) {
            $kumpulProduk[] = $Produk;
        }
    }

    else if ($request == 'hardware') {
        $querySelectProduk = $conn->query("SELECT * FROM product WHERE tipe = 'Hardware' ORDER BY tanggal DESC");
        while ($Produk = $querySelectProduk->fetch_assoc()) {
            $kumpulProduk[] = $Produk;
        }
    }

    else if ($request == 'software') {
        $querySelectProduk = $conn->query("SELECT * FROM product WHERE tipe = 'Software' ORDER BY tanggal DESC");
        while ($Produk = $querySelectProduk->fetch_assoc()) {
            $kumpulProduk[] = $Produk;
        }
    }
    
    else if ($request = 'spesifik' && $id_product !== '') {
        $querySelectProduk = $conn->prepare("SELECT * FROM product WHERE id_produk = ?");
        $querySelectProduk->bind_param("i", $id_product);
        $querySelectProduk->execute();
        $kumpuldata = $querySelectProduk->get_result();
        while ($Produk = $kumpuldata->fetch_assoc()) {
            $kumpulProduk[] = $Produk;
        }
    }

    echo json_encode($kumpulProduk);
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['produk_id'] !== '') {
        $id_product = $_POST['produk_id'];
        $pathgambar = '';
        $amanupload = '';
        if (isset($_POST['request']) && $_POST['request'] == 'delete') {
            $queryProduk = $conn->prepare("DELETE FROM `product` WHERE id_produk = ?");

            $queryProduk->bind_param("i", $id_product);

            if ($queryProduk->execute()) {
                $msg = "Berhasil Menghapus Data Produk";
            } else {
                $msg = "<sub>" . "Error: " . $queryProduk->error . "</sub>" . "</br></br> <b>Gagal Menghapus Produk</b>";
            }
        } else {
            if (isset($_POST['Nama'])) {
                $Nama_Produk = $_POST['Nama'];

                if ($Nama_Produk == '') {
                    $msg = "Isi Nama Barang";
                } else {
                    if (isset($_POST['Deskripsi'])) {
                        $Deskripsi_Produk = $_POST['Deskripsi'];

                        if ($Deskripsi_Produk == '') {
                            $msg = "Isi Deskripsi Produk";
                        } else {
                            if (isset($_POST['Harga'])) {

                                $Harga_Produk = $_POST['Harga'];
                                if ($Harga_Produk == '') {
                                    $msg = "isi Harga Produk";
                                } else {
                                    if (isset($_POST['tipe'])) {
                                        $Tipe_Produk = $_POST['tipe'];
                                        if ($Tipe_Produk == '') {
                                            $msg = "Pilih Tipe Produk";

                                        } else {
                                            if (isset($_POST['Stok'])) {
                                                $Stok_Produk = $_POST['Stok'];
                                                if ($Stok_Produk == '') {
                                                    $msg = "Isi Stok Produk";
                                                } else {
                                                    if (isset($_FILES['Gambar'])) {
                                                        $error_gambar = $_FILES['Gambar']['error'];
                                                        $nama_gambar = $_FILES['Gambar']['name'];
                                                        $tmp_name_gambar = $_FILES['Gambar']['tmp_name'];

                                                        if ($error_gambar == 0) {
                                                            if ($nama_gambar == '') {
                                                                $msg = "masukkan gambar";
                                                            } else {
                                                                $ekstensi_gambar = strtolower(pathinfo($nama_gambar, PATHINFO_EXTENSION));
                                                                $ekstensi_boleh = array("png", "jpeg", "jpg");

                                                                if (in_array($ekstensi_gambar, $ekstensi_boleh)) {
                                                                    $nama_unik = uniqid() . '.' . $ekstensi_gambar;
                                                                    $tujuan_upload = "../img/" . $nama_unik;
                                                                    move_uploaded_file($tmp_name_gambar, $tujuan_upload);
                                                                    $pathgambar = "img/" . $nama_unik;
                                                                    $amanupload = 'aman';
                                                                } else {
                                                                    $msg = "ekstensi yang diperbolehkan hanya png, jpeg, dan jpg.";
                                                                }
                                                            }
                                                        } else if ($error_gambar == 4) {
                                                            $pathgambar = $_POST['gambarlama'];
                                                            $amanupload = 'aman';
                                                        } else {
                                                            $msg = "error";
                                                        }

                                                        if ($amanupload == 'aman') {
                                                            $queryProduk = $conn->prepare("UPDATE `product` SET Nama_barang = ?, Deskripsi = ?, gambar = ?, Harga = ?, tipe = ?, stok = ? WHERE id_produk = ?");

                                                            $queryProduk->bind_param("sssisii", $Nama_Produk, $Deskripsi_Produk, $pathgambar, $Harga_Produk, $Tipe_Produk, $Stok_Produk, $id_product);

                                                            if ($queryProduk->execute()) {
                                                                $msg = "Berhasil Mengubah Data Produk";
                                                            } else {
                                                                $msg = "<sub>" . "Error: " . $queryProduk->error . "</sub>" . "</br></br> <b>Gagal Mengubah Produk</b>";
                                                            }
                                                        }
                                                    } else {
                                                        $msg = "error input gambar";
                                                    }
                                                }
                                            }
                                        }
                                    }

                                }
                            }
                        }
                    }
                }
            }
        }
    } else {
        if (isset($_POST['Nama'])) {
            $Nama_Produk = $_POST['Nama'];

            if ($Nama_Produk == '') {
                $msg = "Isi Nama Barang";
            } else {
                if (isset($_POST['Deskripsi'])) {
                    $Deskripsi_Produk = $_POST['Deskripsi'];

                    if ($Deskripsi_Produk == '') {
                        $msg = "Isi Deskripsi Produk";
                    } else {
                        if (isset($_POST['Harga'])) {

                            $Harga_Produk = $_POST['Harga'];
                            if ($Harga_Produk == '') {
                                $msg = "isi Harga Produk";
                            } else {
                                if (isset($_POST['tipe'])) {
                                    $Tipe_Produk = $_POST['tipe'];
                                    if ($Tipe_Produk == '') {
                                        $msg = "Pilih Tipe Produk";

                                    } else {
                                        if (isset($_POST['Stok'])) {
                                            $Stok_Produk = $_POST['Stok'];
                                            if ($Stok_Produk == '') {
                                                $msg = "Isi Stok Produk";
                                            } else {
                                                if (isset($_FILES['Gambar'])) {
                                                    $error_gambar = $_FILES['Gambar']['error'];
                                                    $nama_gambar = $_FILES['Gambar']['name'];
                                                    $tmp_name_gambar = $_FILES['Gambar']['tmp_name'];

                                                    if ($error_gambar == 0) {
                                                        if ($nama_gambar == '') {
                                                            $msg = "masukkan gambar";
                                                        } else {
                                                            $ekstensi_gambar = strtolower(pathinfo($nama_gambar, PATHINFO_EXTENSION));
                                                            $ekstensi_boleh = array("png", "jpeg", "jpg");

                                                            if (in_array($ekstensi_gambar, $ekstensi_boleh)) {
                                                                $nama_unik = uniqid() . '.' . $ekstensi_gambar;
                                                                $tujuan_upload = "../img/" . $nama_unik;
                                                                move_uploaded_file($tmp_name_gambar, $tujuan_upload);
                                                                $GambarQuery = "img/" . $nama_unik;
                                                                $queryProduk = $conn->prepare("INSERT INTO `product` (Nama_barang, Deskripsi, Harga, gambar, tipe, stok) VALUES (?, ?, ?, ?, ?, ?)");

                                                                $queryProduk->bind_param("ssissi", $Nama_Produk, $Deskripsi_Produk, $Harga_Produk, $GambarQuery, $Tipe_Produk, $Stok_Produk);

                                                                if ($queryProduk->execute()) {
                                                                    $msg = "Berhasil Tambahkan Data Produk";
                                                                } else {
                                                                    $msg = "<sub>" . "Error: " . $queryProduk->error . "</sub>" . "</br></br> <b>Gagal Menambahkan Produk</b>";
                                                                }

                                                            } else {
                                                                $msg = "ekstensi yang diperbolehkan hanya png, jpeg, dan jpg.";
                                                            }
                                                        }
                                                    } else if ($error_gambar == 4) {
                                                        $msg = "Tolong masukkan gambar";
                                                    } else {
                                                        $msg = "error";
                                                    }
                                                } else {
                                                    $msg = "error input gambar";
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    echo $msg;

}


?>