<?php
include "includes/baglanti.php";
$id=intval($_GET['id']);
$sorgu=$mysqli->query("UPDATE `tasks` SET `iptal`='1' WHERE `id`=$id");
if ($sorgu==true)
{
    $_SESSION['sistemmesaji']="RANDEVU İPTAL EDİLDİ OLARAK İŞARETLENDİ.";
    $_SESSION['sistemmesajicss']="is-danger is-light";
    header("location:admin_randevular.php"); 
}
else
{
    echo "Hata oluştu"; 
}
?>