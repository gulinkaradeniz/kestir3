<?php 
include "includes/baglanti.php";

$sorgu = $mysqli->query("SELECT * FROM islemler WHERE id =".(int)$_GET['id']); 
$sonuc = $sorgu->fetch_assoc(); 
$title="İşlem Düzenle";
include "includes/header.php";
?>
<body>
    <div class="accountbg"></div>
    <div class="row">
        <div class="col-1 col-sm-2"></div>
        <div class="col-10 col-sm-8">
        

                <div class="card card-pages m-t-40 shadow-none">
    
                    <div class="card-body">
                        <h5 class="font-18 text-center">DÜZENLE</h5>
                        
                        <?php include "includes/sistemmesaji.php" ?>
    
                        <form class="form-horizontal m-t-30" action="" method="POST">
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>İşlem</label>
                                    <input name="isim"class="form-control" type="text" required="" placeholder="İşlem" value="<?php echo $sonuc['isim']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-12">
                                        <label>İşlem Fiyatı</label>
                                    <input name="fiyat"class="form-control" type="number" required="" placeholder="..TL" value="<?php echo $sonuc['fiyat']; ?>">
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>İşlem Süresi</label>
                                    <input name="sure"class="form-control" type="number" required="" placeholder="..saat" value="<?php echo $sonuc['sure']; ?>">
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
            
            $isim = $_POST['isim'];
            $fiyat = $_POST['fiyat'];
            $sure = $_POST['sure'];

            if ($isim<>"" && $fiyat<>"" && $sure<>"") { 
               
                if ($mysqli->query("UPDATE islemler SET isim = '$isim', fiyat = '$fiyat', sure = '$sure' WHERE id =".$_GET['id'])) 
                {
                    session_start();
                    $_SESSION['sistemmesaji']="İŞLEM DÜZENLENDİ.";
                    $_SESSION['sistemmesajicss']="alert-success";
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
