<?php

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
                <label><input type="radio" name="estado" value="P" /> Pendiente </label> <br>
                <label><input type="radio" name="estado" value="R" checked /> Realizada</label> <br>
                <label><input type="radio" name="estado" value="C" /> Cancelada</label>
            </fieldset>
            <br>
            <p><label> Anotaciones anteriores: <input type="text" name="anotaciones_anteriores" value="<?= $datosTarea['anotaciones_anteriores'] ?>"/></label></p>
            <p><label> Anotaciones posteriores: <input type="text" name="anotaciones_posteriores" value="<?= $datosTarea['anotaciones_posteriores'] ?>"/> </label></p>
            <p><input type="submit" name="Completar" value="Enviar"/></p>
        </form>
    </body>
</html>
