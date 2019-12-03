<?php
session_start();
if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin']) {
        if (!$_POST) {
            include '../views/usuario.php';
            include '../views/EliminarTarea.php';
        } else {
            include '../models/funciones.php';
            $id = $_POST['id'];
            if (isset($_POST['bs'])) {
                ?>
                <script type="text/javascript">
                    alert("<?= eliminarTarea($id) ?>");
                    window.location.href = "Listar.php";
                </script>
                <?php
            } elseif (isset($_POST['bn'])) {
                header('Location: Listar.php');
            }
        }
    } else {
        ?>
        <script type="text/javascript">
            alert("No tienes permisos para eliminar una tarea");
            window.location.href = "../index.php";
        </script>
        <?php
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
