<?php
include '../models/funciones.php';
$id = $_POST['id'];
if (isset($_POST['bs'])) {
    ?>
    <script type="text/javascript">
        alert("<?= eliminarTarea($id) ?>");
        window.location.href = "../views/Acciones/ListarTareas.php";
    </script>
    <?php
} elseif (isset($_POST['bn'])) {
    header('Location: ../views/Acciones/ListarTareas');
}
