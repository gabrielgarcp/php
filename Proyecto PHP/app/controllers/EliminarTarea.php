<?php
if (!$_POST) {
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
