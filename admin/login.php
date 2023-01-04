<?php

session_start();
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="post" action="">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pwd" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        
                                        <input type="submit" class="btn btn-primary btn-user btn-block">
                                        
                                        </input>
                                    </form>
                                    <hr>
                                    <?php
                                    $conn = new PDO("mysql:host=localhost;dbname=book-store;charset=utf8", "root", "");
                                    if (isset($_POST['username']) && isset($_POST['pwd'])) {
                                        $username = $_POST['username'];
                                        $pwd = $_POST['pwd'];
                                        //echo $username;
                                        $bakim = $conn
                                            ->query("SELECT * FROM kullanicilar WHERE username = '" . $_POST['username'] . "'")
                                            ->fetch();

                                        if ($bakim[1] == $_POST[''] && $bakim[2] == $_POST['']) {
                                            echo "<p class='text-danger'>Lütfen Bilgilerinizi Doğru Giriniz</p>";
                                        } else if ($bakim[1] == $_POST['username'] && $bakim[2] == $_POST['pwd']) {
                                            echo "<p class='text-success'>Giris Basarili</p>";
                                            $_SESSION['username'] = $_POST['username'];
                                            echo ("<script> window.location.href='index.php'; </script>");
                                        } else {
                                            echo "<p class='text-danger'>Parola Veya Kullanici Adi yanlis</p>";
                                        }
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>