<?php
session_start();
include "includes/baglanti.php";

if(isset($_POST['telefon']) && isset($_POST['sifre']) && isset($_POST['adsoyad']) && isset($_POST['email']) ) {
    $telefon=$_POST['telefon'];
    $sifre=$_POST['sifre'];
    $adsoyad=$_POST['adsoyad'];
    $email=$_POST['email'];

    $sql="SELECT * FROM users where telefon='$telefon'";
    $sonuc2=mysqli_query($mysqli,$sql);

    if ($sonuc2->num_rows==0){
        $sqlekle="INSERT INTO `users` (`adsoyad`, `telefon`, `email`, `sifre`) VALUES ('$adsoyad', '$telefon', '$email', '$sifre')";
        $sonuc=mysqli_query($mysqli,$sqlekle);
        $sorgu="SELECT * FROM users";
        $sonuc2=mysqli_query($mysqli,$sorgu);
        while($satir=mysqli_fetch_array($sonuc2))
        {
            $_SESSION['telefon'] = $telefon;
            $_SESSION['userid'] = $satir['id'];
            $_SESSION['login'] = true;
            $_SESSION['isadmin'] = false;
            $_SESSION['sistemmesajicss']="alert-success";
            $_SESSION['sistemmesaji']="HOŞGELDİNİZ" . " " . $satir['adsoyad']." ". "KAYIT BAŞARILI";
            if($satir['isadmin']==1){
                $_SESSION['isadmin'] = true;
                header('Location: admin_randevular.php');
            }else{
                header('Location: index.php');
            }
        }

        
    }
    else{

        $_SESSION['telefon'] = $telefon;
        $_SESSION['login'] = false;
        $_SESSION['sistemmesaji']="BU TELEFON NUMARASINA AİT KAYIT BULUNMAKTADIR.";
        $_SESSION['sistemmesajicss']="alert-danger";
        header('Location: kayit_ol.php');
    }



}
?>