<?php
require_once '../connect/dbcon.php';

$kumpulberita = array();
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    if (isset($_GET['request'])) {
        $request = $_GET['request'];
    }

    if (isset($_GET['news_id'])) {
        $news_id = $_GET['news_id'];
    }

    if ($request == 'tampilsemua') {
        $querySelectBerita = $conn->query("SELECT * FROM news ORDER BY tanggal DESC");
        while ($berita = $querySelectBerita->fetch_assoc()) {
            $kumpulberita[] = $berita;
        }
    } else if ($request = 'spesifik' && $news_id !== '') {
        $querySelectBerita = $conn->prepare("SELECT * FROM news WHERE news_id = ?");
        $querySelectBerita->bind_param("i", $news_id);
        $querySelectBerita->execute();
        $kumpuldata = $querySelectBerita->get_result();
        while ($berita = $kumpuldata->fetch_assoc()) {
            $kumpulberita[] = $berita;
        }
    }
    echo json_encode($kumpulberita);
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['news_id'] !== '') {
        $news_id = $_POST['news_id'];
        $pathgambar = '';
        $amanupload = '';
        if (isset($_POST['request']) && $_POST['request'] == 'delete') {
            $queryBerita = $conn->prepare("DELETE FROM `news` WHERE news_id = ?");

            $queryBerita->bind_param("i", $news_id);

            if ($queryBerita->execute()) {
                $msg = "Berhasil Menghapus Data Berita";
            } else {
                $msg = "<sub>" . "Error: " . $queryBerita->error . "</sub>" . "</br></br> <b>Gagal Menghapus Berita</b>";
            }
        } else {
            if (isset($_POST['Judul'])) {
                $Judul_berita = $_POST['Judul'];

                if ($Judul_berita == '') {
                    $msg = "Isi judul";
                } else {
                    if (isset($_POST['Konten'])) {
                        $Konten_berita = $_POST['Konten'];

                        if ($Konten_berita == '') {
                            $msg = "Isi konten berita";
                        } else {
                            if (isset($_POST['Sumber'])) {

                                $Sumber_berita = $_POST['Sumber'];
                                if ($Sumber_berita == '') {
                                    $msg = "isi sumber berita";
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
                                            $queryBerita = $conn->prepare("UPDATE `news` SET Judul = ?, Konten = ?, Gambar = ?, Sumber = ? WHERE news_id = ?");

                                            $queryBerita->bind_param("ssssi", $Judul_berita, $Konten_berita, $pathgambar, $Sumber_berita, $news_id);

                                            if ($queryBerita->execute()) {
                                                $msg = "Berhasil Mengubah Data Berita";
                                            } else {
                                                $msg = "<sub>" . "Error: " . $queryBerita->error . "</sub>" . "</br></br> <b>Gagal Mengubah Berita</b>";
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
    } else {
        if (isset($_POST['Judul'])) {
            $Judul_berita = $_POST['Judul'];

            if ($Judul_berita == '') {
                $msg = "Isi judul";
            } else {
                if (isset($_POST['Konten'])) {
                    $Konten_berita = $_POST['Konten'];

                    if ($Konten_berita == '') {
                        $msg = "Isi konten berita";
                    } else {
                        if (isset($_POST['Sumber'])) {

                            $Sumber_berita = $_POST['Sumber'];
                            if ($Sumber_berita == '') {
                                $msg = "isi sumber berita";
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
                                                $queryBerita = $conn->prepare("INSERT INTO `news` (Judul, Konten, Gambar, Sumber) VALUES (?, ?, ?, ?)");

                                                $queryBerita->bind_param("ssss", $Judul_berita, $Konten_berita, $GambarQuery, $Sumber_berita);

                                                if ($queryBerita->execute()) {
                                                    $msg = "Berhasil Tambahkan Data Berita";
                                                } else {
                                                    $msg = "<sub>" . "Error: " . $queryBerita->error . "</sub>" . "</br></br> <b>Gagal Menambahkan Berita</b>";
                                                }

                                            } else {
                                                $msg = "ekstensi yang diperbolehkan hanya png, jpeg, dan jpg.";
                                            }
                                        }
                                    } else if ($error_gambar == 4){
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
    echo $msg;

}


?>