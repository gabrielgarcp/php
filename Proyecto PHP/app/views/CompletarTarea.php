<?php
$id = $_GET['id'];
$datosTarea = datos($id);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Completar tarea</title>
    </head>
    <body>
        <form method="POST">
            <label>Tarea <input type="text" name="id" value="<?= $id ?>" size="1" readonly/></label>
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
            <p><input type="submit" name="Completar" value="Enviar"/></p>
        </form>
    </body>
</html>
