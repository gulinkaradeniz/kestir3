<?php
include "includes/baglanti.php";
$_SESSION['secilenislemler']=[];
if(isset($_POST['islemler'])) {
    $islemler = $_POST['islemler'];

    foreach($islemler as $islem) {
        
        $sorgu = $mysqli->query("SELECT isim FROM islemler WHERE id=$islem");
        if($sorgu->num_rows>0){
            while($satir=$sorgu->fetch_assoc()){?>
        
            <?php
            array_push($_SESSION['secilenislemler'], $islem);?>
            <br>
            
            <?php
            }
        }
        
    }
    $_SESSION['sistemmesaji']="YAPILACAK İŞLEM SEÇİLDİ.";
    $_SESSION['sistemmesajicss']="alert-success";
    header('Location: randevu_al.php');
} else {
    $_SESSION['sistemmesaji']="BİR İŞLEM SEÇİNİZ.";
    $_SESSION['sistemmesajicss']="alert-danger";
    header('Location: islemler.php');
}
?>