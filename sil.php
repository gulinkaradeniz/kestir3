<?php 

if ($_GET) 
{
include "includes/baglanti.php";

    if ($mysqli->query("DELETE FROM islemler WHERE id =".(int)$_GET['id'])) 
    {
        $_SESSION['sistemmesaji']="İŞLEM SİLİNDİ.";
        $_SESSION['sistemmesajicss']="alert-danger";
        header("location:admin_islem_ekle.php");
    }
}

?>