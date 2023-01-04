

<?php

session_start();
  if(!isset($_SESSION['username'])){
    header("Location: login.php");
  }
$conn = new PDO("mysql:host=localhost;dbname=book-store;charset=utf8", "root", "");



if(isset($_POST['submitCalisan'])){
    
    $urun_adet = $_POST['urun_adet'];
    $urun_isim = $_POST['urun_ismi'];
    $gorsel = $_GET['duzenle'].$_FILES['gorsel']['name'];
    $img_tmp = $_FILES['gorsel']['tmp_name'];
    move_uploaded_file($img_tmp, "../assets/img/$gorsel");
    $guncelle = $conn->prepare("UPDATE index_kitaplar SET urun_adet=?,urun_ismi=?,gorsel=? WHERE id=?");
    $kontrol = $guncelle->execute([$urun_adet, $urun_isim, $gorsel,$_GET['duzenle']]);

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

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Panel</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Anasayfa</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Anasayfa İçerik:</h6>
                        <a class="collapse-item" href="#">Hero section</a>
                        <a class="collapse-item" href="#">Anasayfa kitap işlemleri</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Tümünü Gör</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="#">Kitap Ekle</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <form action="" method="POST">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button class="">
                        <button class="nav-link" name="cikis" >Cikis Yap</button>
                    </button>

                </nav>
            </form>
            <?php
            if(isset($_POST['cikis'])){
                session_destroy();
                echo("<script> window.location.href='login.php'; </script>");
            }
        ?>





                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Anasayfa</h1>
                    </div>
                </div>
                <!-- /.container-fluid -->



                <div class="body flex-grow-1 px-3" style="width: 900px; border-right: 1px solid #0000003b;">
    <h2 style="margin: 20px 5px;">Çalışanları Düzenle / Sil</h2>
    <hr>
                        <?php
                                $conn = new PDO("mysql:host=localhost; dbname=book-store;charset=utf8", "root", "");


                        $veri = $conn
                            ->query("SELECT * FROM index_kitaplar")
                            ->fetchAll();
                        ?>
                        <?php

                        foreach ($veri as $row) {

                        ?>
    <div class="user-content" style="display: flex;
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    justify-content: space-between;
    align-items:center;">
        <div class="user-name">
        <h6>Çalışanın İsmi</h6>
        <textarea name="isim" id="isim" cols="35" rows="2">  <?php echo $row['urun_adet'] ?></textarea>
        </div>
        <div class="user-nick">
        <h6>Çalışanın Ünvanı</h6>
        <textarea name="isim" id="isim" cols="35" rows="2">  <?php echo $row['urun_ismi'] ?></textarea>

        </div>
        <img src="../assets/img/<?php echo $row['gorsel'] ?>" alt="" width="100px" height="100px">

        <a href="index.php?duzenle=<?php echo $row['id'] ?>" class="btn btn-info" style="width:90px; text-align: center;
    height: 40px;">Duzenle</a>  

        <a href="index.php?sil=<?php echo $row['id'] ?>" class="btn btn-danger" style="width: 90px;
    text-align: center;
    height: 40px;">Sil</a>
    </div>
    <hr>
    <?php
    }
    ?>













<div class="body flex-grow-1 px-3" style="width: 400px;
    /* border-right: 1px solid #0000003b; */
    position: fixed;
    right: 20px;
    top: 85px;
    padding-bottom:5px">

<h2 style="margin: 20px 5px;">Düzenle</h2>


<?php


if (isset($_GET['sil'])) {
    $sil = $conn->prepare("DELETE FROM index_kitaplar WHERE id=:id");
    $kontrol = $sil->execute(array(
        'id' => $_GET['sil']
    ));

}


if (isset($_GET['duzenle'])) {
    $duzenle = $conn->prepare("SELECT * FROM index_kitaplar WHERE id=:id");
    $duzenle->execute(array(
        'id' => $_GET['duzenle']
    ));

    $row = $duzenle->fetch(PDO::FETCH_ASSOC);
    
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group" style="    margin-bottom:5px;">
            <label for="isim">Calisan Ismi</label>
            <input type="text" class="form-control" name="urun_adet" id="isim" value="<?php echo $row['urun_adet'] ?>">
        </div>
        <div class="form-group" style="    margin-bottom: 5px;">
            <label for="unvan">Calisan Unvan</label>
            <input type="text" class="form-control" name="urun_ismi" id="unvan" value="<?php echo $row['urun_ismi'] ?>">
        </div>
        <div class="form-group" style="    margin-bottom: 5px;">
            <label for="img">Calisan Resmi</label>
            <input type="file" accept="image/*" class="form-control" name="gorsel" id="gorsel" value="<?php echo $row['gorsel'] ?>">
        </div>
        <button type="submit" name="submitCalisan" class="btn btn-primary">Guncelle</button>
    </form>
    
    <?php
}
?>


</div>

<div class="body flex-grow-1 px-3" style="width: 400px;
    border-top: 1px solid #0000003b;
    position: fixed;
    right: 20px;
    top: 420px;">

<h2 style="margin: 20px 5px;">Ekle</h2>


<?php


if (isset($_GET['sil'])) {
    $sil = $conn->prepare("DELETE FROM index_kitaplar WHERE id=:id");
    $kontrol = $sil->execute(array(
        'id' => $_GET['sil']
    ));

}


if (isset($_GET['duzenle'])) {
    $duzenle = $conn->prepare("SELECT * FROM index_kitaplar WHERE id=:id");
    $duzenle->execute(array(
        'id' => $_GET['duzenle']
    ));

    $row = $duzenle->fetch(PDO::FETCH_ASSOC);

    if(isset($_POST['submitEkle'])){
  $urun_adet= $_POST['urun_adet'];
  $urun_isim = $_POST['urun_ismi'];
  $gorsel = file_get_contents($_FILES['gorsel']['tmp_name']);
  $ekleİmgName=addslashes($_FILES['ekleİmg']['name']);

  $conn->prepare("INSERT INTO `index_kitaplar`(`adet`,`isim`,`gorsel`) VALUES (?,?,?)")->execute([$urun_adet,$urun_isim,$gorsel]);

}
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group" style="    margin-bottom: 5px;">
            <label for="isim">Calisan Ismi</label>
            <input type="text" class="form-control" name="urun_adet" id="isim" value="" placeholder="İsim Ekleyiniz">
        </div>
        <div class="form-group" style="    margin-bottom: 5px;">
            <label for="unvan">Calisan Unvan</label>
            <input type="text" class="form-control" name="urun_ismi" id="unvan" value="" placeholder="Unvan Ekleyiniz">
        </div>
        <div class="form-group" style="    margin-bottom: 5px;">
            <label for="img">Calisan Resmi</label>
            <input type="file" accept="image/*" class="form-control" name="gorsel" id="gorsel" value="<?php echo $row['gorsel'] ?>">
        </div>
        <button type="submit" name="submitEkle" class="btn btn-success" style="width: 90px;">Ekle</button>
    </form>
    
    <?php
}
?>

































</div>

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>