<?php
include '../../controllers/datosTarea.php';
$id = $_GET['id'];
$datosTarea = datos($id);
session_start();
if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] == 'no') {
        ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Completar tarea</title>
    </head>
    <body>
        <form action="../../controllers/completarTarea.php" method="POST">
            <label>Tarea <input type="text" name="id" value="<?= $id ?>"/></label>
            <br>
            <fieldset>
                <legend>Estado</legend>
                <label><input type="radio" name="estado" value="P" <?php if ($datosTarea['estado'] == 'P') { ?>checked<?php } ?>/> Pendiente </label> <br>
                <label><input type="radio" name="estado" value="R" <?php if ($datosTarea['estado'] == 'R') { ?>checked<?php } ?>/> Realizada</label> <br>
                <label><input type="radio" name="estado" value="C" <?php if ($datosTarea['estado'] == 'C') { ?>checked<?php } ?>/> Cancelada</label>
            </fieldset>
            <br>
            <p><label> Anotaciones anteriores: <input type="text" name="anotaciones_anteriores" value="<?= $datosTarea['anotaciones_anteriores'] ?>"/></label></p>
            <p><label> Anotaciones posteriores: <input type="text" name="anotaciones_posteriores" value="<?= $datosTarea['anotaciones_posteriores'] ?>"/> </label></p>
            <p><input type="submit" id="Enviar" value="Enviar"/></p>
        </form>
    </body>
</html>
        <?php
    } else {
        ?>
        <p> Solo los operarios pueden completar una tarea</p>
        <?php
        include '../MenuPrincipal/admin.php';
    }
} else {
    header('Location: ../../index.php');
}

