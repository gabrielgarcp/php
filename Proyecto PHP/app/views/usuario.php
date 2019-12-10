<p style="text-align: center">
    <?php 
    session_start();
    if ($_SESSION['admin']) { ?>
        <img src="../../assets/imgs/administrador.jpg" alt="Administtrador" height="40" width="40">
        <?php
    } else {
        ?>
        <img src="../../assets/imgs/operario.jpg" alt="Operario" height="40" width="40">
    <?php }
    ?>
        <?= $_SESSION['usuario']?>
        <a href="../index.php"  onclick="<?php session_abort();?>">Cerrar sesión </a>
</p>