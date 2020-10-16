<?php 
session_start();
include "includes/baglanti.php";
$title="Randevular";
include "includes/header.php";
?>
<body>
    <div class="accountbg"></div>
    <div class="row">
        <div class="col-1 col-sm-2"></div>
        <div class="col-10 col-sm-8">
                <div class="card card-pages m-t-40 shadow-none">
                    <ul class="navbar-right list-inline float-right mb-0 btn-lg">
                        <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fas fa-align-justify"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="admin_randevular.php"><span> RANDEVULAR </span></a>
                                <a class="dropdown-item" href="admin_uyeler.php"><span> ÜYELER </span></a>
                                <a class="dropdown-item" href="admin_islem_ekle.php"><span> İŞLEMLER </span></a>
                                <a class="dropdown-item" href="includes/cikis.php"><span> ÇIKIŞ </span></a>
                            </div>
                        </li>
                    </ul>
    
                    <div class="card-body">
                        <h5 class="font-18 text-center">İŞLEMLER</h5>
                        
                        <?php include "includes/sistemmesaji.php" ?>
    
                        <form class="form-horizontal m-t-30" action="admin_islem_kontrol.php" method="POST">
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>İşlem</label>
                                    <input name="isim"class="form-control" type="text" required="" placeholder="İşlem">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                        <label>İşlem Fiyatı</label>
                                    <input name="sure"class="form-control" type="number" required="" placeholder="..TL">
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>İşlem Süresi</label>
                                    <input name="sure"class="form-control" type="number" required="" placeholder="..saat">
                                </div>
                            </div>

                            <div class="form-group text-center m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">İşlem Ekle</button>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>İşlem</th>
                                                        <th>İşlem Fiyatı</th>
                                                        <th>İşlem Süresi</th>
                                                        <th>Sil/Düzenle</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <div class="content">
                                                    <?php
                                                
                                                    $sorgu = $mysqli->query("SELECT * FROM islemler");
                                                    if($sorgu->num_rows>0){
                                                        while($satir=$sorgu->fetch_assoc()){?>
                                                        <p class="subtitle">
                                                            <div class="box">   
                                                                <div class="level-left">
                                                                    <?php
                                                                    $id = $satir['id'];?>
                                                                    <tr>
                                                                    <td><?=$satir["isim"];?></td>
                                                                    <td><?=$satir["fiyat"];?></td>
                                                                    <td><?=$satir["sure"];?></td>
                                                                    

                                                                    <td><a href="#" onclick="uyari2('<?= $satir["isim"]; ?>',<?= $id; ?>);" class="level-item" aria-label="retweet">
                                                                    <span class="icon has-text-danger">
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </span>
                                                                    </a>
                                                                    <span>&nbsp;&nbsp;</span>
                                                                    <a href="duzenle.php?id=<?php echo $id; ?>" class="level-item" aria-label="like">
                                                                    <span class="icon is-small">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </span>
                                                                    </a></td>
                                                                    </tr>
                                                                </div>
                                                                <script>
                                                                function uyari2(isim,id) {
                                                                    var delUrl="sil.php?id="+id;
                                                                    if (confirm(isim + " işlemini silmek istediğinize emin misiniz?")) {
                                                                        document.location = delUrl; 
                                                                    } 
                                                                }
                                                                </script>
                                                            </div>

                                                        </p>
                                                            
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    </div>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
            $sure = $_POST['sure'];

            if ($isim<>"" && $sure<>"") { 
               
                if ($mysqli->query("UPDATE islemler SET isim = '$isim', sure = '$sure' WHERE id =".$_GET['id'])) 
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