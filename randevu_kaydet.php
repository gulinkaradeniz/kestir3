<?php
include "includes/baglanti.php";
session_start();
if(isset($_SESSION['secilentarih']) && isset($_SESSION['secilenislemler']) && isset($_SESSION['userid']) ) {

    /*$sql="SELECT telefon,sifre FROM users where telefon='$telefon'";
    $sonuc2=mysqli_query($mysqli,$sql);*/
    $tarih= $_SESSION['secilentarih'];
    $islem= implode(",",$_SESSION['secilenislemler']);
    $userid= $_SESSION['userid'];

 
    $sqlekle= "INSERT INTO tasks (user, operations, taskdate, status) VALUES ('$userid','$islem', '$tarih', '1')";
    $sonuc=mysqli_query($mysqli,$sqlekle);
    unset($_SESSION['secilenislemler']);
    unset($_SESSION['secilentarih']);
    unset($_SESSION['secilenuyeler']);
    if($_SESSION['isadmin']){
        $_SESSION['sistemmesaji']="RANDEVU OLUŞTURDUNUZ.";
        $_SESSION['sistemmesajicss']="alert-success";
        header('Location: admin_randevular.php');
    }else{
        $sayac=$_SESSION["sayac"];
        $sayac++;
        $_SESSION["sayac"]=$sayac;
        $_SESSION['sistemmesaji']="RANDEVU OLUŞTURULDU.";
        $_SESSION['sistemmesajicss']="alert-success";
        header('Location: randevu_basarili.php');
    }
}
else{
    
    $_SESSION['sistemmesaji']="RANDEVU OLUŞTURULAMADI.";
    $_SESSION['sistemmesajicss']="alert-danger";
    header('Location: randevu_al.php');
}




?>