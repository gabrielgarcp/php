<?php
session_start();
if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin']) {
        include 'datosTarea.php';
        $datosTarea = datos($_GET['id']);
        ?>
        <html>
            <head>
                <meta charset="UTF-8">
                <title>Editar tarea</title>
            </head>
            <body>
                <form method="POST">
                    <p><label> Id: <input type="text" name="id" value="<?= $datosTarea['id'] ?>" size="1" readonly /></label></p>
                    <p><label> Descripción: <input type="text" name="descripcion" value="<?= $datosTarea['descripcion'] ?>"/> </label></p>
                    <p><label> Persona de contacto: <input type="text" name="persona_contacto" value="<?= $datosTarea['persona_contacto'] ?>"/> </label></p>
                    <p><label> Teléfono de contacto: <input type="text" name="telefono_contacto" value="<?= $datosTarea['telefono_contacto'] ?>"/> </label></p>
                    <p><label> Email de contacto: <input type="email" name="correo" value="<?= $datosTarea['correo'] ?>"/> </label></p>
                    <p><label> Dirección: <input type="text" name="direccion" value="<?= $datosTarea['direccion'] ?>"/></label></p>
                    <p><label> Población <input type="text" name="poblacion" value="<?= $datosTarea['poblacion'] ?>"/> </label></p>
                    <p><label> Código Postal <input type="number" name="codigo_postal" size="5" value="<?= $datosTarea['codigo_postal'] ?>"/> </label></p>
                    <p><label> Provincia 
                            <select name="provincia">
                                <?php
                                $provincias = ListaProvincias();
                                foreach ($provincias as $reg):
                                    ?>
                                    <option value="<?= $reg['cod'] ?>" <?php if ($reg['cod'] == $datosTarea['provincia']) { ?> selected <?php } ?>><?= $reg['nombre'] ?></option>
                                    <?php
                                endforeach;
                                ?>
                            </select>
                        </label></p>
                    <p><legend>Estado</legend>
                    <label><input type="radio" name="estado" value="P" <?php if ($datosTarea['estado'] == 'P') { ?>checked<?php } ?>/> Pendiente </label> <br>
                    <label><input type="radio" name="estado" value="R" <?php if ($datosTarea['estado'] == 'R') { ?>checked<?php } ?>/> Realizada</label> <br>
                    <label><input type="radio" name="estado" value="C" <?php if ($datosTarea['estado'] == 'C') { ?>checked<?php } ?>/> Cancelada</label></p>
                <p><label> Operario encargado: <input type="text" name="operario_encargado" value="<?= $datosTarea['operario_encargado'] ?>"/> </label></p>
                <p><label> Fecha de realización: <input type="date" name="fecha_realizacion" value="<?= $datosTarea['fecha_realizacion'] ?>"/> </label></p>
                <p><label> Anotaciones anteriores: <input type="text" name="anotaciones_anteriores" value="<?= $datosTarea['anotaciones_anteriores'] ?>"/> </label></p>
                <p><label> Anotaciones posteriores: <input type="text" name="anotaciones_posteriores" value="<?= $datosTarea['anotaciones_posteriores'] ?>"/> </label></p>
                <input type="submit" name="Editar" value="Enviar"/>
            </form>
        </body>
        </html>
        <?php
    } else {
        ?>
        <p>No tienes permisos para editar una tarea</p>
        <?php
        include 'menu.php';
    }
} else {
    header('Location: ../index.php');
}
