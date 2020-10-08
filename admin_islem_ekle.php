<?php 
include "includes/baglanti.php";
$title="Randevular";
include "includes/header.php";
?>
<body>
        <div class="accountbg"></div>
        
        <div class="wrapper-page">
                <div class="card card-pages shadow-none">
    
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
                                        <label>İşlem Saati</label>
                                    <input name="sure"class="form-control" type="text" required="" placeholder="..saat">
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
                                                        <th>id</th>
                                                        <th>İşlem</th>
                                                        <th>İşlem Saati</th>
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
                                                                    <th scope="row"><?=$satir["id"];?></th>
                                                                    <td><?=$satir["isim"];?></td>
                                                                    <td class="text-center"><?=$satir["sure"];?></td>
                                                                    

                                                                    <td class="text-right"><a href="sil.php?id=<?php echo $id; ?>" class="level-item" aria-label="retweet">
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



    <body>
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="card">
                        <div class="has-text-centered">
                            <div class="card-content">
                            <p class="subtitle is-3">
                                İŞLEMLERİ DÜZENLE
                            </p>
                            <?php include "sistemmesaji.php" ?>
                                <p class="subtitle">
                                    <form  action="admin_islem_kontrol.php" method="POST">
                                        <div class="field giris">
                                            <p class="control has-icons-left">
                                            <input class="input" placeholder="İşlem" name="isim" required>
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                            </p>
                                        </div>
                                        <div class="field giris">
                                            <p class="control has-icons-left">
                                            <input class="input"placeholder="..saat" name="sure" required>
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-hourglass-start"></i>
                                            </span>
                                            </p>
                                        </div>
                                        <div class="field">
                                            <button class="button is-success is-warning is-fullwidth" >
                                                İşlem Ekle
                                            </button>
                                        </div>
                                        
                                        <div class="has-text-centered">
                                            <div class="card-content">
                                            <p class="subtitle is-3">
                                                İŞLEMLER
                                            </p>
                                            <p class="subtitle">
                                                <div class="content">
                                                <?php
                                               
                                                $sorgu = $mysqli->query("SELECT * FROM islemler");
                                                if($sorgu->num_rows>0){
                                                    while($satir=$sorgu->fetch_assoc()){?>
                                                    <p class="subtitle">
                                                        <div class="box">   
                                                            <div class="level-left">
                                                                <?php
                                                                $id = $satir['id']; 
                                                                echo $satir["id"]."-";
                                                                echo $satir["isim"]."-";
                                                                echo $satir["sure"]."&nbsp;"."saat"." ";?>
                                                            </div>
                                                            <div class="level-right">
                                                                <a href="sil.php?id=<?php echo $id; ?>" class="level-item" aria-label="retweet">
                                                                <span class="icon has-text-danger">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </span>
                                                                </a>
                                                                <a href="duzenle.php?id=<?php echo $id; ?>" class="level-item" aria-label="like">
                                                                <span class="icon is-small">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </span>
                                                                </a>
                                                            </div>
                                                                
                                                            
                                                        </div>
                                                    </p>
                                                        
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                </div>
                                            </p>
                                            </div>
                                        </div>
                                    </form>
                                </p>
                            </div>
                        </div>
                        <nav class="navbar" role="navigation" aria-label="main navigation">
                        
                            <div id="navbarBasicExample" class="navbar-menu">
                                <div class="navbar-start">
                                <a class="navbar-item" href="admin_randevular.php">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                                
                            </div>
                            <div id="navbarBasicExample" class="navbar-menu">
                                <div class="navbar-end">
                                 
                                 <a class="navbar-item" href="admin_uyeler.php">
                                     <i class="fas fa-chevron-right"></i>
                                 </a>
                             </div>
                             <div id="navbarBasicExample" class="navbar-menu">
                                <div class="navbar-start">
                                    <a class="navbar-item" href="cikis.php">
                                        <i class="fas fa-times"></i>
                                    </a>
                                    
                                </div>
                            </div>
                            
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>