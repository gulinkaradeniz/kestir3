
<?php
include "includes/baglanti.php";

if(isset($_POST['telefon']) && isset($_POST['sifre']) ) {
    $telefon=$_POST['telefon'];
    $sifre=$_POST['sifre'];
    $sql="SELECT * FROM kestir2db.users where telefon='$telefon' and sifre='$sifre'";
    $sonuc=mysqli_query($mysqli,$sql);

    if ($sonuc->num_rows==0){

        $_SESSION['login'] = false;
        $_SESSION['sistemmesaji']="GİRİŞ BAŞARISIZ!";
        $_SESSION['sistemmesajicss']="alert-danger";
        header('Location: index.php');
    }
    else{
        while($satir=mysqli_fetch_array($sonuc))
        {
            $_SESSION['telefon'] = $telefon;
            $_SESSION['userid'] = $satir['id'];
            $_SESSION['login'] = true;
            $_SESSION['isadmin'] = false;
            $_SESSION['sistemmesajicss']="alert-success";
            $_SESSION['sistemmesaji']="HOŞGELDİNİZ" . " " . $satir['adsoyad'];
            if($satir['isadmin']==1){
                $_SESSION['isadmin'] = true;
                header('Location: admin_randevular.php');
            }else{
                header('Location: index.php');

            }
        }
    }
}
?>