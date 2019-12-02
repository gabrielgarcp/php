<html>
    <head>
        <meta charset="UTF-8">
        <title>Añadir tarea</title>
    </head>
    <body>
        <form method="POST">
            <p><label> Id: <input type="text" name="id" value="<?= idUltimoRegistroTarea() + 1 ?>" size="1" readonly /></label></p>
            <p><label> Descripción: <input type="text" name="descripcion" value="<?= $campos['descripcion'] ?>"/> </label></p>
            <p><label> Persona de contacto: <input type="text" name="persona_contacto" value="<?= $campos['persona_contacto'] ?>"/> </label></p>
            <p><label> Teléfono de contacto: <input type="text" name="telefono_contacto" value="<?= $campos['telefono_contacto'] ?>"/> </label></p>
            <p><label> Email de contacto: <input type="email" name="correo" value="<?= $campos['correo'] ?>"/> </label></p>
            <p><label> Dirección: <input type="text" name="direccion" value="<?php if (!empty($errores)) { ?><?= $campos['direccion'] ?><?php } ?>"/></label></p>
            <p><label> Población <input type="text" name="poblacion" value="<?= campos['poblacion'] ?>"/> </label></p>
            <p><label> Código Postal <input type="number" name="codigo_postal" size="5" value="<?= campos['codigo_postal'] ?>"/> </label></p>
            <p><label> Provincia 
                    <select name="provincia">
                        <?php
                        $provincias = ListaProvincias();
                        foreach ($provincias as $reg):
                            ?>
                            <option value="<?= $reg['cod'] ?>" <?php if ($reg['cod'] == $campos['provincia']) { ?> selected  <?php } ?>><?= $reg['nombre'] ?></option>
                            <?php
                        endforeach;
                        ?>
                    </select>
                </label></p>
            <p>
            <legend>Estado</legend>
            <label><input type="radio" name="estado" value="P" <?php if ($campos['estado'] == 'P') { ?>checked<?php } ?>/> Pendiente </label> <br>
            <label><input type="radio" name="estado" value="R" <?php if ($campos['estado'] == 'R') { ?>checked<?php } ?>/> Realizada</label> <br>
            <label><input type="radio" name="estado" value="C" <?php if ($campos['estado'] == 'C') { ?>checked<?php } ?>/> Cancelada</label></p>
        <p><label> Operario encargado: <input type="text" name="operario_encargado" value="<?= $campos['operario_encargado'] ?>"/> </label></p>
        <p><label> Fecha de realización: <input type="date" name="fecha_realizacion" value="<?= $campos['fecha_realizacion'] ?>"/> </label></p>
        <p><label> Anotaciones anteriores: <input type="text" name="anotaciones_anteriores" value="<?= $campos['anotaciones_anteriores']?>"/> </label></p>
        <p><label> Anotaciones posteriores: <input type="text" name="anotaciones_posteriores" value="<?= $campos['anotaciones_posteriores']?>"/> </label></p>
        <input type="submit" name="Anadir" value="Enviar"/>
        <?php
        if (!empty($errores)) {
            foreach ($errores as $error) {
                ?>
                <p> <?= $error ?> </p>
                <?php
            }
        }
        ?>
    </form>
</body>
</html>








