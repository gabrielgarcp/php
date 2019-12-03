<html>
    <head>
        <meta charset="UTF-8">
        <title>Añadir tarea</title>
    </head>
    <body>
        <form method="POST">
            <p><label> Id: <input type="text" name="id" value="<?= idUltimoRegistroTarea() + 1 ?>" size="1" readonly /></label></p>
            <p><label> Descripción: <input type="text" name="descripcion" value="<?php if (!empty($errores_anadir)) { ?><?= $campos['descripcion'] ?><?php } ?>"/> </label></p>
            <p><label> Persona de contacto: <input type="text" name="persona_contacto" value="<?php if (!empty($errores_anadir)) { ?><?= $campos['persona_contacto'] ?><?php } ?>"/> </label></p>
            <p><label> Teléfono de contacto: <input type="text" name="telefono_contacto" value="<?php if (!empty($errores_anadir)) { ?><?= $campos['telefono_contacto'] ?><?php } ?>"/> </label></p>
            <p><label> Email de contacto: <input type="email" name="correo" value="<?php if (!empty($errores_anadir)) { ?><?= $campos['correo'] ?><?php } ?>"/> </label></p>
            <p><label> Dirección: <input type="text" name="direccion" value="<?php if (!empty($errores_anadir)) { ?><?= $campos['direccion'] ?><?php } ?>"/></label></p>
            <p><label> Población <input type="text" name="poblacion" value="<?php if (!empty($errores_anadir)) { ?><?= $campos['poblacion'] ?><?php } ?>"/> </label></p>
            <p><label> Código Postal <input type="number" name="codigo_postal" size="5" value="<?php if (!empty($errores_anadir)) { ?><?= $campos['codigo_postal'] ?><?php } ?>"/> </label></p>
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
            <label><input type="radio" name="estado" value="P" checked/> Pendiente </label> <br>
            <label><input type="radio" name="estado" value="R" /> Realizada</label> <br>
            <label><input type="radio" name="estado" value="C" /> Cancelada</label></p>
        <p><label> Operario encargado: <input type="text" name="operario_encargado" value="<?php if (!empty($errores_anadir)) { ?><?= $campos['operario_encargado'] ?><?php } ?>"/> </label></p>
        <p><label> Fecha de realización: <input type="date" name="fecha_realizacion" value="<?php if (!empty($errores_anadir)) { ?><?= $campos['fecha_realizacion'] ?><?php } ?>"/> </label></p>
        <p><label> Anotaciones anteriores: <input type="text" name="anotaciones_anteriores" value="<?php if (!empty($errores_anadir)) { ?><?= $campos['anotaciones_anteriores'] ?><?php } ?>"/> </label></p>
        <p><label> Anotaciones posteriores: <input type="text" name="anotaciones_posteriores" value="<?php if (!empty($errores_anadir)) { ?><?= $campos['anotaciones_posteriores'] ?><?php } ?>"/> </label></p>
        <input type="submit" name="Anadir" value="Enviar"/>
        <?php
        if (!empty($errores_anadir)) {
            foreach ($errores_anadir as $error) {
                ?>
                <p style="color:red"> <?= $error ?> </p>
                <?php
            }
        }
        ?>
    </form>
</body>
</html>








