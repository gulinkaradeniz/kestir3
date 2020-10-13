<?php

include "includes/loginkontrol.php";
include "includes/baglanti.php";
unset($_SESSION['secilenislemler']);
if(isset($_POST['islemler'])) {
    $islemler = $_POST['islemler'];
    echo 'Seçtiğiniz islemler: <br/>';
    foreach($islemler as $islem) {
        echo ' * ' . $islem . ' <br/>';
    }
} 
$title="İşlemler";
include "includes/header.php";
?>
<body>
<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
<script src="assets/js/bootstrap-select.min.js"></script>
<div class="accountbg"></div>
<div class="row">
        <div class="col-1 col-sm-2"></div>
        <div class="col-10 col-sm-8">
        
                <div class="card card-pages m-t-40 shadow-none">
    
                    <div class="card-body">
                        <h5 class="font-18 text-center">İŞLEMLER</h5>
                        <?php include "includes/sistemmesaji.php" ?>
    
                        <form class="form-horizontal m-t-30" action="islemlerkontrol.php" method="POST">
                            <div class="form-group text-center m-t-20">
                                <select name="islemler[]" class="selectpicker" multiple data-live-search="true">
                                    <?php
                                        
                                        $sorgu = $mysqli->query("SELECT * FROM islemler");
                                        if($sorgu->num_rows>0){
                                            while($satir=$sorgu->fetch_assoc()){?>
                                                    <option value="<?php echo $satir["id"]; ?>"><?= $satir["isim"];?></option>   
                                                <?php
                                            }    
                                        }
                                    ?>
                                </select>
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
    <div class="col-1 col-sm-2"></div>
</div> 
</body>
</html>