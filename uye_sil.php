<?php 

if ($_GET) 
{

include("includes/baglanti.php");

if ($mysqli->query("DELETE FROM users WHERE id =".(int)$_GET['id'])) 
{
    header("location:admin_uyeler.php");
}
}

?>