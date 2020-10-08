
<?php
include "baglanti.php";

if(isset($_POST['telefon']) && isset($_POST['sifre']) ) {
    $telefon=$_POST['telefon'];
    $sifre=$_POST['sifre'];

    $sorgu = $mysqli->prepare("UPDATE `kestir2db`.`users` SET `sifre`='$sifre' WHERE `telefon`='$telefon';");

    if ($baglanti->errno > 0) {
        die("<b>Sorgu Hatası:</b> " . $baglanti->error);
    }

    $sorgu->bind_param("sifre",$sifre, $telefon);
    $sorgu->execute();

    if ($sorgu->affected_rows > 0) {
        session_start();
        $_SESSION['sistemmesaji']="YENİ ŞİFRENİZLE GİRİŞ YAPABİLİRSİNİZ.";
        $_SESSION['sistemmesajicss']="is-link is-light";
        header("Location:index.php");
    } else {
        session_start();
        $_SESSION['sistemmesaji']="BU TELEFON NUMARASINA AİT KAYIT BULUNMAMAKTADIR.";
        $_SESSION['sistemmesajicss']="is-danger is-light";
        header('Location: index.php');
    }

    $sorgu->close();
    $baglanti->close();

}
?>