<?php 

if ($_GET) 
{

include("includes/baglanti.php");

if ($mysqli->query("DELETE FROM users WHERE id =".(int)$_GET['id'])) 
{
    $_SESSION['sistemmesaji']="ÜYE SİLİNDİ.";
    $_SESSION['sistemmesajicss']="alert-danger";
    header("location:admin_uyeler.php");
}
}

?>