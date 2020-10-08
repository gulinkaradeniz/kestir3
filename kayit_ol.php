<?php
$title="Kayıt Ol";
include "includes/header.php";
?>
<body>
<div class="accountbg"></div>
<div class="wrapper-page">
        <div class="card card-pages shadow-none">

            <div class="card-body">
                
                <div class="text-center m-t-0 m-b-15">
                                <a href="index.php" class="logo logo-admin"><img src="assets\images\hair.png" width="200" height="200"></a>
                        </div>
                <h5 class="font-18 text-center">KAYIT OL</h5>

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
                        
                    <div id="navbarBasicExample" class="navbar-menu">
                        <div class="navbar-start">
                        <a class="navbar-item" href="index.php">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        
                    </div>
                    
                </nav>
            </div>

        </div>
    </div>

</body>
</html>