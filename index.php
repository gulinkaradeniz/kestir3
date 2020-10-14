
<?php

session_start();
//die(var_dump($_SESSION));
//var_dump($_SESSION);
if(isset($_SESSION['login'])){
    if($_SESSION['login'] == true){
        header('Location: uye_anasayfa.php');
        die();
    }
}
$title="Anasayfa";
include "includes/header.php";
?>
<body>
    <div class="accountbg"></div>
    <div class="row">
        <div class="col-1 col-sm-2"></div>
        <div class="col-10 col-sm-8">
            
            <div class="card card-pages m-t-40 shadow-none">
                <div class="card-body">
                    <div class="text-center m-t-0 m-b-15">
                        <a href="index.php" class="logo logo-admin"><img src="assets\images\hair.png" width="200" height="200"></a>
                    </div>
                    <h5 class="font-18 text-center">LÜTFEN GİRİŞ YAPINIZ.</h5>
                    <?php include "includes/sistemmesaji.php" ?>
                    <form class="form-horizontal m-t-30" action="giriskontrol.php" method="POST">
                        <div class="form-group">
                            <div class="col-12">
                                <label>Telefon</label>
                                <input name="telefon"class="form-control" type="phone" required="" placeholder="Telefon">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <label>Şifre</label>
                                <input name="sifre"class="form-control" type="password" required="" placeholder="Şifre">
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-12">
                                <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Giriş Yap</button>
                            </div>
                        </div>
                    </form>
                    <div class="form-group text-center m-t-20">
                        <div class="col-12">
                            <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" onclick="javascript:location.href='kayit_ol.php'">Kayıt Ol</button>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-12">
                            <a href="sifremi_unuttum.php" class="text-muted"><i class="fa fa-lock m-r-5"></i>Şifremi Unuttum</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-1 col-sm-2"></div>
    </div>     
</body>
</html>

