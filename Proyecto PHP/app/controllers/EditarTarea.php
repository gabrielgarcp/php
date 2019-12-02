<?php
if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin']) {
        if (!$_POST) {
            include 'datosTarea.php';
            include '../views/EditarTarea.php';
        } else {
            include '../models/funciones.php';
            if ($_POST['fecha_realizacion'] == "") {
                $fech_re = null;
            } else {
                $fech_re = date("Y-m-d", strtotime($_POST['fecha_realizacion']));
            }
            $result_editar = editarTarea($_POST['id'], $_POST['descripcion'], $_POST['persona_contacto'], $_POST['telefono_contacto'], $_POST['correo'], $_POST['direccion'], $_POST['poblacion'], $_POST['codigo_postal'], $_POST['provincia'], $_POST['estado'], $_POST['operario_encargado'], $fech_re, $_POST['anotaciones_anteriores'], $_POST['anotaciones_posteriores']);
            ?>
            <script type="text/javascript">
                alert("<?= $result_editar ?>");
                window.location.href = "Listar.php";
            </script>
            <?php
        }
    } else {
        ?>
        <script type="text/javascript">
            alert("No tienes permiso para editar una tarea");
            window.location.href = "Listar.php";
        </script>
        <?php
        header('Location: menu.php');
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