<?php
include "includes/loginkontrol.php";
include "includes/baglanti.php";
if($_SESSION['isadmin'] == false){
    header('Location: index.php');
    die();
}if(isset($_GET["sorgu"])){
$filtrele=$_GET["sorgu"];}
else{$filtrele="";}
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
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Ad Soyad</th>
                                                <th>Telefon</th>
                                                <th>Tarih</th>
                                                <th>Saat</th>
                                                <th>İşlem</th>
                                                <th>Tamamlandı/İptal Edildi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $userid=intval($_SESSION['userid']);    
                                            $query = "SELECT tasks.id,tasks.taskdate,users.adsoyad,users.telefon,tasks.operations FROM tasks INNER JOIN users ON users.id=tasks.user WHERE status=1 and iptal=0";
                                            if(isset($_GET['sorgu'])) {
                                                if($_GET['sorgu'] == "iptal") $query = "SELECT tasks.id,tasks.taskdate,users.adsoyad,users.telefon,tasks.operations FROM tasks INNER JOIN users ON tasks.user=users.id WHERE iptal=1";
                                                if($_GET['sorgu'] == "bekleyen") $query = "SELECT tasks.id,tasks.taskdate,users.adsoyad,users.telefon,tasks.operations FROM tasks INNER JOIN users ON tasks.user=users.id WHERE status=1 and iptal=0";
                                                if($_GET['sorgu'] == "tamamlanan") $query = "SELECT tasks.id,tasks.taskdate,users.adsoyad,users.telefon,tasks.operations FROM tasks INNER JOIN users ON tasks.user=users.id  WHERE  status=0";
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
                                                                    <form method="POST">
                                                                        <nav class="level is-mobile">
                                                                        <div class="level-left">
                                                                            <td><a  href="islemtamam.php?id=<?php echo $id; ?>"class="level-item" aria-label="reply">
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
                                                                    </form>
                                                                    
                                                                    </tr>   
                                                                </div>
                                                                
                                                            </div>
                                                        </p>
                                                                    
                                                        <?php
                                                        
                                                    }
                                                }
                                                else{
                                                    ?>
                                                    <div class="notification is-danger">
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
    </div>       
</body>
</html>