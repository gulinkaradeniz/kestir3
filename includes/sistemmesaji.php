<?php 
if(isset($_SESSION['sistemmesaji'])){
    ?>
    <div class="alert <?php echo $_SESSION['sistemmesajicss'] ?>">
    <?php echo $_SESSION['sistemmesaji'] ?>

    </div>

    <?php
    unset($_SESSION['sistemmesaji']);
}
?>
