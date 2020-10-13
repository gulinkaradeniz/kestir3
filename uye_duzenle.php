<?php
include "includes/baglanti.php";
$title="Üyeleri Düzenle";
include "includes/header.php";
$sorgu = $mysqli->query("SELECT * FROM users WHERE id =".(int)$_GET['id']); 
$sonuc = $sorgu->fetch_assoc(); 
?>

<body>
    <div class="accountbg"></div>
    <div class="row">
        <div class="col-1 col-sm-2"></div>
        <div class="col-10 col-sm-8">
        

                <div class="card card-pages m-t-40 shadow-none">
    
                    <div class="card-body">
                        <h5 class="font-18 text-center">ÜYE DÜZENLE</h5>
                        
                        <?php include "includes/sistemmesaji.php" ?>
    
                        <form class="form-horizontal m-t-30" action="" method="POST">
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>Ad Soyad</label>
                                    <input class="form-control" placeholder="Ad Soyad" name="adsoyad" required value="<?php echo $sonuc['adsoyad']; ?>">
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>Telefon</label>
                                    <input class="form-control"placeholder="Telefon" name="telefon" required value="<?php echo $sonuc['telefon']; ?>">

                                </div>
                            </div>

                            <div class="form-group text-center m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Düzenlemeyi Kaydet</button>
                                </div>
                            </div>
                        </form>
                    </div>
    
                </div>
        </div>
        <div class="col-1 col-sm-2"></div>
    </div>  
    <?php 

    if ($_POST) {
        
        $adsoyad = $_POST['adsoyad'];
        $telefon = $_POST['telefon'];

        if ($adsoyad<>"" && $telefon<>"") { 
        
            if ($mysqli->query("UPDATE users SET adsoyad = '$adsoyad', telefon = '$telefon' WHERE id =".$_GET['id'])) 
            {
                $_SESSION['sistemmesaji']="ÜYE DÜZENLENDİ.";
                $_SESSION['sistemmesajicss']="alert-success";
                header("location:admin_uyeler.php"); 
            
            }
            else
            {
                echo "Hata oluştu"; 
            }
        }
    }
    ?>    
    </body>
</html>
