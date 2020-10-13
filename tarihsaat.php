<?php
include "includes/loginkontrol.php";
include "includes/baglanti.php";
unset($_SESSION['secilentarih']);
$title="Tarih Saat";
include "includes/header.php";
?>

<body>

<div class="accountbg"></div>
<div class="row">
        <div class="col-1 col-sm-2"></div>
        <div class="col-10 col-sm-8">
            <div class="card card-pages m-t-40 shadow-none">
                <div class="card-body">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="font-18 text-center">TARİH/SAAT</h5>
                                    <?php include "includes/sistemmesaji.php" ?>
                                    <form action="tarihsaat_kontrol.php" method="POST">
                                        <div class="form-group row">
                                            <input class="form-control" name="tarih" type="datetime-local" value="Y-m-d H:i:s" id="example-datetime-local-input">
                                        </div>
                                        <div class="form-group row">
                                            <button class="btn btn-primary btn-block btn-lg waves-effect waves-light">Onayla</button>
                                        </div>
                                    </form>

                                    <?php
                                    if ($_POST) {
                                    $gelentarih=$_POST['tarih'];
                                    echo $gelentarih;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-1 col-sm-2"></div>
</div>
</body>
</html>