<?php
require_once ("baglanti.php");
    $isim=$_POST["isim"];
    $email=$_POST["email"];
    $konu=$_POST["konu"];
    $mesaj=$_POST["mesaj"];
    
    $conn->prepare("INSERT INTO `iletisim` (`isim`, `email`, `konu`, `mesaj`) VALUES (?,?,?,?)")->execute([$isim, $email, $konu, $mesaj]);


    include("contact.php");
?> 