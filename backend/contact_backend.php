<?php
require_once '../connect/dbcon.php';

$kumpulkomen = array();
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    if (isset($_GET['request'])) {
        $request = $_GET['request'];
    }

    if (isset($_GET['komen_id'])) {
        $komen_id = $_GET['komen_id'];
    }

    if ($request == '') {
        $querySelectkomen = $conn->query("SELECT C.Con_id, C.Con_name, C.Con_desc, C.Con_date, coalesce(R.reply,'') Con_reply, R.Con_id Contact_id FROM contact C LEFT JOIN contact_reply R ON C.Con_id = R.Con_id ORDER BY C.Con_date DESC");
        while ($komen = $querySelectkomen->fetch_assoc()) {
            $kumpulkomen[] = $komen;
        }
    } else if ($request = 'balas' && $komen_id !== '') {
        $querySelectkomen = $conn->prepare("SELECT * FROM `contact` WHERE Con_id = ?");
        $querySelectkomen->bind_param("i", $komen_id);
        $querySelectkomen->execute();
        $kumpuldata = $querySelectkomen->get_result();
        while ($komen = $kumpuldata->fetch_assoc()) {
            $kumpulkomen[] = $komen;

        }
    }
    echo json_encode($kumpulkomen);


} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['Nama']) && isset($_POST['Pesan'])) {
        $Namacustomer = $_POST['Nama'];
        $Pesancustomer = $_POST['Pesan'];

        if ($Namacustomer == '') {
            $Namacustomer = 'Anonymous';
        }

        if ($Pesancustomer == '') {
            $msg = 'Tolong isi pesan';
        } else {
            $queryInsertkomen = $conn->prepare("INSERT INTO `contact` (Con_name, Con_desc) VALUES (?, ?)");
            $queryInsertkomen->bind_param("ss", $Namacustomer, $Pesancustomer);
            if ($queryInsertkomen->execute()) {
                $msg = 'Berhasil mengirim pesan!';
            } else {
                $msg = 'Gagal mengirim pesan';
            }
        }
    } 
    else if (isset($_POST['komen_id']) && isset($_POST['balasan'])) {
        $komen_id = $_POST['komen_id'];
        $balesanadmin = $_POST['balasan'];

        if ($balesanadmin == '') {
            $msg = "tolong isi balasan";
        } else {
            $balesanadmin = "Reply dari Admin: " . $balesanadmin;
            $queryInsertbales = $conn->prepare("INSERT INTO `contact_reply` (reply, Con_id) VALUES (?, ?)");
            $queryInsertbales->bind_param("ss", $balesanadmin, $komen_id);
            if ($queryInsertbales->execute()) {
                $msg = 'Berhasil mengirim balasan!';
            } else {
                $msg = 'Gagal mengirim balasan';
            }
        }
    } 
    else if (isset($_POST['request']) && $_POST['request'] == 'deleteMsg' && isset($_POST['komen_id'])) {
        $komen_id = $_POST['komen_id'];
        $apusBalesan = $conn->prepare("DELETE FROM `contact` WHERE Con_id = ?");

        $apusBalesan->bind_param("i", $komen_id);

        if ($apusBalesan->execute()) {
            $apusBalesan2 = $conn->prepare("DELETE FROM `contact_reply` WHERE Con_id = ?");

            $apusBalesan2->bind_param("i", $komen_id);
            if ($apusBalesan2->execute()) {
                $msg = "Berhasil Menghapus Data Pesan";
            } else {
                $msg = "<sub>" . "Error: " . $apusBalesan2->error . "</sub>" . "</br></br> <b>Gagal Menghapus Berita</b>";
            }
        } else {
            $msg = "<sub>" . "Error: " . $apusBalesan->error . "</sub>" . "</br></br> <b>Gagal Menghapus Berita</b>";
        }
    } 
    else if (isset($_POST['request']) && $_POST['request'] == 'deleteRep' && isset($_POST['komen_id'])) {
        $komen_id = $_POST['komen_id'];
        $apusBalesan = $conn->prepare("DELETE FROM `contact_reply` WHERE Con_id = ?");

        $apusBalesan->bind_param("i", $komen_id);

        if ($apusBalesan->execute()) {
            $msg = "Berhasil Menghapus Data Balasan Pesan";
        } else {
            $msg = "<sub>" . "Error: " . $apusBalesan->error . "</sub>" . "</br></br> <b>Gagal Menghapus Berita</b>";
        }
    }
    echo $msg;
}

?>