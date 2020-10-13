
<?php
include "includes/baglanti.php";

$tarih=$_POST['tarih'];
$_SESSION["secilentarih"]=$tarih;
//$tarih=$_SESSION["secilentarih"];
$tarih2=date("Y-m-d H:i:s",strtotime($tarih));
//$tarih2=date("d/m/Y",strtotime($tarih));
$saat= date("H:i:s",strtotime($tarih));

$sql="SELECT * FROM kestir2db.tasks WHERE taskdate = '$tarih2'";
$sonuc2=mysqli_query($mysqli,$sql);

if ($sonuc2->num_rows==0){
    $_SESSION['sistemmesaji']="TARİH SEÇİLDİ.";
    $_SESSION['sistemmesajicss']="alert-success";
    header('Location: randevu_al.php');

    

}else{
    $_SESSION['sistemmesaji']="BAŞKA BİR SAATE RANDEVU ALINIZ.";
    $_SESSION['sistemmesajicss']="alert-danger";
    header('Location: tarihsaat.php');
  
    


}



?>