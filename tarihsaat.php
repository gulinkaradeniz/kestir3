<?php
//include "includes/loginkontrol.php";
include "includes/baglanti.php";
unset($_SESSION['secilentarih']);
$title="Tarih Saat";
include "includes/header.php";
?>

<body>
    
</body>








    <body>
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="card">
                        <div class="has-text-centered">
                            <div class="card-content">
                            <p class="subtitle is-3">
                                TARİH/SAAT
                            </p>
                            <?php include "sistemmesaji.php"; ?>
                            <p class="subtitle">
                                <form action="tarihsaat_kontrol.php" method="POST">
                                    <div class="control">
                                        <label>Tarih:</label>
                                        <div class="select is-success">
                                            <select name="gun">
                                              <?php 
                                              $gun=date("d");
                                              for ($i=1; $i < 32; $i++) { 
                                                if($gun == $i) {$selected = "selected";}
                                                else{ $selected='';}
                                                  echo "<option ".$selected." value=". $i .">".$i."</option>";
                                              }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="select is-warning">
                                        <?php 
                                        $ay=date("m");
                                       
                                        
                                        ?>
                                            <select name="ay">
                                                <option value="01"  <?php if($ay == "01") {echo "selected";}?>>Ocak</option>
                                                <option value="02"  <?php if($ay == "02") {echo "selected";}?>>Şubat</option>
                                                <option value="03"  <?php if($ay == "03") {echo "selected";}?>>Mart</option>
                                                <option value="04"  <?php if($ay == "04") {echo "selected";}?>>Nisan</option>
                                                <option value="05"  <?php if($ay == "05") {echo "selected";}?>>Mayıs</option>
                                                <option value="06"  <?php if($ay == "06") {echo "selected";}?>>Haziran</option>
                                                <option value="07"  <?php if($ay == "07") {echo "selected";}?>>Temmuz</option>
                                                <option value="08"  <?php if($ay == "08") {echo "selected";}?>>Ağustos</option>
                                                <option value="09"  <?php if($ay == "09") {echo "selected";}?>>Eylül</option>
                                                <option value="10"  <?php if($ay == "10") {echo "selected";}?>>Ekim</option>
                                                <option value="11"  <?php if($ay == "11") {echo "selected";}?>>Kasım</option>
                                                <option value="12"  <?php if($ay == "12") {echo "selected";}?>>Aralık</option>
                                            </select>
                                        </div>
                                    </div></br>
                                
                                    <div class="control">
                                        <label>Saat:</label>
                                        <div class="select is-danger">
                                            <select name="saat">
                                                <option value="10:00">10:00</option>
                                                <option value="11:00">11:00</option>
                                                <option value="12:00">12:00</option>
                                                <option value="13:00">13:00</option>
                                                <option value="14:00">14:00</option>
                                                <option value="15:00">15:00</option>
                                                <option value="16:00">16:00</option>
                                                <option value="17:00">17:00</option>
                                                <option value="18:00">18:00</option>
                                            </select>
                                        </div>
                                    </div></br>
                                    <div class="field">
                                        <button class="button is-success is-fullwidth">
                                            Onayla
                                        </button>
                                    </div>
                                </form>
                                <?php
                                if ($_POST) {
                                $gelengun=$_POST['gun'];
                                $gelenay=$_POST['ay'];
                                $gelensaat=$_POST['saat'];
                                echo $gelengun;
                                echo $gelenay;
                                echo $gelensaat;


                                }
                                ?>
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