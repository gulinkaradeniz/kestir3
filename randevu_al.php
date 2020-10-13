<?php
include "includes/loginkontrol.php";
include "includes/baglanti.php";
$title="Randevu Al";
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
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card m-b-30 card-body">
                                    <h5 class="font-18 text-center">RANDEVU AL</h5>
                                        <?php include "includes/sistemmesaji.php" ?>
                                        <?php 
                                        if ($_SESSION["isadmin"]){?>
                                            <div class="field">
                                                <p class="control">
                                                <button type="button" class="btn btn-primary btn-lg btn-block waves-effect waves-light" onclick="javascript:location.href='uye_sec.php'">ÜYELER</button>
                                                </p>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="button-items">
                                            <button type="button" class="btn btn-primary btn-lg btn-block waves-effect waves-light" onclick="javascript:location.href='islemler.php'">İŞLEMLER</button>
                                            <button type="button" class="btn btn-primary btn-lg btn-block waves-effect waves-light" onclick="javascript:location.href='tarihsaat.php'">TARİH/SAAT</button><hr> 
                                        </div>
                                        
                                        <?php
                                        if(isset($_POST['uyeler'])) {
                                            $_id=intval($_POST['uyeler']);
                                            $sorgu3 = $mysqli->query("SELECT * FROM users WHERE id=$_id");
                                            while($satir3=$sorgu3->fetch_assoc()){
                                                echo "Seçilen üye=".($_POST['uyeler'])."<br>";
                                            }
                                            
                                        }

                                        if(isset($_SESSION["secilenislemler"])){
                                            $islemler=$_SESSION["secilenislemler"];
                                        
                                            foreach($islemler as $islem){
                                            $islem=intval($islem);
                                            $sorgu = $mysqli->query("SELECT * FROM islemler where id=$islem");
                                            while($satir=$sorgu->fetch_assoc()){
                                            
                                                echo "Seçilen işlem=".$satir["isim"]."<br>";
                                                
                                            }

                                        }

                                        }

                                        if(isset($_SESSION["secilentarih"])){
                                            echo "Seçilen tarih=".($_SESSION["secilentarih"]);
                                        }
                                        ?>
                                        <button type="button" class="btn btn-info waves-effect m-l-5" onclick="javascript:location.href='randevu_kaydet.php'">RANDEVUYU ONAYLA</button>
                                    </div>
                                    
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