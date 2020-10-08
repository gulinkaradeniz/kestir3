<?php 
include "includes/baglanti.php";

$sorgu = $mysqli->query("SELECT * FROM islemler WHERE id =".(int)$_GET['id']); 
$sonuc = $sorgu->fetch_assoc(); 
$title="İşlem Düzenle";
include "includes/header.php";
?>
<body>
        <div class="accountbg"></div>
        
        <div class="wrapper-page">
                <div class="card card-pages shadow-none">
    
                    <div class="card-body">
                        <h5 class="font-18 text-center">DÜZENLE</h5>
                        
                        <?php include "includes/sistemmesaji.php" ?>
    
                        <form class="form-horizontal m-t-30" action="sifrekontrol.php" method="POST">
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>İşlem</label>
                                    <input name="isim"class="form-control" type="text" required="" placeholder="İşlem">
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>İşlem Saati</label>
                                    <input name="sure"class="form-control" type="text" required="" placeholder="..saat">
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
            <?php 

        if ($_POST) {
            
            $isim = $_POST['isim'];
            $sure = $_POST['sure'];

            if ($isim<>"" && $sure<>"") { 
               
                if ($mysqli->query("UPDATE islemler SET isim = '$isim', sure = '$sure' WHERE id =".$_GET['id'])) 
                {
                    session_start();
                    $_SESSION['sistemmesaji']="İŞLEM DÜZENLENDİ.";
                    $_SESSION['sistemmesajicss']="is-link is-light";
                    header("location:admin_islem_ekle.php"); 
                
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
