<?php
session_start();
$title="Kayıt Ol";
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
                    
                    <div class="text-center m-t-0 m-b-15">
                                    <a href="index.php" class="logo logo-admin"><img src="assets\images\hair.png" width="200" height="200"></a>
                            </div>
                    <h5 class="font-18 text-center">KAYIT OL</h5>
                    <?php include "includes/sistemmesaji.php" ?>
                    <form class="form-horizontal m-t-30" action="kayitolkontrol.php" method="POST">

                        <div class="form-group">
                            <div class="col-12">
                                    <label>Ad Soyad</label>
                                <input class="form-control" type="text" required="" name="adsoyad" placeholder="Ad Soyad">
                            </div>
                        </div>

                        <div class="form-group">
                                <div class="col-12">
                                        <label>Telefon</label>
                                    <input class="form-control" type="phone" required="" name="telefon" placeholder="5XX XXX XX XX">
                                </div>
                            </div>
                        <div class="form-group">
                            <div class="col-12">
                                    <label>Email</label>
                                <input class="form-control" type="email" required="" name="email" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                    <label>Şifre</label>
                                <input class="form-control" type="password" required="" name="sifre" placeholder="Şifre">
                            </div>
                        </div>

                        <div class="form-group text-center m-t-20">
                            <div class="col-12">
                                <button class="btn btn-primary btn-block btn-lg waves-effect waves-light">Kayıt Ol</button>
                            </div>
                        </div>
                    </form>
                    <nav class="navbar" role="navigation" aria-label="main navigation">
                        
                    </nav>
                </div>

            </div>
        </div>
    <div class="col-1 col-sm-2"></div>
</div> 

</body>
</html>