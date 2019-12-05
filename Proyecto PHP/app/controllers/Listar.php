<?php

session_start();
if (isset($_SESSION['admin'])) {
    include '../models/funciones.php';

    if (!$_POST) {
        $tareas_x_pagina = 3;
        $paginas = ceil(numTareas() / $tareas_x_pagina);
        if ($_GET['pagina'] > $paginas || !is_numeric($_GET['pagina'])) {
            header('Location: Listar.php?pagina=1');
        }
        $inicio = ($_GET['pagina'] - 1) * $tareas_x_pagina;
        $tareas = ListaTareas($inicio, $tareas_x_pagina);
        $paginas = ceil(numTareas() / $tareas_x_pagina);
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

