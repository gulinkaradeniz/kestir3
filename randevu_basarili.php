<?php
include "includes/loginkontrol.php";
include "includes/baglanti.php";
$title="Randevularım";
include "includes/header.php";
?>
<body>
    <div class="accountbg"></div>
    <div class="row">
        <div class="col-1 col-sm-2"></div>
        <div class="col-10 col-sm-8">
            <div class="card card-pages m-t-40 shadow-none">
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="uye_anasayfa.php">Üye Anasayfa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="includes/cikis.php">Çıkış</a>
                        </li>
                    </ul>
                <div class="text-center m-t-0 m-b-15">
                                <a href="index.php" class="logo logo-admin"><img src="assets\images\hair.png" width="200" height="200"></a>
                        </div>
                    <h5 class="font-18 text-center">RANDEVULARINIZ</h5>
                    <?php include "includes/sistemmesaji.php" ?>
                        <div class="form-group text-center m-t-20">
                        </div>
                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Tarih</th>
                                                <th>Saat</th>
                                                <th>İşlem</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $userid=intval($_SESSION['userid']);    
                                            $sorgu = $mysqli->query("SELECT * FROM tasks WHERE status=1 and iptal=0 and user=$userid ORDER BY taskdate DESC"); 
                                                if($sorgu->num_rows>0){
                                                    while($satir=$sorgu->fetch_assoc()){?>
                                                        <p class="subtitle">
                                                            <div class="box">   
                                                                <div class="level-relative">
                                                                    <?php
                                                                    $tarih=date("d/m/Y ",strtotime($satir["taskdate"]));
                                                                    $saat=date("H:i",strtotime($satir["taskdate"]));
                                                                    $id=$satir["id"];?>
                                                                    <tr>
                                                                    <td><?=$tarih;?></td>
                                                                    <td><?=$saat;?></td>
                                                                    <?php
                                                                    $islem = $satir["operations"];
                                                                        $dizi = explode (",",$islem);
                                                                        
                                                                        foreach($dizi as $anahtar => $deger){
                                                                            $deger=intval($deger);
                                                                            $sorgu2 = $mysqli->query("SELECT * FROM islemler WHERE id=$deger");
                                                                            
                                                                            while($s = $sorgu2->fetch_assoc()){?>
                                                                                <td><?=$s["isim"];?></td><?php
                                                                            }   
                                                                        }
                                                                    
                                                                    
                                                                    ?>  
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