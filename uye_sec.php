<?php
include "includes/loginkontrol.php";
include "includes/baglanti.php";
unset($_SESSION['secilenuyeler']);
$title="Üye Seç";
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
                
                    <div class="row">
                        
                            <div class="card m-b-30 card-body">
                            <h5 class="font-18 text-center">ÜYELER</h5>
                                <?php include "includes/sistemmesaji.php" ?>
                                <div class="button-items">
                                <form action="randevu_al.php" method="POST">
                                    <?php
                                    $sorgu3 = $mysqli->query("SELECT * FROM users WHERE isadmin='0'");
                                    
                                    ?>
                                    <div class="col-sm-12">
                                        <select class="form-control" name=uyeler>
                                            <?php 
                                            while($satir3=$sorgu3->fetch_assoc()){
                                                $dizi=$satir3["adsoyad"]."-".$satir3["telefon"];
                                                echo "<option value=". $satir3["id"] .">".$dizi."</option>";
                                                
                                                
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="form-group text-center m-t-20">
                                        <div class="col-12">
                                            <button class="btn btn-primary btn-block btn-lg waves-effect waves-light">Onayla</button>
                                        </div>
                                    </div>
                                </form>
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