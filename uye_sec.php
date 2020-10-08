<?php
include "includes/loginkontrol.php";
include "includes/baglanti.php";
unset($_SESSION['secilenuyeler']);
$title="Randevu Al";
include "includes/header.php";
?>




    <body>
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="card">
                        <div class="has-text-centered">
                            <div class="card-content">
                            <p class="subtitle is-3">
                                ÜYELER
                            </p>
                            <?php include "sistemmesaji.php"; ?>
                            <p class="subtitle">
                                <form action="randevu_al.php" method="POST">
                                    <?php
                                    $sorgu3 = $mysqli->query("SELECT * FROM users WHERE isadmin='0'");
                                    
                                    ?>
                                    <div class="select is-success">
                                        <select name="uyeler">
                                            <?php 
                                            while($satir3=$sorgu3->fetch_assoc()){
                                                $dizi=$satir3["adsoyad"]."-".$satir3["telefon"];
                                                echo "<option value=". $satir3["id"] .">".$dizi."</option>";
                                                
                                            }
                                            ?>
                                        </select>
                                    </div><hr>
                                        <div class="field">
                                            <button class="button is-success is-fullwidth">
                                                Onayla
                                            </button>
                                        </div>
                                </form>
                            </p>
                            </div>
                        </div>
                        <nav class="navbar" role="navigation" aria-label="main navigation">
                            
                            <div id="navbarBasicExample" class="navbar-menu">
                               <div class="navbar-start">
                                <a class="navbar-item" href="randevu_al.php">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                                
                            </div>
                            
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>