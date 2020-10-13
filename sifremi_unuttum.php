<?php
$telefon = $_POST['telefon'];
$sifre = $_POST['sifre'];
$title="Şifremi Unuttum";
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
                                <a class="nav-link active" href="index.php">Anasayfa'ya Dön</a>
                            </li>
                        </ul>
                        <h5 class="font-18 text-center">ŞİFREMİ UNUTTUM</h5>
                        
                        <?php include "includes/sistemmesaji.php" ?>
    
                        <form class="form-horizontal m-t-30" action="sifrekontrol.php" method="POST">
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>Telefon</label>
                                    <input name="telefon"class="form-control" type="phone" required="" placeholder="Telefon">
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>Yeni Şifre</label>
                                    <input name="sifre"class="form-control" type="password" required="" placeholder="Şifre">
                                </div>
                            </div>

                            <div class="form-group text-center m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Şifre Yenile</button>
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