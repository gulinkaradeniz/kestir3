<?php
$telefon = $_POST['telefon'];
$sifre = $_POST['sifre'];
$title="Kayıt Ol";
include "includes/header.php";
?>
<body>
        <div class="accountbg"></div>
        
        <div class="wrapper-page">
                <div class="card card-pages shadow-none">
    
                    <div class="card-body">
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
    </body>
</html>