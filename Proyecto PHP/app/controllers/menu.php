<?php
session_start();
if (isset($_SESSION['admin'])) {
    include '../views/usuario.php';
    include '../views/menu.php';
} else {
    ?>
    <script type="text/javascript">
        alert("No has iniciado sesion");
        window.location.href = "../index.php";
    </script>
    <?php

}

