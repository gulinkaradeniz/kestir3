<?php
//include "includes/loginkontrol.php";
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
<div class="accountbg"></div>
        
        <div class="wrapper-page">
                <div class="card card-pages shadow-none">
    
                    <div class="card-body">
                        <h5 class="font-18 text-center">İŞLEMLER</h5>
                        <?php include "includes/sistemmesaji.php" ?>
    
                        <form class="form-horizontal m-t-30" action="kontrol/islemlerkontrol.php" method="POST">
                            <?php
                                
                                $sorgu = $mysqli->query("SELECT * FROM islemler");
                                if($sorgu->num_rows>0){
                                    while($satir=$sorgu->fetch_assoc()){?>
                                    <ul class="message-list">
                                        <li>
                                            <div class="col-mail col-mail-1">
                                                <div class="checkbox-wrapper-mail">
                                                    <input type="checkbox" id="<?php echo $satir["id"]; ?>"name="islemler[]" value="<?php echo $satir["id"]; ?>">
                                                    <label for="<?php echo $satir["id"]; ?>" class="toggle"></label>
                                                </div>
                                                <?php
                                                echo $satir["isim"];?>
                                                <br>
                                            </div>
                                        </li>
                                    </ul>
                                    
                                   
                                    <?php
                                    }
                                }
                            ?>
                            <div class="form-group text-center m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light">Onayla</button>
                                </div>
                            </div>
                        </form>
                    </div>
    
                </div>
            </div>
</body>
</html>