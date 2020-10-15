<?php 

if ($_GET) 
{
include "includes/baglanti.php";
$gelenislemid=(int)$_GET['id'];
$sorgu="SELECT tasks.id,tasks.taskdate,users.adsoyad,users.telefon,tasks.operations FROM tasks INNER JOIN users ON tasks.user=users.id WHERE status=1 and iptal=0 and operations=$gelenislemid";
$sonuc=mysqli_query($mysqli,$sorgu);
    if($sonuc->num_rows==0){
        if ($mysqli->query("DELETE FROM islemler WHERE id =".(int)$_GET['id'])) 
        {
            session_start();
            $_SESSION['sistemmesaji']="İŞLEM SİLİNDİ.";
            $_SESSION['sistemmesajicss']="alert-danger";
            header("location:admin_islem_ekle.php");
        }
    }
    else{
        session_start();
        $_SESSION['sistemmesaji']="İŞLEM BEKLENEN RANDEVULARDA OLDUĞU İÇİN SİLİNEMEZ.";
        $_SESSION['sistemmesajicss']="alert-danger";
        header("location:admin_islem_ekle.php");
        
    }
}

?>