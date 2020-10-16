<?php

include "includes/loginkontrol.php";
$title="Üye Anasayfa";
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
                            <a class="nav-link active" href="uye_anasayfa.php">Üye Anasayfa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="includes/cikis.php">Çıkış</a>
                        </li>
                    </ul>
                    <div class="text-center m-t-0 m-b-15">
                        <a href="index.html" class="logo logo-admin"><img src="assets\images\hair.png" width="200" height="200"></a>
                    </div>
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card m-b-30 card-body">
                                        <?php include "includes/sistemmesaji.php" ?>
                                        <div class="button-items">
                                            <button type="button" class="btn btn-primary btn-lg btn-block waves-effect waves-light" onclick="javascript:location.href='randevu_basarili.php'">RANDEVULARIM</button>
                                            <button type="button" class="btn btn-primary btn-lg btn-block waves-effect waves-light" onclick="javascript:location.href='randevu_al.php'">YENİ RANDEVU AL</button>
                                            <button type="button" class="btn btn-info btn-sm btn-block waves-effect waves-light" data-toggle="modal" data-target=".iletisim-modal">İLETİŞİM</button>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    <div class="col-1 col-sm-2"></div>
</div> 
</div>
<div class="modal fade iletisim-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-center">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="mySmallModalLabel">İLETİŞİM BİLGİLERİMİZ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="media m-b-30">
                <img class="d-flex mr-3 rounded-circle thumb-md" src="assets\images\hair.png" alt="Generic placeholder image">
                <div class="media-body align-self-center">
                    <h4 class="font-14 m-0">Gülin Karadeniz</h4>
                    <small class="text-muted">5318610317</small></br>
                    <small class="text-muted">gulinkaradeniz@gmail.com</small><hr>
                    <small class="text-muted">Kuaför tadilatta.</small>


                </div>
            </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
</html>