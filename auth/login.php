<?php
session_start();
if(isset($_SESSION['autentikasi'])){
    header("Location: ../index.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>412021012_Westlee Matthew Agustinus_Autentikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="auth.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">
        <h1>Login</h1>
        <h5>412021012_Westlee Matthew Agustinus</h5>
        <form method="POST" id="formauth">
            <div class="mb-3">
                <label for="userid" class="form-label">User_ID</label>
                <input type="text" class="form-control" id="userid" name="iduser">
            </div>
            <div class="mb-3">
                <label for="pw" class="form-label">Password</label>
                <input type="password" class="form-control" id="pw" name="pass">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="showpass()">
                <label class="form-check-label" for="exampleCheck1">Show Password</label>
            </div>
            <button type="button" class="btn btn-primary" id="tombol" name="klik">Submit</button>
        </form>

        <p>Don't have an account? <a href="register.php">Register</a></p>
        <a href="../index.php"><button type="button" class="btn btn-outline-secondary">Back to Dashboard</button></a>

    </div>

<?php
include '../element_frontend/modal.php';
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

<script>
    function showpass() {
        var passArr = $('#pw');
        if (passArr.attr("type") == "password") {
            passArr.attr("type", "text");
        } else {
            passArr.attr("type", "password");
        }
    }

    $(document).ready(function () {
        $('button').on('click', function () {
            var input = {
                UID: $('#userid').val(),
                Pass: $('#pw').val(),
                request: 'login',
            }

            const url = '../backend/backend.php'
            $.ajax({
                url: url,
                type: 'post',
                data: input,
                success: function (response) {
                    if (response == "Autentikasi Berhasil") {
                        $("#judulmodal").html("Berhasil");
                        $("#pesanmodal").html(response);
                        $("#inimodal").modal("show");
                        $('#modalOK').on('click', function(){
                            $("#inimodal").modal("hide");
                            window.location.replace("../index.php");
                        })
                    }
                    else {
                        $("#judulmodal").html("Terjadi Kesalahan");
                        $("#pesanmodal").html(response);
                        $("#inimodal").modal("show");
                    }
                }
            })
        })

    })
</script>

</html>