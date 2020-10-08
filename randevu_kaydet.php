<?php
include "includes/baglanti.php";
if(isset($_SESSION['secilentarih']) && isset($_SESSION['secilenislemler']) && isset($_SESSION['userid']) ) {

    /*$sql="SELECT telefon,sifre FROM kestir2db.users where telefon='$telefon'";
    $sonuc2=mysqli_query($mysqli,$sql);*/
    $tarih= $_SESSION['secilentarih'];
    $islem= implode(",",$_SESSION['secilenislemler']);
    $userid= $_SESSION['userid'];

 
    $sqlekle= "INSERT INTO tasks (user, operations, taskdate, status) VALUES ('$userid','$islem', '$tarih', '1')";
    $sonuc=mysqli_query($mysqli,$sqlekle);


    unset($_SESSION['secilenislemler']);
    unset($_SESSION['secilentarih']);
    $_SESSION['sistemmesaji']="RANDEVU OLUŞTURULDU.";
    $_SESSION['sistemmesajicss']="is-link is-light";
    header('Location: randevu_basarili.php');
}
else{
    
    $_SESSION['sistemmesaji']="RANDEVU OLUŞTURULAMADI.";
    $_SESSION['sistemmesajicss']="is-danger is-light";
    header('Location: randevu_al.php');
}




?>