<?php 

if ($_GET) 
{
include("includes/baglanti.php");
$gelenid=(int)$_GET['id'];
$sorgu="SELECT tasks.id,tasks.taskdate,users.adsoyad,users.telefon,tasks.operations FROM tasks INNER JOIN users ON tasks.user=$gelenid WHERE status=1 and iptal=0";
$sonuc=mysqli_query($mysqli,$sorgu);
    if($sonuc->num_rows==0){
        if ($mysqli->query("DELETE FROM users WHERE id =".(int)$_GET['id'])) 
        {
            session_start();
            $_SESSION['sistemmesaji']="ÜYE SİLİNDİ.";
            $_SESSION['sistemmesajicss']="alert-danger";
            header("location:admin_uyeler.php");
        }
    }
    else{
        session_start();
        $_SESSION['sistemmesaji']="ÜYENİN İŞLEMİ DEVAM ETTİĞİ İÇİN SİLİNEMEZ.";
        $_SESSION['sistemmesajicss']="alert-danger";
        header("location:admin_uyeler.php");
        
    }
}

?>