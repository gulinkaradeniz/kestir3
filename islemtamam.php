<?php
include "includes/baglanti.php";
$id=intval($_GET['id']);
$sorgu=$mysqli->query("UPDATE `tasks` SET `status`='0' WHERE `id`=$id");
if ($sorgu==true)
{
    $_SESSION['sistemmesaji']="RANDEVU TAMAMLANDI OLARAK İŞARETLENDİ.";
    $_SESSION['sistemmesajicss']="is-link is-light";
    header("location:admin_randevular.php"); 
}
else
{
    echo "Hata oluştu"; 
}
?>