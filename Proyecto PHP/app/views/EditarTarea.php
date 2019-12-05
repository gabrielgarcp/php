<?php ?>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">        
        <title>Editar tarea</title>
    </head>
    <body>
        <form method="POST">
            <p><label> Id: <input type="text" name="id" value="<?php if (!empty($errores_editar)) { ?><?= $campos['id'] ?><?php } else { ?><?= $datosTarea['id'] ?><?php } ?>" size="1" readonly /></label></p>
            <p><label> Descripción: <input type="text" name="descripcion" value="<?php if (!empty($errores_editar)) { ?><?= $campos['descripcion'] ?><?php } else { ?><?= $datosTarea['descripcion'] ?><?php } ?>"/> </label></p>
            <p><label> Persona de contacto: <input type="text" name="persona_contacto" value="<?php if (!empty($errores_editar)) { ?><?= $campos['persona_contacto'] ?><?php } else { ?><?= $datosTarea['persona_contacto'] ?><?php } ?>"/> </label></p>
            <p><label> Teléfono de contacto: <input type="text" name="telefono_contacto" value="<?php if (!empty($errores_editar)) { ?><?= $campos['telefono_contacto'] ?><?php } else { ?><?= $datosTarea['telefono_contacto'] ?><?php } ?>"/> </label></p>
            <p><label> Email de contacto: <input type="email" name="correo" value="<?php if (!empty($errores_editar)) { ?><?= $campos['correo'] ?><?php } else { ?><?= $datosTarea['correo'] ?><?php } ?>"/> </label></p>
            <p><label> Dirección: <input type="text" name="direccion" value="<?php if (!empty($errores_editar)) { ?><?= $campos['direccion'] ?><?php } else { ?><?= $datosTarea['direccion'] ?><?php } ?>"/></label></p>
            <p><label> Población <input type="text" name="poblacion" value="<?php if (!empty($errores_editar)) { ?><?= $campos['poblacion'] ?><?php } else { ?><?= $datosTarea['poblacion'] ?><?php } ?>"/> </label></p>
            <p><label> Código Postal <input type="number" name="codigo_postal" size="5" value="<?php if (!empty($errores_editar)) { ?><?= $campos['codigo_postal'] ?><?php } else { ?><?= $datosTarea['codigo_postal'] ?><?php } ?>"/> </label></p>
            <p><label> Provincia 
                    <select name="provincia">
                        <?php
                        $provincias = ListaProvincias();
                        foreach ($provincias as $reg):
                            ?>
                            <option value="<?= $reg['cod'] ?>" <?php if (!empty($errores_editar) && $reg['cod'] == $campos['provincia']) { ?> selected <?php } elseif ($reg['cod'] == $datosTarea['provincia']) { ?>selected<?php } ?>><?= utf8_encode($reg['nombre']) ?></option>
                            <?php
                        endforeach;
                        ?>
                    </select>
                </label></p>
            <p><legend>Estado</legend>
            <label><input type="radio" name="estado" value="P" <?php if (!empty($errores_editar) && $campos['estado']=='P'){?> checked <?php } elseif ($datosTarea['estado']=='P') {?> checked <?php } ?> /> Pendiente </label> <br>
            <label><input type="radio" name="estado" value="R" <?php if (!empty($errores_editar) && $campos['estado']=='R'){?> checked <?php } elseif ($datosTarea['estado']=='R') {?> checked <?php } ?>/> Realizada</label> <br>
            <label><input type="radio" name="estado" value="C" <?php if (!empty($errores_editar) && $campos['estado']=='C'){?> checked <?php } elseif ($datosTarea['estado']=='C') {?> checked <?php } ?>/> Cancelada</label></p>
        <p><label> Operario encargado: <input type="text" name="operario_encargado" value="<?php if (!empty($errores_editar)) { ?><?= $campos['perario_encargado'] ?><?php } else { ?><?= $datosTarea['operario_encargado'] ?><?php } ?>"/> </label></p>
        <p><label> Fecha de realización: <input type="date" name="fecha_realizacion" value="<?php if (!empty($errores_editar)) { ?><?= $campos['fecha_realizacion'] ?><?php } else { ?><?= $datosTarea['fecha_realizacion'] ?><?php } ?>"/> </label></p>
        <p><label> Anotaciones anteriores: <input type="text" name="anotaciones_anteriores" value="<?php if (!empty($errores_editar)) { ?><?= $campos['anotaciones_anteriores'] ?><?php } else { ?><?= $datosTarea['anotaciones_anteriores'] ?><?php } ?>"/> </label></p>
        <p><label> Anotaciones posteriores: <input type="text" name="anotaciones_posteriores" value="<?php if (!empty($errores_editar)) { ?><?= $campos['anotaciones_posteriores'] ?><?php } else { ?><?= $datosTarea['anotaciones_posteriores'] ?><?php } ?>"/> </label></p>
        <input type="submit" name="Editar" value="Enviar"/>
        <?php
        if (!empty($errores_editar)) {
            foreach ($errores_editar as $error) {
                ?>
                <p style="color:red"> <?= $error ?> </p>
                <?php
            }
        }
        ?>
    </form>
</body>
</html>
