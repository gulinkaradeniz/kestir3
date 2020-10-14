<?php
include "includes/baglanti.php";
if(isset($_POST['telefon']) && isset($_POST['sifre']) && isset($_POST['adsoyad']) && isset($_POST['email']) ) {
    $telefon=$_POST['telefon'];
    $sifre=$_POST['sifre'];
    $adsoyad=$_POST['adsoyad'];
    $email=$_POST['email'];

    $sql="SELECT telefon,sifre FROM users where telefon='$telefon'";
    $sonuc2=mysqli_query($mysqli,$sql);

    if ($sonuc2->num_rows==0){
        $sqlekle="INSERT INTO `users` (`adsoyad`, `telefon`, `email`, `sifre`) VALUES ('$adsoyad', '$telefon', '$email', '$sifre')";
        $sonuc=mysqli_query($mysqli,$sqlekle);

        $_SESSION['telefon'] = $telefon;
        $_SESSION['login'] = true;
        $_SESSION['sistemmesaji']="KAYIT BAŞARILI";
        $_SESSION['sistemmesajicss']="alert-success";
        header('Location: index.php');
        
    }
    else{
        session_start();
        $_SESSION['telefon'] = $telefon;
        $_SESSION['login'] = false;
        $_SESSION['sistemmesaji']="BU TELEFON NUMARASINA AİT KAYIT BULUNMAKTADIR.";
        $_SESSION['sistemmesajicss']="alert-danger";
        header('Location: kayit_ol.php');
    }



}
?>