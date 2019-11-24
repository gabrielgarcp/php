<?php
include '../../models/funciones.php';
session_start();
if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] == 'no') {
        ?>
        <form action="../../controllers/completarTarea.php" method="POST">
            <label>Tarea id
                <select name="id">
                    <?php
                    $ids = ListaId();
                    foreach ($ids as $reg):
                        ?>
                        <option value="<?= $reg['id'] ?>"><?= $reg['id'] ?> </option>
                        <?php
                    endforeach;
                    ?>
                </select>
            </label>
            <br>
            <fieldset>
                <legend>Estado</legend>
                <label><input type="radio" name="estado" value="P" /> Pendiente </label> <br>
                <label><input type="radio" name="estado" value="R" /> Realizada</label> <br>
                <label><input type="radio" name="estado" value="C" /> Cancelada</label>
            </fieldset>
            <br>
            <p><label> Anotaciones anteriores: <input type="text" name="anotaciones_anteriores"/></label></p>
            <p><label> Anotaciones posteriores: <input type="text" name="anotaciones_posteriores"/> </label></p>
            <p><input type="submit" id="Enviar" value="Enviar"/></p>
        </form>
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
