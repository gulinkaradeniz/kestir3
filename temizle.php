<?php 
session_start();
include("includes/baglanti.php");
$filtre=$_SESSION["filtre"];

if (( $filtre== "iptal")) {
    $mysqli->query("DELETE FROM tasks WHERE iptal=1");

    $_SESSION['sistemmesaji']="İPTAL OLAN İŞLEMLER SİLİNDİ.";
    $_SESSION['sistemmesajicss']="alert-danger";
    header("location:admin_randevular.php");
}
else{
    $mysqli->query("DELETE FROM tasks WHERE status=0");

    $_SESSION['sistemmesaji']="TAMAMLANAN İŞLEMLER SİLİNDİ.";
    $_SESSION['sistemmesajicss']="alert-danger";
    header("location:admin_randevular.php");

}
?>