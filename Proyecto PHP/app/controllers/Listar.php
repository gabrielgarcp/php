<?php

session_start();
if (isset($_SESSION['admin'])) {
    include '../models/funciones.php';
    if (!$_POST) {
        $tareas = ListaTareas();
        include '../views/usuario.php';
        include '../views/ListarTareas.php';
    } else {
        $campo = $_POST['campo'];
        if ($campo == 'fecha_creacion') {
            $dato = date("Y/m/d", strtotime($_POST['dato']));
        } else {
            $dato = $_POST['dato'];
        }
        $tareas = buscarTareas($campo, $dato);
        include '../views/ListarTareas.php';
    }
} else {
    ?>
    <script type="text/javascript">
        alert("No has iniciado sesion");
        window.location.href = "../index.php";
    </script>
    <?php

}

