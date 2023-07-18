<?php
session_start();
require_once '../connect/dbcon.php';
$list = array();
$listvalidasi = array();
$respon = "";
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if ($_POST['request'] == 'login') {
    if (isset($_POST['UID'])) {
        $userid = $_POST['UID'];

        if ($userid == '') {
            $respon = "Isi User_ID";
        } else {
            $queryLogin = $conn->prepare("SELECT `Nama`, `User_ID`, `Password`, `Level` FROM `user` WHERE `User_ID` = ?");

            $queryLogin->bind_param("s", $userid);
            $queryLogin->execute();
            $data = $queryLogin->get_result();

            if ($data->num_rows > 0) {
                while ($result = $data->fetch_assoc()) {
                    $list[] = $result;
                }

                if (isset($_POST['Pass'])) {

                    $pass = $_POST['Pass'];
                    if ($pass == '') {
                        $respon = "Isi kolom password";
                    } else {
                        if ($list[0]["Password"] === $pass) {
                            $respon = "Autentikasi Berhasil";
                            $_SESSION['autentikasi'] = $list[0]["Nama"];
                            $_SESSION['id'] = $list[0]["User_ID"];
                            $_SESSION['level'] = $list[0]['Level'];
                        } else {
                            $respon = "Password salah";
                        }
                    }

                }
            } else {
                $respon = "User tidak terdaftar";
            }
        }
        echo ($respon);
    }
} else if ($_POST['request'] == 'register') {
    if (isset($_POST['UID'])) {
        $userid = $_POST['UID'];

        if ($userid == '') {
            $respon = "Isi User_ID";
        } else {
            if (isset($_POST['Pass'])) {

                $pass = $_POST['Pass'];
                if ($pass == '') {
                    $respon = "Isi kolom password";
                } else {

                    if (isset($_POST['Nama'])) {
                        $nama = $_POST['Nama'];

                        if ($nama == '') {
                            $respon = "Isi kolom nama";
                        } else {

                            if (isset($_POST['Level'])) {
                                $level = $_POST['Level'];

                                if ($level == '') {
                                    $respon = "Pilih akun ini untuk user atau admin";
                                } else {


                                            $queryRegister = $conn->prepare("INSERT INTO `user` (User_Id, Password, Nama, Level) VALUES (?, ?, ?, ?)");

                                            $queryRegister->bind_param("ssss", $userid, $pass, $nama, $level);

                                            if ($queryRegister->execute()) {
                                                $respon = "Akun anda berhasil teregistrasi.";
                                            } else {
                                                $respon = "<sub>" . "Error: ". $queryRegister->error. "</sub>" . "</br></br> <b>Akun dengan User_ID ini telah terdaftar</b>";
                                            }



                                }
                            }

                        }
                    }


                }

            }
        }
        echo ($respon);
    }
}


// }
?>