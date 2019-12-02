<?php
session_start();
if (isset($_SESSION['admin'])) {
    if (!$_SESSION['admin']) {
        if (!$_POST) {
            include 'datosTarea.php';
            include '../views/CompletarTarea.php';
        } else {
            include '../models/funciones.php';
            $result_completar = completarTarea($_POST['id'], $_POST['estado'], $_POST['anotaciones_anteriores'], $_POST['anotaciones_posteriores']);
            ?>
            <script type="text/javascript">
                alert("<?= $result_completar ?>");
                window.location.href = "Listar.php";
            </script>
            <?php
        }
    } else {
        ?>
        <script type="text/javascript">
            alert("Los administradores no tienen permisos para completar una tarea");
            window.location.href = "Listar.php";
        </script>
        <?php
        include('Location: menu.php');
    }
} else {
    ?>
    <script type="text/javascript">
        alert("No has iniciado sesion");
        window.location.href = "Listar.php";
    </script>
    <?php
    header('Location: ../index.php');
}
       