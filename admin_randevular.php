<?php
include "includes/loginkontrol.php";
include "includes/baglanti.php";
if($_SESSION['isadmin'] == false){
    header('Location: index.php');
    die();
}if(isset($_GET["sorgu"])){
$filtrele=$_GET["sorgu"];}
else{$filtrele="bekleyen";}
if(isset($_SESSION["sayac"])){
    $_SESSION["sayac"];}
    else{$_SESSION["sayac"]=0;}
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

                    
                    <li class="dropdown notification-list list-inline-item">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-bell-outline noti-icon"></i>
                            <span class="badge badge-pill badge-danger noti-icon-badge"><?=$_SESSION["sayac"]?></span>
                        </a>
                        <div class="dropdown-menu" style="">
                            <?php 
                            if($_SESSION["sayac"]){
                            ?>
                            <h6 class="dropdown-item-text">
                                    Bildirimler
                                </h6>
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 410.792px;"><div class="slimscroll notification-item-list" style="overflow: hidden; width: auto; height: 410.792px;">
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i></div>
                                    <p class="notify-details"><b>Yeni bir randevu</b><span class="text-muted"><?=$_SESSION["sayac"]." "."YENİ RANDEVU VAR" ?></span></p>
                                </a>
                            </div><?php
                            } ?>
                            
                        </div>
                        <?php $_SESSION["sayac"]=0;?>
                    </li>
                </ul>
                <div class="card-body">
                    <h6 class="font-18 text-center">RANDEVULAR</h6>
                    <?php include "includes/sistemmesaji.php" ?>
                        <div class="form-group text-center m-t-20">
                            <div class="col-16">
                                <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" onclick="javascript:location.href='randevu_al.php'">Randevu Oluştur</button>
                            </div><hr>
                            <select name="mySelect" onchange="myFunction(this)"aria-controls="datatable" class="form-control form-control-sm">
                                <option value="bekleyen" <?= $filtrele == "bekleyen" ? "selected" : "" ?>>BEKLEYEN İŞLEMLER</option>
                                <option value="iptal" <?= $filtrele == "iptal" ? "selected" : "" ?>>İPTAL OLAN İŞLEMLER </option>
                                <option  value="tamamlanan" <?= $filtrele == "tamamlanan" ? "selected" : "" ?>>TAMAMLANAN İŞLEMLER</option>
                            </select>
                            <script>
                                function myFunction(m) {
                                window.location = '?sorgu=' + m.value;
                                }
                                </script>
                        </div>
                        
                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <?php if(($filtrele == "iptal") || ($filtrele == "tamamlanan")){
                                    $_SESSION["filtre"]=$filtrele?>
                                    <div class="text-right">
                                        <a href="temizle.php">Hepsini Temizle</a>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Ad Soyad</th>
                                                <th>Telefon</th>
                                                <th>Tarih</th>
                                                <th>Saat</th>
                                                <th>İşlem</th>
                                                <th>Tahmini Fiyat</th>
                                                <?php if($filtrele == "bekleyen"){?>
                                                <th>Tamamlandı/İptal Edildi</th>
                                                <?php
                                                }
                                                ?>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $userid=intval($_SESSION['userid']);    
                                            $query = "SELECT tasks.id,tasks.taskdate,users.adsoyad,users.telefon,tasks.operations,tasks.fiyat FROM tasks INNER JOIN users ON users.id=tasks.user WHERE status=1 and iptal=0 ORDER BY taskdate asc";
                                            if(isset($_GET['sorgu'])) {
                                                if($_GET['sorgu'] == "iptal") $query = "SELECT tasks.id,tasks.taskdate,users.adsoyad,users.telefon,tasks.operations,tasks.fiyat FROM tasks INNER JOIN users ON tasks.user=users.id WHERE iptal=1 ORDER BY taskdate asc";
                                                if($_GET['sorgu'] == "bekleyen") $query = "SELECT tasks.id,tasks.taskdate,users.adsoyad,users.telefon,tasks.operations,tasks.fiyat FROM tasks INNER JOIN users ON tasks.user=users.id WHERE status=1 and iptal=0 ORDER BY taskdate asc";
                                                if($_GET['sorgu'] == "tamamlanan") $query = "SELECT tasks.id,tasks.taskdate,users.adsoyad,users.telefon,tasks.operations,tasks.fiyat FROM tasks INNER JOIN users ON tasks.user=users.id  WHERE  status=0 ORDER BY taskdate asc";
                                            }
                                            $sorgu =$mysqli->query($query);
                                                if($sorgu->num_rows>0){
                                                    while($satir=$sorgu->fetch_assoc()){?>
                                                        <p class="subtitle">
                                                            <div class="box">   
                                                                <div class="level-relative">
                                                                    <?php
                                                                    $tarih=date("d/m/Y ",strtotime($satir["taskdate"]));
                                                                    $saat=date("H:i",strtotime($satir["taskdate"]));
                                                                    $id=intval($satir["id"]);?>
                                                                    <tr>
                                                                    <th scope="row"><?=$satir["adsoyad"];?></th>
                                                                    <td><?=$satir["telefon"];?></td>
                                                                    <td><?=$tarih;?></td>
                                                                    <td><?=$saat;?></td>
                                                                    <td>
                                                                    <?php
                                                                    $islem = $satir["operations"];
                                                                        $dizi = explode (",",$islem);
                                                                        
                                                                        foreach($dizi as $anahtar => $deger){
                                                                            $deger=intval($deger);
                                                                            $sorgu2 = $mysqli->query("SELECT * FROM islemler WHERE id=$deger");
                                                                            
                                                                            while($s = $sorgu2->fetch_assoc()){?>
                                                                                <?=$s["isim"];?><br><?php
                                                                            }   
                                                                        }
                                                                    
                                                                    
                                                                    ?>  
                                                                    </td>
                                                                    <td>
                                                                    <?=$satir["fiyat"];?>
                                                                    </td>

                                                                    <?php if($filtrele == "bekleyen") {?>
                                                                        <form method="POST">
                                                                            <nav class="level is-mobile">
                                                                            <div class="level-left">
                                                                                <td><a  data-toggle="modal" data-target=".iletisim-modal"  onclick="kontrol(<?= $satir["fiyat"] ?>,<?= $id; ?>);" class="level-item" aria-label="reply">
                                                                                <span class="icon has-text-success">
                                                                                    <i class="fas fa-check-square"></i>
                                                                                </span>
                                                                                </a>
                                                                                <span>&nbsp;&nbsp;</span>
                                                                                <a href="islemiptal.php?id=<?php echo $id; ?>"class="level-item" aria-label="like">
                                                                                <span class="icon has-text-danger">
                                                                                    <i class="fas fa-ban"></i>
                                                                                </span>
                                                                                </a></td>
                                                                            </div>
                                                                            </nav>
                                                                        </form><?php
                                                                    }?>
                                                                    
                                                                    </tr>   
                                                                </div>
                                                                
                                                            </div>
                                                        </p>
                                                                    
                                                        <?php
                                                        
                                                    }
                                                }
                                                else{
                                                    ?>
                                                    <div class="alert-danger">
                                                    KAYIT BULUNAMADI.

                                                    </div>
                                                    <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1 col-sm-2"></div>
        <script>
        function kontrol(tutar,id) {
            console.log(tutar);
            console.log(id);
            document.getElementById("gizli_id").value=id;
            document.getElementById("islem_tutar").value=tutar;

        }
        </script>
</div>
    <div class="modal fade iletisim-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="mySmallModalLabel">İŞLEM TAMAMLANDI</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="media m-b-30">
                    <form class="form-horizontal m-t-30" action="" method="POST">
                        <div class="form-group">
                            <div>
                                    <label>İşlem Fiyatı</label>
                                <input name="fiyat"class="form-control" type="number" required="" placeholder="..TL" value="fiyat" id="islem_tutar">
                                <input name="islem_id" class="form-control" type="hidden" id="gizli_id" value="">
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div>
                                <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Düzenlemeyi Kaydet</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->   
<?php 

if ($_POST) {
    
    $fiyat = $_POST['fiyat'];
    $islem_id = $_POST['islem_id'];
    if ($fiyat<>"") { 
        $sorgu1=$mysqli->query("UPDATE tasks SET fiyat = '$fiyat' WHERE id =$islem_id");
        $sorgu=$mysqli->query("UPDATE `tasks` SET `status`='0' WHERE `id`=$islem_id");
        if ($sorgu1 && $sorgu) 
        {
            $_SESSION['sistemmesajicss']="alert-success";
            $_SESSION['sistemmesaji']="RANDEVU TAMAMLANDI OLARAK İŞARETLENDİ.";
            header("location:admin_randevular.php"); 
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